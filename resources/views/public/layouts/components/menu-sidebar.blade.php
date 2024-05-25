<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasStart" aria-labelledby="offcanvasStartLabel">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title fw-bold" id="offcanvasStartLabel">Danh mục</h1>
        <button type="button" class="btn-close text-reset shadow-none" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body py-0">
        <ul class="list-unstyled">
            @if ($menu && $menu->items)
                @foreach ($menu->items->toTree() as $item)
                    @if ($item->hasChild())
                        <li class="nav-item border-bottom py-3">
                            <a class="nav-link d-flex justify-content-between" data-bs-toggle="collapse"
                                href="#{{ $item->id }}" role="button" aria-expanded="false">
                                {{ $item->title }}
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-chevron-down" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 9l6 6l6 -6" />
                                </svg>
                            </a>
                            @foreach ($item->children as $children)
                                <ul class="collapse list-unstyled ps-3" id="{{ $children->parent_id }}">
                                    <li class="my-2">
                                        <a class="nav-link d-flex align-items-center" href="{{ $children->getUrl() }}">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-minus" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l14 0" />
                                            </svg>
                                            <span class="px-2">{{ $children->title }}</span>
                                        </a>
                                    </li>
                                </ul>
                            @endforeach
                        </li>
                    @else
                        <li class="nav-item border-bottom py-3">
                            <a class="nav-link" href="{{ $item->getUrl() }}">
                                <span class="nav-link-title">
                                    {{ $item->title }}
                                </span>
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
            @auth
                <li class="nav-item border-bottom py-3">
                    <a href="{{ route('profile.index') }}" class="dropdown-item">@lang('profile')</a>
                </li>

                <li>
                    {{-- <a href="{{ route('shopping_cart.index') }}" class="dropdown-item">@lang('cart')</a> --}}
                </li>

            @endauth
            @guest
                <li class="nav-item border-bottom py-3">
                    <a href="{{ route('login.index') }}" class="dropdown-item">@lang('login')</a>
                </li>
                <li class="nav-item border-bottom py-3">
                    <a href="{{ route('register.index') }}" class="dropdown-item">@lang('register')</a>
                </li>
            @endguest
            @auth
                <x-form :action="route('logout')" type="post">
                    <button type="submit" class="dropdown-item">@lang('logout')</button>
                </x-form>
            @endauth
        </ul>
    </div>
</div>
