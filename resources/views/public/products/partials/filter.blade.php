<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-6 mb-3">
            <x-form action="./" method="get" autocomplete="off" novalidate="">
                <label class="title-section mb-2">@lang('Tìm kiếm'):</label>
                <div class="input-icon">
                    <span class="input-icon-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                    </span>
                    <input type="text" value="" class="form-control" placeholder="Tìm kiếm"
                        aria-label="Search in website">
                </div>
            </x-form>
        </div>


        <div class="col-md-2 mb-3">
            <x-form :action="route('product.index')" type="get">
                <label class="title-section mb-2">@lang('Sắp xếp'):</label>
                <x-select onchange="this.form.submit()" name="sort" class="shadow-none" style="width: 100%">
                    @foreach (config('custom.product.sort') as $key => $title)
                        <x-select-option :option="request()->input('sort')" :value="$key" :title="$title" />
                    @endforeach
                </x-select>

            </x-form>
        </div>

    </div>
</div>
