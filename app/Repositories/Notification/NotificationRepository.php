<?php

namespace App\Repositories\Notification;

use App\Models\Notification;
use App\Admin\Repositories\EloquentStandardRepository;
use App\Repositories\Notification\NotificationRepositoryInterface;

class NotificationRepository extends EloquentStandardRepository implements NotificationRepositoryInterface{


    public function getModel()
    {
        return Notification::class;
    }

    



}
