<section class="gallery-section mb-3" id="gallery_section">
    <div class="container">
        <div class="row">
            @if($slider = $sliders->firstWhere('plain_key', config('custom.sliders.banner-2-slider')))
            @foreach($slider->items as $sliderItem)
            <div class="col-md-3 col-6 mb-3">
                <div @class([ 'card' , 'active'=> $loop->first,
                    ]) data-bs-interval="2000">
                    <img src="{{asset($sliderItem->image) }}" class="d-block w-100" alt="Gallery Image">
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>