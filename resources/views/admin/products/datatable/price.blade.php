
@if ($price_promotion)
    <span class="promotion-price">{{ format_price($price_promotion) }}</span>
    <span class="mx-1">-</span>
    <span class="price"><s>{{ format_price($price) }}</s></span>
@else
    <span class="price">{{ format_price($price) }}</span>
@endif

