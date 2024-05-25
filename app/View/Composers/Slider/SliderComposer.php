<?php

namespace App\View\Composers\Slider;

use Illuminate\View\View;

class SliderComposer
{
    protected $repoSlider;

    public function __construct()
    {
        $this->repoSlider = app()->make('App\Repositories\Slider\SliderRepositoryInterface');
    }

    public function compose(View $view)
    {
        $sliderKeys = [
            config('custom.sliders.banner-1-slider'),
            config('custom.sliders.blog-slider'),
            config('custom.sliders.banner-2-slider'),
        ];

        $sliders = $this->repoSlider->getBy([
            ['plain_key', 'in', $sliderKeys],
        ], ['items']);

        $view->with([
            'sliders' => $sliders,
        ]);
    }
}