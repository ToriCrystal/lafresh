<!-- Footer -->

@include('public.layouts.bottom_nav')
<footer class="bg-white">
    <div class="p-5 d-flex flex-column">
        <div class="d-flex flex-row gap-4 container flex-wrap">
            @if ($menu)
                @foreach ($menu->items as $item)
                    <a class="nav-link" href="{{ $item->getUrl() }}">
                        <span class="nav-link-title">
                            {{ $item->title }}
                        </span>
                    </a>
                @endforeach
            @endif
        </div>
        <hr>
        <div class="row justify-content-between">

            <div class="d-flex flex-column">
                <p class="text-uppercase fw-bold title-text">Hệ thống cửa hàng</p>
                <a href="#" class="text-decoration-none" style="color:#4872fa"><i
                        class="fa-solid fa-location-dot px-2"></i> {{ $settings['address'] }}</a>
            </div>
        </div>

    </div>
    <hr>
    <div class="d-flex container">
        <div class="col-12 text-center">
            <p>Copyright © 2024 <strong>Lafresh</strong>. Powered by Nhat</p>
        </div>
    </div>
    </div>
</footer>

<!-- Footer -->
