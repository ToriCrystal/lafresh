@extends('public.layouts.master')

@section('content')
    @include('public.layouts.breadcrums', [
        'breadcrums' => [['label' => trans('collaboration')]],
    ])

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-9 col-12">
                <h1 class="title-section mb-3" style="font-size: 2em">Rocky Canada Opticians Có Gì ?</h1>
                <h2 class="fw-bold mb-3">Liên kết – Tiếp thị Bán hàng với ROCKY CANADA OPTICIANS</h2>
                <br>
                <p style="font-size: 16px">Là chương trình đặt biệt dành cho các khách hàng mong muốn Hợp Tác kinh doanh, tạo
                    ra cơ hội bán hàng cho
                    Bạn kinh doanh với các sản phẩm đa dạng và chất lượng đạt tiêu chuẩn cao và kiểm tra khắc khe cũng như
                    khuyên dùng đến từ các Chuyên gia Nhãn Khoa Canada và thị trường Bắc Mỹ.</p>
                <br>
                <p style="font-size: 16px">Đặc biệt, khi Liên kết với chúng tôi, Bạn không phải chịu bất cứ một ràng buộc, áp
                    lực nào về doanh số!
                    Bạn
                    tự quyết định doanh số, tự quyết định thu nhập (Hoa hồng/lợi nhuận) của mình!</p>
                <br>
                <br>
                <p style="font-size: 16px"> Mọi sự chủ động chúng tôi luôn dành cho Bạn !
                </p>
            </div>
        </div>

    </div>
@endsection
