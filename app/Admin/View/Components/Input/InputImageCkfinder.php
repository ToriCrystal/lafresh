<?php

namespace App\Admin\View\Components\Input;

class InputImageCkfinder extends Input
{

    public $value;

    public $showImage;

    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $showImage, $type = 'text', $value = '', $required = false, $isEmpty = false)
    {
        //
        parent::__construct($type, $required);
        
        $this->name = $name;
        
        $this->showImage = $showImage;
        
        $this->value = $isEmpty === false ? ($value ?: config('custom.images.default')) : $value;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.image-ckfinder');
    }
}
