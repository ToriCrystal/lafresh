<div class="floating-cart nav-item dropdown d-md-block d-none">
    <a class="nav-link dropdown-toggle show" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside"
        role="button" aria-expanded="true">
        <div class="floating item">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="floating count">9</span>
        </div>
    </a>
    <div class="dropdown-menu cart" data-bs-popper="static">
        @include('public.layouts.components.cart')
    </div>
</div>