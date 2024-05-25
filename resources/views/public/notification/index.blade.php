@extends('public.layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- Page body -->
        <div class="page-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-12">
                        <h3 class="fw-bold text-uppercase">Tất cả thông báo</h3>
                        <hr>
                        @if ($notify != null && $notify->isNotEmpty())
                            @foreach ($notify as $note)
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h2 class="fw-bold mb-0">Tiêu đề:</h2>
                                            <h2 class="mb-0 px-2 fw-light">{{ $note->title }}</h2>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-start  flex-column mb-2">
                                            <h4 class="fw-bold">Nội dung:</h4>
                                            <span class=""> {!! $note->desc !!}</span>

                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold pe-2">Ngày gửi:</div>

                                            <div>{{ \Carbon\Carbon::parse($note->created_at)->format('d/m/Y - H:i:s') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div>Không có thông báo nào cả</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
