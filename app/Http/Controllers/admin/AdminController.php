<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function index()
    {
        $userId = auth()->id();
        $user = User::find($userId);

        $orders = Order::all();

        return view('admin.dashboard', compact('user', 'orders'));
    }
    public function products()
    {
        $user = auth()->user();
        $products = Product::with('options', 'subcategory')->get();
        
        return view('admin.products.index', compact('user', 'products'));
    }
}   