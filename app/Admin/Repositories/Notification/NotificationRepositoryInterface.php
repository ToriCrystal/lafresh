<?php


namespace App\Admin\Repositories\Notification;

use App\Models\User;
use App\Admin\Repositories\EloquentRepositoryInterface;
use App\Models\Notification;

interface NotificationRepositoryInterface extends EloquentRepositoryInterface{
    public function attachUsers(Notification $notify, array $data);
    public function getQueryBuilderWithRelations($relations = ['user']);
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
    public function getUsersForNotificationById($idNotify);
    public function syncUsers(Notification $notify, array $data);

}
