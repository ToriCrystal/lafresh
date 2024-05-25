<?php

namespace App\View\Composers\Product;

use Illuminate\View\View;

// class FilterProductComposer
// {
//     protected $repoAttribute;

//     public function __construct()
//     {
//         $this->repoAttribute = app()->make('App\Repositories\Attribute\AttributeRepositoryInterface');
//     }

//     public function compose(View $view)
//     {
//         $attributes = $this->repoAttribute->getBy(['filter' => true], ['variations']);
        
//         $view->with('attributes', $attributes);
//     }

// }