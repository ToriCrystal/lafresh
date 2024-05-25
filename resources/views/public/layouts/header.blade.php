<div class="sticky-top">
    <header class="navbar navbar-expand-md d-print-none header-main border-bottom bg-white">
        <div class="container-xl py-1">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasStart"
                aria-controls="offcanvasStart" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="{{ route('home.index') }}">
                <img src="{{ asset($settings['site_logo']) }}" alt="Logo" class="navbar-brand-image py-2">
            </a>
            <div class="d-md-block d-none me-auto ps-5">
                <ul class="navbar-nav">
                    @if ($menu && $menu->items)
                        @foreach ($menu->items->toTree() as $item)
                            @if ($item->hasChild())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ $item->getUrl() }}"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                        aria-expanded="false">
                                        <span class="nav-link-title px-1 fw-bold text-uppercase">
                                            {{ $item->title }}
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-columns">
                                            <div class="dropdown-menu-column">
                                                @foreach ($item->children as $children)
                                                    <a class="dropdown-item" href="{{ $children->getUrl() }}">
                                                        {{ $children->title }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ $item->getUrl() }}">
                                        <span class="nav-link-title fw-bold text-uppercase">
                                            {{ $item->title }}
                                        </span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>

            <div class="navbar-nav flex-row align-items-center gap-2 px-2 d-md-flex d-none">
                @if (auth()->check())
                    <div class="nav-item d-md-block d-none">
                        <button class="navbar-toggler d-block nav-link" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <i class="fa-solid fa-magnifying-glass fs-2"></i>
                        </button>
                    </div>
                    <div class="nav-item d-md-block d-none">
                        <button class="navbar-toggler d-block nav-link" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasCart" aria-controls="offcanvasCart" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <i class="fa-solid fa-bag-shopping position-relative fs-2">
                                <span class="badge bg-cyan badge-notification badge-blink"></span>
                            </i>
                        </button>
                    </div>
                    <div class="nav-item dropdown d-none d-md-flex">
                        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                            aria-label="Show notifications" aria-expanded="false">
                            <i class="fa-solid fa-bell position-relative fs-2">
                                <span class="badge bg-cyan badge-notification badge-blink"></span>
                            </i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                            @include('public.layouts.components.notification')
                        </div>
                    </div>
            </div>
            <div class="nav-item dropdown px-2">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url({{ auth()->user()->avatar() }})"></span>
                    @auth
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ auth()->user()->fullname() }}</div>
                            <div class="mt-1 small text-muted">{{ auth()->user()->roleName() }}</div>
                        </div>
                    @endauth
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    @auth
                        <a href="{{ route('profile.index') }}" class="dropdown-item">@lang('profile')</a>
                        <a href="{{ route('security.change_password') }}" class="dropdown-item">@lang('security')</a>
                        <a href="{{ route('order.index') }}" class="dropdown-item">@lang('order')</a>
                        <div class="dropdown-divider"></div>
                    @endauth
                    @auth
                        <x-form :action="route('logout')" type="post">
                            <button type="submit" class="dropdown-item">@lang('logout')</button>
                        </x-form>
                    @endauth
                </div>
            </div>
        @else
            <a href="{{ route('login.index') }}" class="btn rounded-5 gap-2" rel="noreferrer">
                <i class="fa-solid fa-user"></i>
                <span class="d-lg-block d-none">
                    Đăng nhập
                </span>
            </a>
            @endif
        </div>
    </header>
</div>

@include('public.layouts.components.menu-sidebar')
@include('public.layouts.components.offcanvas_search')
@include('public.layouts.components.offcanvas_cart')
