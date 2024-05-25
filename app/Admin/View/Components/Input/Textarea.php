<?php

namespace App\Admin\View\Components\Input;

class Textarea extends Input
{
    public $value;
    public function __construct($type = 'text', $required = false, $value = '')
    {
        parent::__construct($type, $required);
        $this->value = $value;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.textarea');
    }
}
