<ul
    class="nav nav-tabs col-12 d-flex flex-lg-column flex-row border-0 shadow-none justify-content-md-center justify-content-start">
    <li class="nav-item shadow-none w-100">
        <a class="nav-link d-flex align-items-center px-2" href="{{ route('profile.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-shield" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M6 21v-2a4 4 0 0 1 4 -4h2" />
                <path d="M22 16c0 4 -2.5 6 -3.5 6s-3.5 -2 -3.5 -6c1 0 2.5 -.5 3.5 -1.5c1 1 2.5 1.5 3.5 1.5z" />
                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
            </svg>
            <span class="px-4">@lang('Thông tin tài khoản')</span>
        </a>
    </li>
    <li class="nav-item shadow-none w-100">
        <a class="nav-link text-body-tertiary px-2" href="{{ route('order.index') }}">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em"
                width="1em" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13 12h7v1.5h-7zm0-2.5h7V11h-7zm0 5h7V16h-7zM21 4H3c-1.1 0-2 .9-2 2v13c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 15h-9V6h9v13z">
                </path>
            </svg>
            <span class="px-4">@lang('Quản lý đơn hàng')</span>
        </a>
    </li>
    <li class="nav-item shadow-none w-100">
        <a class="nav-link text-body-tertiary px-2" href="{{ route('security.change_password') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-square-rounded"
                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                <path d="M8 11m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
                <path d="M10 11v-2a2 2 0 1 1 4 0v2" />
            </svg>
            <span class="px-4">@lang('Bảo mật tài khoản')</span>
        </a>
    </li>
</ul>
