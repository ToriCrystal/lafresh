<?php

namespace App\Admin\View\Components\Input;
use App\Admin\Traits\Setup;

class InputGalleryCkfinder extends Input
{
    use Setup;
    public $value;

    public $name;
    public $label;
    public $btntext;
    public $preview;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $type = 'text', $value = '', $required = false, $label = '', $btntext = '')
    {
        //
        parent::__construct($type, $required);
        $this->name = $name;
        $this->value = $value;
        $this->label = $label ? $label : __('Hình ảnh');
        $this->btntext = $btntext ? $btntext : __('Thêm hình ảnh');
        $this->preview = 'galleryPreview'.$this->uniqidReal(5);
    }
    public function marcoValue($value){
        if(gettype($value) == 'object'){
            return $value ? implode(',', $value->toArray()) : '';
        }elseif(gettype($value) == 'array'){
            return $value ? implode(',', $value) : '';
        }
        return '';
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.gallery-ckfinder');
    }
}
