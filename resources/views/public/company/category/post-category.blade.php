@extends('public.layouts.master')

@section('content')
@include('public.layouts.breadcrums', [
'breadcrums' => [['label' => trans('Tin tức')]],
])
<section id="activism_section" class="activism-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-12">
                <h1 class="title-section mb-3" style="font-size: 2em">Tin tức
                </h1>

                <div class="blog">
                    @foreach ($posts as $post)
                    <div class="row row-0 gap-3 mb-3">
                        <div class="col-3">
                            <a href="{{ route('company.detail', $post->id) }}"><img src="{{ asset($post->image) }}" class="w-100 h-100 object-cover card-img-start" alt="Bài Post"></a>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <a href="{{ route('company.detail', $post->id) }}">
                                    <h4 class="card-title title-text">{{ $post->title }}</h4>
                                </a>
                                <p class="text-muted">{!! Str::limit(strip_tags($post->content), 500) !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {!! $posts->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</section>
@endsection
