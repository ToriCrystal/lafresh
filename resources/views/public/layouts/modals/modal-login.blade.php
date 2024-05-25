<!-- Modal Form -->
<div class="modal fade" id="ModalForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered justify-content-center">
        <div class="modal-content w-75">
            <!-- Login Form -->
            <form action="">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-uppercase">Đăng nhập</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="Email">Email<span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control shadow-none" id="email"
                            placeholder="Nhập Email">
                    </div>

                    <div class="mb-3">
                        <label for="Password">Mật khẩu<span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control shadow-none" id="Mật khẩu"
                            placeholder="Nhập mật khẩu">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex flex-row align-items-center gap-2">
                            <input class="form-check-input" type="checkbox" value="" id="remember" required>
                            <label class="form-check-label pt-1" for="remember">Ghi nhớ thiết bị.</label>
                        </div>
                        <a href="{{ route('reset_password.index') }}" class="float-end">Quên mật khẩu</a>
                    </div>
                </div>
                <div class="modal-footer pt-4">
                    <button type="button" class="btn btn-outline-primary fw-bold text-uppercase mx-auto w-100">Đăng
                        nhập</button>
                </div>
                <p class="text-center">Chưa có tài khoản, <a href="{{ route('register.index') }}">Đăng ký ngay</a></p>
            </form>
        </div>
    </div>
</div>
