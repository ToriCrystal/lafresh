@extends('public.layouts.master')

@section('content')
    @include('public.layouts.breadcrums', [
        'breadcrums' => $breadcrums,
    ])
    <!-- Content -->
    <main class="container py-5">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <div>
                    <h1 class="title-section mb-3" style="font-size: 2em">{{ $posts['title'] }}</h1>
                    <div class="product-last-seen">
                        @foreach ($posts->categories as $category)
                            <span class="title-product fw-bold fst-italic">Chuyên mục: {{ $category->name }}.</span>
                        @endforeach
                        <strong> - </strong>
                        <span class="fw-bold fst-italic">Ngày viết: {{ $posts->created_at->format('d/m/Y') }}</span>
                    </div>
                    <br>
                    <p>{!! $posts['excerpt'] !!}</p>
                    <p>{!! $posts['content'] !!}</p>
                </div>
            </div>
            <aside class="col-md-3">
                <div class="py-4">
                    <h5 class=" text-primary fw-bold text-uppercase title-sidebar pb-2">Bài viết liên quan</h5>
                    @foreach ($related as $post)
                        <a href="{{ route('post.show', $post->slug) }}" class="text-decoration-none">
                            <div class="text-center py-3 mb-5 box-blog">
                                <img src="{{ asset($post->feature_image) }}" alt="Bài viết" class="img-fluid">
                                <a href="{{ route('post.show', $post->slug) }}"
                                    class="text-uppercase mt-3 fw-bold nav-link pb-3">{{ $post->title }}</a>
                                <span class="d-flex gap-2">
                                    <p class="fw-normal text-black-50">Ngày viết: {{ $post->created_at->format('d/m/Y') }}
                                    </p>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </aside>
        </div>
    </main>
@endsection
