<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\ProductOption;

class MenuController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::all();
    }

public function allCategories()
{
    $sessionrest_id = session('restaurent');
    if ($sessionrest_id != 1 && $sessionrest_id != 2 && $sessionrest_id != 3)  {
        session([
            'method' => 'takeaway',
            'restaurent' => 1,
        ]);
    }

    
    $categories = $this->categories;

    $currentDateTime = \Carbon\Carbon::now();
    $method = session('method', 'takeaway'); // Default to 'takeaway' if session method is not set

    if ($method == 'takeaway') {
        $timeSlots = [
            'noon' => [
                '11:15 - 11:45',
                '12:00 - 12:30',
                '12:45 - 13:15',
                '13:30 - 14:00',
                '14:15 - 14:45',
            ],
            'evening' => [
                '18:15 - 18:45',
                '19:00 - 19:30',
                '19:45 - 20:15',
                '20:30 - 21:00',
                '21:15 - 21:45',
                '22:00 - 22:30',
            ],
        ];
    } elseif ($method == 'delivery') {
        $timeSlots = [
            'noon' => [
                '11:15 - 12:15',
                '12:30 - 13:30',
                '13:45 - 14:45',
            ],
            'evening' => [
                '18:15 - 19:15',
                '20:30 - 21:30',
                '21:45 - 22:45',
            ],
        ];
    }

    return view('menu.allCategories', compact('categories','currentDateTime', 'timeSlots', 'method'));
}

    public function subcategories(Category $category)
    {
        $categories = $this->categories;
        $subcategories = Subcategory::where('cat_id', $category->cat_id)->get();


        return view('menu.subcategories', compact('categories', 'subcategories', 'category'));
    }

    public function products(Category $category, Subcategory $subcategory)
{
    $categories = $this->categories;
    $products = Product::where('subcat_id', $subcategory->subcat_id)
                       ->orderBy('prod_id', 'asc')
                       ->get();
    return view('menu.products', compact('categories', 'products', 'category', 'subcategory'));
}

    public function productDetails(Category $category, Subcategory $subcategory, Product $product)
    {
        $categories = $this->categories;
        $currentDateTime = \Carbon\Carbon::now();
    $method = session('method', 'takeaway'); // Default to 'takeaway' if session method is not set

    if ($method == 'takeaway') {
        $timeSlots = [
            'noon' => [
                '11:15 - 11:45',
                '12:00 - 12:30',
                '12:45 - 13:15',
                '13:30 - 14:00',
                '14:15 - 14:45',
            ],
            'evening' => [
                '18:15 - 18:45',
                '19:00 - 19:30',
                '19:45 - 20:15',
                '20:30 - 21:00',
                '21:15 - 21:45',
                '22:00 - 22:30',
            ],
        ];
    } elseif ($method == 'delivery') {
        $timeSlots = [
            'noon' => [
                '11:15 - 12:15',
                '12:30 - 13:30',
                '13:45 - 14:45',
            ],
            'evening' => [
                '18:15 - 19:15',
                '20:30 - 21:30',
                '21:45 - 22:45',
            ],
        ];
    }
        return view('menu.productDetails', compact('categories', 'product', 'category', 'subcategory','currentDateTime', 'timeSlots', 'method'));
    }
}
