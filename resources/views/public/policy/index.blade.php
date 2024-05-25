@extends('public.layouts.master')

@section('content')
    <section class="policy-section" id="policy_section">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-9">
                    <h1 class="title-section" style="font-size: 2em">Là Người Tiêu Dùng Thông Thái, Bạn Cần Quan Tâm Sau.</h1>
                    <div class="card-body">
                        <div class="accordion border-0" id="accordion-example">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-1" aria-expanded="false">
                                        ĐIỀU KHOẢN MUA HÀNG THƯƠNG MẠI ĐIỆN TỬ
                                    </button>
                                </h2>
                                <div id="collapse-1" class="accordion-collapse collapse" data-bs-parent="#accordion-example"
                                    style="">
                                    <div class="accordion-body pt-0">
                                        @include('public.policy.include.terms')
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-2" aria-expanded="false">
                                        DÃY ĐỘ SẢN PHẨM
                                    </button>
                                </h2>
                                <div id="collapse-2" class="accordion-collapse collapse"
                                    data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                        <img src="{{ asset('assets/images/policy_1.png') }}" class="img-fluid"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-3" aria-expanded="false">
                                        PHƯƠNG THỨC MUA HÀNG
                                    </button>
                                </h2>
                                <div id="collapse-3" class="accordion-collapse collapse"
                                    data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                        <strong>This is the third item's accordion body.</strong> It is hidden by
                                        default,
                                        until
                                        the
                                        collapse plugin adds the appropriate classes that we use to style each element.
                                        These
                                        classes control the overall appearance, as well as the showing and hiding via
                                        CSS
                                        transitions. You can modify any of this with custom CSS or overriding our
                                        default
                                        variables.
                                        It's also worth noting that just about any HTML can go within the
                                        <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-4" aria-expanded="false">
                                        PHƯƠNG THỨC THANH TOÁN
                                    </button>
                                </h2>
                                <div id="collapse-4" class="accordion-collapse collapse"
                                    data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                        <strong>This is the fourth item's accordion body.</strong> It is hidden by
                                        default,
                                        until
                                        the collapse plugin adds the appropriate classes that we use to style each
                                        element.
                                        These
                                        classes control the overall appearance, as well as the showing and hiding via
                                        CSS
                                        transitions. You can modify any of this with custom CSS or overriding our
                                        default
                                        variables.
                                        It's also worth noting that just about any HTML can go within the
                                        <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-5" aria-expanded="false">
                                        PHƯƠNG THỨC GIAO HÀNG
                                    </button>
                                </h2>
                                <div id="collapse-5" class="accordion-collapse collapse"
                                    data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                        @include('public.policy.include.delivery')
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-6">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-6" aria-expanded="false">
                                        QUY ĐỊNH BẢO HÀNH - ĐỔI HÀNG
                                    </button>
                                </h2>
                                <div id="collapse-6" class="accordion-collapse collapse"
                                    data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                        @include('public.policy.include.guarantee')
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-7">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-7" aria-expanded="false">
                                        CHÍNH SÁCH BẢO MẬT THÔNG TIN KHÁCH HÀNG
                                    </button>
                                </h2>
                                <div id="collapse-7" class="accordion-collapse collapse"
                                    data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                        @include('public.policy.include.security')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
