@extends('public.layouts.master')

@section('content')
    @include('public.layouts.breadcrums', [
        'breadcrums' => [['label' => trans('Thanh toán Giỏ hàng')]],
    ])
    <!-- Content -->
    <form action="{{ route('checkout.payCart') }}" method="post">
        @csrf
        <div class="container my-4">
            <div class="row">
                <div class="col-lg-4 col-12 my-4">

                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title title-text pb-2 border-bottom">Thông tin thanh toán</h2>
                            @include('public.checkout.include.form')
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title title-text pb-2 border-bottom">Thông tin bổ sung</h2>
                            <textarea class="form-control shadow-none" name="note" id="" cols="30" rows="10"
                                placeholder="Ghi chú về đơn hàng, ví dụ: Thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title title-text pb-2 border-bottom">Phương thức giao hàng</h2>
                            <div class="col d-flex align-items-center mb-3">
                                <label class="form-check-label">
                                    <input type="radio" name="shipping_method" id="ship-cod"
                                        class="px-2 form-check-input" value="cod">
                                    Trả tiền mặt khi nhận hàng
                                    <img src="{{ asset('public/assets/images/icon_COD.svg') }}" alt="COD Icon">
                                </label>
                            </div>
                            <div class="col d-flex align-items-center mb-3">
                                <label class="form-check-label">
                                    <input type="radio" name="shipping_method" id="transfer"
                                        class="px-2 form-check-input" value="transfer">
                                    Chuyển khoản
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title title-text pb-2 border-bottom">Thông tin chuyển khoản</h2>
                            <img src="{{ asset('') }}" alt="">
                            <small class="fw-bold">CÚ PHÁP: TÊN KHÁCH HÀNG - SỐ ĐIỆN THOẠI</small>
                        </div>
                    </div>


                </div>
                <div class="col-lg-8 col-12 my-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title title-text pb-2 border-bottom">Đơn hàng</h2>
                            <div class="table-responsive overflow-auto" style="max-height: 480px">
                                @include('public.checkout.include.tablecart')
                            </div>

                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="card-title d-flex flex-column">
                                <div class="d-flex align-items-center justify-content-between border-bottom mb-3 pb-2">
                                    <h3>Số lượng:  {{$totalSl}}</h3>
                                    <h3> {{$totalProduct}} sản phẩm </h3>
                                </div>
                                <div class="d-flex justify-content-between title-text">
                                    <h2 class="mb-0">Tổng cộng</h2>
                                    <h1 id="totalPrice" class="mb-0 text-lowercase">
                                      {{format_price($totalPrice)}} </h1>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center">
                        <input type="checkbox" id="confirm-checkout" class="form-check-input">
                        <label for="#" class="pt-1 px-2">Tôi đồng ý xác nhận đơn hàng bên trên.</label>
                    </div>

                    <div class="d-flex flex-row justify-content-end py-2 gap-2">
                        <a type="button" href="{{ route('product.index') }}"
                            class=" title-text text-uppercase shadow-none d-flex align-items-center text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1"></path>
                            </svg>
                            <span class="px-2"> Tiếp tục mua hàng</span>
                        </a>

                        <button type="submit" class="btn btn-danger fw-bold text-uppercase shadow-none disabled"
                            id="btn-confirm-checkout" data-bs-toggle="modal" data-bs-target="#modal-success">Xác
                            nhận thanh
                            toán</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
