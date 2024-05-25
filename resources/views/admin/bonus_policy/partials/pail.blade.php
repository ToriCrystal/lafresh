<h3>@lang('Sản phẩm loại thùng')</h3>
<div class="table-responsive position-relative">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>@lang('Điểm doanh số')</th>
                <th>@lang('Thưởng')</th>
                <th>@lang('Thao tác')</th>
            </tr>
        </thead>
        <tbody>
            @each('admin.bonus_policy.partials.item-pail', $bonus_policy_pail, 'bonus_policy_pail')
        </tbody>
    </table>
</div>
