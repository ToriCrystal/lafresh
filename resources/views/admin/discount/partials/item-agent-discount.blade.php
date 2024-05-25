<h4 class="mt-2">@lang('Cấp') {{ $agent->discount_data['level'] }}</h4>
<div class="table-responsive position-relative">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>@lang('Loại sản phẩm')</th>
                <th>@lang('Tỷ lệ')</th>
                <th>@lang('Thao tác')</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>@lang('Thùng')</td>
                <td class="text-secondary" style="white-space: nowrap;">
                    <span class="display-value">{{ $agent->discount_data['pail'] }} %</span>
                    <div class="input-group edit-input" style="display: none; ">
                        <input type="number" class="form-control input-value" value="{{ $agent->discount_data['pail'] }}">
                        <button class="btn" type="button">%</button>
                    </div>
                </td>
                <td class="text-secondary">
                    <button class="btn btn-icon btn btn-outline-warning edit-btn">
                        <i class="ti ti-edit"></i>
                    </button>
                    <button class="btn btn-icon btn btn-success save-btn" data-id="{{ $agent->id }}"
                        data-url="{{ route('admin.discount.edit.agent') }}" data-unit="1" style="display: none;">
                        <i class="ti ti-device-floppy"></i>
                    </button>
                </td>
            </tr>

            <tr>
                <td>@lang('Bình')</td>
                <td class="text-secondary" style="white-space: nowrap;">
                    <span class="display-value">{{ $agent->discount_data['bottle'] }} %</span>
                    <div class="input-group edit-input" style="display: none; ">
                        <input type="number" class="form-control input-value" name=""
                            value="{{ $agent->discount_data['bottle'] }}">
                        <button class="btn" type="button">%</button>
                    </div>
                </td>
                <td class="text-secondary">
                    <button class="btn btn-icon btn btn-outline-warning edit-btn">
                        <i class="ti ti-edit"></i>
                    </button>
                    <button class="btn btn-icon btn btn-success save-btn" data-id="{{ $agent->id }}" 
                        data-url="{{ route('admin.discount.edit.agent') }}" data-unit="2" data-id="{{ $agent->id }}" style="display: none;">
                        <i class="ti ti-device-floppy"></i>
                    </button>
                </td>
            </tr>

        </tbody>
    </table>
</div>
