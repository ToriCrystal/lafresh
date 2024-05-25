@foreach ($bonus_policy_bottle->detail as $value)
    <tr>
        <td>{{ $value->point }} <span class="badge bg-orange-lt">@lang('bình')</span></td>
        <td>
            <span class="display-value"> {{ $value->bonus }} <span
                    class="badge bg-orange-lt">@lang('đồng')</span>
            </span>
            <div class="input-group edit-input" style="display: none; ">
                <input type="number" class="form-control input-value" name="" value="{{ $value->bonus }}">
                <button class="btn" type="button">@lang('VND')</button>
            </div>
        </td>
        <td>
            <button class="btn btn-icon btn btn-outline-warning edit-btn">
                <i class="ti ti-edit"></i>
            </button>

            <button class="btn btn-icon btn btn-success save-btn" data-id="{{ $value->id }}"
                data-url="{{ route('admin.bonus.policy.update') }}" style="display: none;">
                <i class="ti ti-device-floppy"></i>
            </button>
        </td>
    </tr>
@endforeach
