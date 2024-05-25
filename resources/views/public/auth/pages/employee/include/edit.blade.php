<div>
    <div class="card-header border-bottom mb-3">
        <h2 class="fw-bold">
            Thông tin nhân viên
        </h2>
    </div>
    <div class="card-body row align-items-center">
        <div class="col-lg-6 col-12">
            <label class="col-form-label required">Họ và tên</label>

            <input type="username" class="form-control shadow-none" aria-describedby="emailHelp"
                placeholder="Nhập họ và tên" required>

        </div>
        <div class="col-lg-6 col-12">
            <label class="col-3 col-form-label required">Email</label>
            <div class="col">
                <input type="email" class="form-control shadow-none" placeholder="Địa chỉ email">
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <label class="required col-form-label">Điện thoại</label>
            <input type="number" class="form-control shadow-none" placeholder="Số điện thoại">
        </div>
        <div class="col-lg-6 col-12">
            <label class="col-form-label">Giới tính</label>
            <select required="required" data-parsley-required-message="Trường này không được bỏ trống."
                class="form-select shadow-none" name="gender">
                <option value="1">Nam</option>
                <option value="2">Nữ</option>
                <option value="3">Khác</option>
            </select>
        </div>
        <div class="col-lg-6 col-12">
            <div class="col-form-label">Ngày sinh</div>

            <div class="input-icon">
                <input class="form-control " placeholder="Ngày sinh" id="datepicker-icon" value="2020-06-20">
                <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z">
                        </path>
                        <path d="M16 3v4"></path>
                        <path d="M8 3v4"></path>
                        <path d="M4 11h16"></path>
                        <path d="M11 15h1"></path>
                        <path d="M12 15v3"></path>
                    </svg>
                </span>

            </div>

        </div>
        <div class="col-lg-6 col-12">
            <label class="col-form-label required">Địa chỉ</label>
            <input type="text" class="form-control shadow-none" placeholder="Địa chỉ..">
        </div>

        <div class="col-lg-6 col-12">
            <label class="col-form-label required">Mật khẩu</label>
            <input type="password" class="form-control shadow-none" placeholder="Mật khẩu">
        </div>
        <div class="col-lg-6 col-12">
            <label class="col-form-label required">Xác nhận mật khẩu</label>
            <input type="password" class="form-control shadow-none" placeholder="Xác nhận mật khẩu">
        </div>



    </div>
    <a href="#" class="ms-auto btn btn-cyan mt-3">Lưu thay đổi</a>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.Litepicker && (new Litepicker({
            element: document.getElementById('datepicker-icon'),
            buttonText: {
                previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
            },
        }));
    });
</script>
