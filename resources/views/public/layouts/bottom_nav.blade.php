<nav class="d-md-none bg-white fixed-bottom d-flex align-items-center shadow-lg" style="height: 70px">
    <div class="container-fluid position-relative">
        <div class="nav-item">
            <ul class="d-flex justify-content-around navbar-nav flex-row">
                <li>
                    <a href="{{ route('home.index') }}"
                        class="nav-link d-flex flex-column justify-content-center align-items-center gap-2">
                        <i class="fa-solid fa-house"></i>
                        Trang chủ

                    </a>
                </li>
                <li>
                    <a href="{{ route('product.index') }}"
                        class="nav-link d-flex flex-column justify-content-center align-items-center gap-2">
                        <i class="fa-solid fa-list"></i>
                        Sản phẩm
                    </a>
                </li>
                <li>
                    <a href="{{ route('order.index') }}"
                        class="nav-link d-flex flex-column justify-content-center align-items-center gap-2">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        Lịch sử đặt hàng
                    </a>
                </li>
                <li>
                    <a href="{{ route('notification.index') }}"
                        class="nav-link d-flex flex-column justify-content-center align-items-center gap-2">
                        <i class="fa-solid fa-bell"></i>
                        Thông báo
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.index') }}"
                        class="nav-link d-flex flex-column justify-content-center align-items-center gap-2">
                        <i class="fa-solid fa-circle-user"></i>
                        Tài khoản
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
