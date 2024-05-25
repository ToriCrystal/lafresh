<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('Nhận đăng ký thông tin khách hàng - :site_name', ['site_name' => config('app.name')])</title>
</head>
<body>
    <h1>@lang('Thông tin khách hàng')</h1>
    <p>@lang('Họ và tên: :fullname', ['fullname' => $data['fullname']])</p>
    <p>@lang('Số điện thoại: :phone', ['phone' => $data['phone']])</p>
    <p>@lang('Email: :email', ['email' => $data['email']])</p>
    <p>@lang('Địa chỉ: :address', ['address' => $data['address']])</p>
    <p>@lang('Lời nhắn: :message', ['message' => $data['message']])</p>
</body>
</html>