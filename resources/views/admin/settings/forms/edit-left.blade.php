<div class="card h-100">
    <div class="card-header justify-content-center">
        <h2 class="mb-0">{{ $title ?? __('Thông tin cài đặt') }}</h2>
    </div>
    <div class="row card-body wrap-loop-input">
        @foreach ($settings as $setting)
            <div class="col-12">
                <div class="mb-3">
                    <label for="">{{ $setting->setting_name }}</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ __($setting->desc) }}">
                        <i class="ti ti-bulb"></i>
                    </span>
                    <x-dynamic-component :component="$setting->getNameComponent()" 
                        :name="$setting->setting_key" 
                        :value="$setting->plain_value" 
                        showImage="{{ $setting->setting_key }}"
                        :required="true"/>
                </div>
            </div>
        @endforeach
    </div>
</div>