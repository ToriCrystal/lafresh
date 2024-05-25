<div class="col-12 col-md-4">
    <div class="card mb-3">
        <div class="card-header col-form-label">
            @lang('Hành Động')
        </div>
        <div class="card-body p-2">
            <div class="d-flex align-items-center h-100 gap-2">
                <x-button.submit :title="__('Gửi')" name="submitter" value="save" />
                <x-button type="submit" name="submitter" value="saveAndExit">
                    @lang('save&exit')
                </x-button>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Trạng thái') }}
        </div>
        <div class="card-body p-2">
            <x-select name="status" :required="true">
                @foreach ($status as $key => $value)
                    <x-select-option :value="$key" :title="$value" />
                @endforeach
            </x-select>
        </div>
    </div>

    <div class="card mb-3" style="width: 100%; overflow-y: auto;">
        <div class="card-header">
            {{ __('Đại Lý&Seller') }}
        </div>
        <div class="card-body p-3" style="max-height: 200px;">
            <x-select name="user_ids[]" class="select2-bs5-ajax" :required="true" multiple>
            </x-select>
        </div>
    </div>

</div>
