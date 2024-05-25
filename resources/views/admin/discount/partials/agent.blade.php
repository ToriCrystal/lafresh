<div class="card">
    <div class="card-body">
        <div class="mt-1">
            <span class="text-info fw-bold">@lang('Chú ý:') <br>
                @lang('Đạt cấp 2 khi đơn hàng lớn hơn 5 triệu') <br>
                @lang('Đạt cấp 1 khi đơn hàng lớn hơn 10 triệu')
            </span>
        </div>
        @each('admin.discount.partials.item-agent-discount', $agent, 'agent')
    </div>
</div>
