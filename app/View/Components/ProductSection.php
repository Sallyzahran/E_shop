<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductSection extends Component
{

    public $sectionCategory;
    public $products;

    public function __construct($products = null ,$sectionCategory=null)
    {
        $this->sectionCategory = $sectionCategory;
        $this->products = $products;
        if($sectionCategory){

            $this->products = $sectionCategory->products;
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-section');
    }
}
