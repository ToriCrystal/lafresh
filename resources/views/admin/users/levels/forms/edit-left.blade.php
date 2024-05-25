<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin cấp bậc Thành viên') }}</h2>
        </div>
        <div class="row card-body">
            <!-- name -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tên cấp bậc') }}:</label>
                    <x-input name="name" :value="$user_level->name" :required="true" :placeholder="__('Tên cấp bậc')" />
                </div>
            </div>
            <!-- type_discount -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Loại') }}:</label>
                    <x-select name="type_discount" :required="true">
                        <x-select-option value="" :title="__('Chọn Loại')" />
                        @foreach ($user_level_type_discount as $key => $value)
                            <x-select-option :option="$user_level->type_discount->value" :value="$key" :title="__($value)" />
                        @endforeach
                    </x-select>
                </div>
            </div>
            <!-- min_amount -->
            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Số tiền lên cấp') }}:</label>
                    <x-input-number name="min_amount" :value="$user_level->min_amount" :required="true"
                        :placeholder="__('Số tiền lên cấp')" />
                </div>
            </div>
            <!-- plain_value -->
            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Giá trị') }}:</label>
                    <x-input-number name="plain_value" :value="$user_level->plain_value" :placeholder="__('Giá trị')" :required="true" />
                </div>
            </div>
            <!-- position -->
            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Thứ tự') }}:</label>
                    <x-input type="number" name="position" :value="$user_level->position" :placeholder="__('Thứ tự')" :required="true" />
                </div>
            </div>
        </div>
    </div>
</div>