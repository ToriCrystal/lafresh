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
                    <x-select-option :option="$notify->status" :value="$key" :title="$value" />
                @endforeach
            </x-select>
        </div>
    </div>

    <div class="card mb-3" style="width: 100%; overflow-y: auto;">
        <div class="card-header fw-bold ">
            {{ __('Đại Lý&Seller Đã Gửi') }}

        </div>
        <div class="card-body p-3" style="max-height: 200px;">
            <ul class="list-group">
                @foreach ($users as $user)
                    <li class="list-group-item"> <b>{{ $user->fullname }}</b> - {{ $user->phone }} <span
                            class='bg-green-lt p-1 '>Đã Gửi</span> <span><i class="ti ti-bulb"></i></span></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
