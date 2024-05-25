<?php

namespace App\Admin\Services\Notification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin\Repositories\Notification\NotificationRepositoryInterface;

class NotificationService implements NotificationServiceInterface
{

    protected $data;

    protected $repository;


    public function __construct(NotificationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function store(Request $request)
    {
        $this->data = $request->validated();
        $usersid = $this->data['user_ids'];
        unset($this->data['user_ids']);
        DB::beginTransaction();
        try {
            $notify = $this->repository->create($this->data);

            $this->repository->attachUsers($notify, $usersid);
            DB::commit();
            return $notify;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }


    public function delete($id)
    {
        return $this->repository->delete($id);
    }



    public function update($id,Request $request)
    {
        $this->data = $request->validated();
            $notify = $this->repository->update($id,$this->data);
            return $notify;
    }

    
    }

