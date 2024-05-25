<?php

namespace App\View\Composers\Notification;


use Illuminate\View\View;


class NotificationComposer
{

    protected $repoNotify;

    public function __construct()
    {
        $this->repoNotify = app()->make('App\Admin\Repositories\Notification\NotificationRepositoryInterface');
    }

    public function compose(View $view)
    {
        $notify = $this->repoNotify->getAll();
        $view->with('notify', $notify);
    }
}
