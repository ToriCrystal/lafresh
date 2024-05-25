<?php


namespace App\Admin\Repositories\Notification;

use App\Admin\Repositories\EloquentRepository;
use App\Models\Notification;
use App\Models\User;

class NotificationRepository extends EloquentRepository implements NotificationRepositoryInterface
{


    public function getModel()
    {
        return Notification::class;
    }

    public function attachUsers(Notification $notify, array $data)
    {
        return $notify->users()->attach($data);
    }
    public function syncUsers(Notification $notify, array $data)
    {
        return $notify->users()->sync($data);
    }

    public function getQueryBuilderWithRelations($relations = ['user'])
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->with($relations)->orderBy('id', 'desc')->get()->map(function ($notification) {
            $notification->user_full_names = $notification->users->pluck('fullname')->implode(', ');
            return $notification;
        });
        return $this->instance;
    }


    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->leftJoin('notification_user', 'notifications.id', '=', 'notification_user.notification_id')
            ->leftJoin('users', 'notification_user.user_id', '=', 'users.id')
            ->select('notifications.*', 'users.fullname')
            ->orderBy($column, $sort);

        return $this->instance;
    }

    public function getUsersForNotificationById($idNotify)
    {
        $notification = $this->model->findOrFail($idNotify);
        return $notification->users()->get();
    }
}
