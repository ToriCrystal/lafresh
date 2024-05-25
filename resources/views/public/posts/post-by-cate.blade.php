@extends('public.layouts.master')

@section('content')
@include('public.layouts.breadcrums', [
'breadcrums' => [['label' => trans('Tin tức')]],
])
<section id="activism_section" class="activism-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-12">
                <h1 class="title-section mb-3" style="font-size: 2em">Chuyên mục: {{ $categories->name }}
                </h1>

                <div class="blog">
                    @if ($posts)
                    @if ($posts->count() > 0)
                    <ul>
                        @foreach ($posts as $post)
                        <div class="row row-0 gap-3 mb-3">
                            <div class="col-3">
                                <a href="{{ route('post.show', $post->slug) }}"><img src="{{ asset($post->image) }}" class="w-100 h-100 object-cover card-img-start" alt="Bài Post"></a>
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <a href="{{ route('post.show', $post->slug) }}">
                                        <h4 class="card-title title-text">{{ $post->title }}</h4>
                                    </a>
                                    <p>Ngày viết: {{$post->created_at->format('d/m/Y')}}</p>
                                    <p class="text-muted">{!! Str::limit(strip_tags($post->content), 500) !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </ul>
                    @else
                    <p>Không có bài viết thuộc danh mục này.</p>
                    @endif
                    @else
                    <p>Danh mục không tồn tại hoặc không có bài viết.</p>
                    @endif
                </div>

            </div>
            <aside class="col-md-3">
                <div class="py-4">
                    <h3 class="fw-bold text-uppercase title-color">Chuyên mục</h3>
                    <ul class="text-primary categories-blog list-unstyled">
                        @foreach ($getAllCate as $cat)
                        <li class="py-3 border-bottom"><a href="{{ route('posts.show_category', $cat->slug) }}" class="text-decoration-none">{{ $cat->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
