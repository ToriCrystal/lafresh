@extends('public.layouts.master')

@section('content')
    @include('public.layouts.breadcrums', [
        'breadcrums' => [['label' => trans('Về Rocky Canada Opticians')]],
    ])
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-9 col-12">
                <h1 class="title-section mb-3" style="font-size: 2em">Về Rocky Canada Opticians</h1>
                <img src="{{ asset('assets/images/company_1.jpg') }}" alt="" class="img-fluid mb-3">
                <h1 class="title-section mb-3" style="font-size: 2em">ROCKY LENS - STAY AT YOUR BEST HEALTHY</h1>
                <p>Rocky Lens – Thương hiệu tròng kính được tạo nên bởi những chuyên gia khúc xạ Canada. Sự tận tâm, công
                    nghệ kỹ thuật tiên tiến và dịch vụ chất lượng cao đã giúp Rocky Lens trở thành thương hiệu tròng kính
                    ngày càng được tin dùng. Vì vậy, Rocky Lens mong muốn có thể đem sản phẩm tốt, chất lượng quốc tế (theo
                    tiêu chuẩn khu vực Bắc Mỹ) về thị trường Việt Nam. Để đáp ứng nhu cầu ngày càng tăng và đa dạng hóa của
                    người tiêu dùng, Rocky Lens đem tới các giải pháp thị lực ở mọi phân khúc giá cùng các tính năng ưu việt
                    bảo vệ mắt toàn diện.</p>
                <h1 class="title-section mb-3" style="font-size: 2em">CHỨNG CHỈ HÀNH NGHỀ CỦA ĐỘI NGŨ ROCKY</h1>
                <p>Dưới sự cố vấn của các chuyên gia khúc xạ hàng đầu, cùng đội ngũ Rocky Lens uy tín có chứng chỉ hành nghề
                    tại Canada đã cho ra mắt những dòng sản phẩm chất lượng cao đáp ứng nhu cầu thị lực của bất cứ ai, ở bất
                    cứ nơi đâu. Bên cạnh việc đảm bảo về vấn đề thị lực, Rocky Lens còn bảo vệ toàn diện đôi mắt của bạn
                    trước những tác hại không thể tránh khỏi từ môi trường và đem lại cảm giác thoải mái nhất khi sử dụng.
                </p>
                <img src="{{ asset('assets/images/company_2.jpg') }}" alt="" class="img-fluid mb-3">
                <h1 class="title-section mb-3 text-center" style="font-size: 2em">CÁC HOẠT ĐỘNG CỦA ROCKY</h1>
                <p class="fw-bold text-center">ROCKY LENS ĐỒNG HÀNH CÙNG GIẢI BÓNG ĐÁ NGÀNH KÍNH MIỀN NAM LẦN 8 - ROCKY
                    OPTIC LEAGUE 2022

                </p>
                <img src="{{ asset('assets/images/company_3.jpg') }}" alt="" class="img-fluid mb-3">
                <img src="{{ asset('assets/images/company_4.jpg') }}" alt="" class="img-fluid mb-3">
                <h1 class="title-section mb-3 text-center" style="font-size: 2em">ROCKY LENS ĐỒNG HÀNH CÙNG CHƯƠNG TRÌNH
                    "MẮT SÁNG KHỎE - TRẺ VUI XUÂN" - XUÂN TÌNH NGUYỆN 2023
                </h1>
                <img src="{{ asset('assets/images/company_5.jpg') }}" alt="" class="img-fluid mb-3">
                <img src="{{ asset('assets/images/company_6.jpg') }}" alt="" class="img-fluid mb-3">
                <h1 class="title-section mb-3 text-center" style="font-size: 2em">ĐÓN TIẾP ĐOÀN ĐẠI BIỂU TỪ CANADA ĐẾN THĂM
                    ROCKY LENS VIỆT NAM
                </h1>
                <img src="{{ asset('assets/images/company_7.png') }}" alt="" class="img-fluid mb-3">
                <img src="{{ asset('assets/images/company_8.png') }}" alt="" class="img-fluid mb-3">



            </div>
        </div>
    </div>
@endsection
