<section class="news-section" id="news_section">
    <div class="container">
        <div class="hr-text">
            <span class="title-section">Tin tức</span>
        </div>
        <div class="row py-2 flex-wrap flex-row">
            <div class="owl-carousel">
                @foreach ($posts as $post)
                    <div class="item">
                        <a href="{{ route('post.show', $post->slug) }}" class="text-decoration-none"><img
                                src="{{ asset($post->feature_image) }}" alt="">
                            <div class="news-content row justify-content-center py-3 px-3">
                                <div class="col-12 mb-2">
                                    <span>
                                        <span class="news-title text-uppercase mt-3">
                                            {{ $post->title }}
                                        </span>
                                    </span>
                                </div>
                                <div class="col-12 mb-2">
                                    <span class="blog-desc"> {{ $post->excerpt }}
                                    </span>
                                </div>
                                <div class="col-12 mb-2">
                                    <a href="{{ route('post.show', $post->slug) }}" class="text-decoration-none">Xem
                                        thêm</a>
                                </div>
                            </div>

                        </a>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
</section>
