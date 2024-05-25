<div class="mb-5">
    <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner active">
            @if ($slider = $sliders->firstWhere('plain_key', config('custom.sliders.banner-1-slider')))
                @foreach ($slider->items as $sliderItem)
                    <div @class(['carousel-item', 'active' => $loop->first]) data-bs-interval="2000">
                        <img src="{{ asset($sliderItem->image) }}" class="d-block w-100" alt="Slide Image">
                    </div>
                @endforeach
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <div class="cicrle-button">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </div>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <div class="cicrle-button">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </div>
        </button>
    </div>
</div>
