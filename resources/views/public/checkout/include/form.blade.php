<form action="#" class="d-flex flex-column gap-3">
    @csrf
    <input type="text" name="customer_fullname" id="" placeholder="Họ tên" value=""
        class="form-control shadow-none mb-3">
    <input type="text" name="customer_email" id="" placeholder="Email" class="form-control shadow-none mb-3">
    <input type="text" name="customer_phone" id="" placeholder="Số điện thoại"
        class="form-control shadow-none mb-3">
    <input type="text" name="shipping_address" id="" placeholder="Địa chỉ"
        class="form-control shadow-none mb-3">
    {{-- <input type="text" name="note" id="" placeholder="Ghi chú" class="form-control shadow-none mb-3"> --}}
</form>
