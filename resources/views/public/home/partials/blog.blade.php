<section class="blog-section py-3" id="blog_section">
    <div class="container">
        <div class="row">
            @if($slider = $sliders->firstWhere('plain_key', config('custom.sliders.blog-slider')))
            @foreach($slider->items as $sliderItem)
            @if( $sliderItem->position == 1)
            <div class="col-md-6 col-12 d-flex flex-column justify-content-between">
                <div class="col">
                    <div @class([ 'card' , 'active'=> $loop->first,
                        ]) data-bs-interval="2000">
                        <img src="{{asset($sliderItem->image) }}" class="d-block w-100" alt="Blog Image">
                    </div>
                </div>
                @elseif( $sliderItem->position == 2)
                <div class="col">
                    <div @class([ 'card' , 'active'=> $loop->first,
                        ]) data-bs-interval="2000">
                        <img src="{{asset($sliderItem->image) }}" class="d-block w-100" alt="Blog Image">
                    </div>
                </div>
            </div>
            @elseif($sliderItem->position == 3)
            <div class="col-md-6 col-12">
                <div @class([ 'card' , 'active'=> $loop->first,
                    ]) data-bs-interval="2000">
                    <img src="{{asset($sliderItem->image) }}" class="d-block w-100" alt="Blog Image">
                </div>
            </div>
            @endif
            @endforeach
            @endif
        </div>
    </div>
</section>