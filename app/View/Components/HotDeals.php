<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class HotDeals extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $hot_deals = Product::where('status',1)->where('hot_deals',1)->get();
        return view('components.hot-deals',compact('hot_deals'));
    }
}
