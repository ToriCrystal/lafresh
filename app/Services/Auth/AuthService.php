<?php

namespace App\Services\Auth;

use App\Services\Auth\AuthServiceInterface;
use  App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Admin\Traits\Setup;
use App\Enums\User\UserGender;
use App\Enums\User\UserRoles;
use Illuminate\Support\Facades\URL;

class AuthService implements AuthServiceInterface
{
    use Setup;
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    protected $instance;

    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function register(Request $request)
    {
        $data = $request->validated();
        unset($data['agree']);
        $data['username'] = $data['email'];
        $data['password'] = bcrypt($data['password']);

        // $data['gender'] = UserGender::Male();
        // $data['roles'] = UserRoles::Agent();

        return $this->repository->create($data);
    }

    public function updatePassword(Request $request)
    {

        $this->data = $request->validated();

        $instance = $this->repository->findBy([
            'code' => $this->data['code'],
            'token_get_password' => $this->data['token']
        ]);

        $password = bcrypt($this->data['password']);

        return $this->repository->updateObject($instance, [
            'password' => $password,
            'token_get_password' => $this->generateTokenGetPassword()
        ]);
    }

    public function updateTokenPassword(Request $request)
    {

        $user  = $this->repository->findBy(['email' => $request->input('email')]);

        $this->data['token_get_password'] = (string) str()->uuid() . '-' . time();

        $this->instance['user'] = $this->repository->updateObject($user, $this->data);

        return $this;
    }

    public function generateRouteGetPassword($routeName)
    {

        $this->instance['url'] = URL::temporarySignedRoute(
            $routeName,
            now()->addMinutes(30),
            [
                'token' => $this->data['token_get_password'],
                'code' => $this->instance['user']->code
            ]
        );
        return $this;
    }

    public function getInstance()
    {
        return $this->instance;
    }
}
