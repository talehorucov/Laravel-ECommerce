<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class VerticalCategories extends Component
{
    public function __construct()
    {
        //
    }
    
    public function render()
    {
        $categories = Category::with('subcategories.subsubcategories', 'products')->orderBy('name')->take(8)->get();
        return view('components.vertical-categories',compact('categories'));
    }
}
