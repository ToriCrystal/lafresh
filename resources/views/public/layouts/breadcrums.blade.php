<!-- Breadcrumb -->
<div class="bg-body-secondary">
    <div class="container py-3 ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <x-link :href="route('home.index')" class="text-decoration-none text-dark"
                        :title="trans('Trang chủ')" />
                </li>
                @foreach ($breadcrums as $breadcrum)
                <li @class(['breadcrumb-item', 'active'=> $loop->last])>
                    @if (isset($breadcrum['url']))
                    <x-link :href="$breadcrum['url']" class="text-decoration-none text-dark"
                        :title="$breadcrum['label']" />
                    @else
                    <span class="text-decoration-none text-dark">{{ $breadcrum['label'] }}</span>
                    @endif
                </li>
                @endforeach
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb -->
