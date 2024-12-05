<?php

namespace App\View\Components;

use App\Models\FoodProduct;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FoodItem extends Component
{
    /**
     * Create a new component instance.
     */
    public FoodProduct $food;

    public function __construct(FoodProduct $food){
        $this->food = $food;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.food-item');
    }
}
