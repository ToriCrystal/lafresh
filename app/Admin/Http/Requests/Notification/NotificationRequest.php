<?php



namespace App\Admin\Http\Requests\Notification;

use Illuminate\Validation\Rules\Enum;
use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Notification\NotificationStatus;

class NotificationRequest extends BaseRequest
{

    public function methodPost()
    {
        return [
            'title' => ['required', 'string'],
            'desc' => ['required', 'string'],
            'status' => ['required', new Enum(NotificationStatus::class)],
            'user_ids' => ['required', 'array'],
            'user_ids.*' => ['required', 'exists:users,id'],
        ];
    }

    public function methodPut()
    {
        return [
            'title' => ['string'],
            'desc' => ['string'],
            'status' => ['required', new Enum(NotificationStatus::class)],
            'user_ids' => ['nullable', 'array'],
            'user_ids.*' => ['nullable', 'exists:users,id'],
        ];
    }
}
