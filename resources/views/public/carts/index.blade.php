@extends('public.layouts.master')

@section('content')
    @include('public.layouts.breadcrums', [
        'breadcrums' => [['label' => trans('Giỏ hàng')]],
    ])
    <!-- Content -->
    <div class="container">
        <div class="hr-text">
            <h2 class="text-uppercase fw-bold title-section py-3 text-dark bg-transparent">Giỏ hàng của bạn</h2>
        </div>

        <div class="row align-items-start">
            <div class="col-md-8 col-12">
                @if ($pr->isEmpty())
                    <span>Bạn đang có <strong>0</strong> sản phẩm trong giỏ hàng</span>
                @else
                    @foreach ($pr as $key => $item)
                        <div class="card my-3">
                            {{-- Item --}}
                            <div class="d-flex mb-3 p-3 justify-content-between align-items-center">
                                <div class="col-3"><img src="{{ asset('assets/images/viva-18.5.jpg') }}" alt="">
                                </div>
                                <div class="col-9 px-3">
                                    <span class="title-text fw-bold">{{ $item->name }}</span>
                                    <div class="d-flex flex-row my-2 justify-content-between">
                                        <span class="fw-bold text-dark">{{ $sl[$key] }} x
                                            {{ format_price($item->price_promotion) }}</span>
                                        <span class="fw-bold text-dark text-muted"><span
                                                class="text-decoration-line-through"></span></span>
                                    </div>
                                    <div class="border-bottom mb-3"></div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <x-button.modal-delete class="btn-icon"
                                            data-route="{{ route('cart.delete', $id[$key]) }}"
                                            data-id="{{ $id[$key] }}">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </x-button.modal-delete>
                                        <span class="text-danger fw-bold ms-auto">{{ format_price($price[$key]) }}</span>
                                    </div>
                                </div>
                            </div>
                            {{-- Item --}}
                        </div>
                    @endforeach
                @endif
            </div>
            @include('public.carts.include.sidebar-cart')
        </div>
    </div>

@endsection
