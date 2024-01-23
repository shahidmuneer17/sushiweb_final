<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;

use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function showCart()
    {
        if (session('cart-step') == '2' && session('cart') != null) {
            return redirect()->route('summaryPage');
        }

        if (session('cart-step') == '3' && session('order_id') != null) {
            $orderId = session('order_id');
            return redirect()->route('payment-options', ['order_id' => $orderId]);
        }
        
        // Get the products from the database
        $products1 = Product::where('subcat_id', 5)->orderBy('prod_id', 'asc')->get();
        $products2 = Product::where('subcat_id', 27)->orderBy('prod_id', 'asc')->get();
        $products3 = Product::where('subcat_id', 28)->orderBy('prod_id', 'asc')->get();
        // Pass the products to the view
        return view('cart', ['products1' => $products1, 'products2' => $products2, 'products3' => $products3]);
    }

    public function changeMethod($order_id)
    {
        $order = Order::where('order_id', $order_id)->first();
        if ($order->delivery_method == 'delivery') {
            $order->delivery_method = 'takeaway';
            $order->save();
        } else if ($order->delivery_method == 'takeaway') {
            $order->delivery_method = 'delivery';
            $order->save();
        }
        
        return redirect()->back();
    }

    public function summaryPage()
    {
        if (!Auth::check()) {
            return redirect()->route('customer-login');
        }

        $deliveryMethod = session('method');
        if (!$deliveryMethod) {
            return redirect()->route('home');
        }
        
        $user = auth::user();
            
        return view('summaryPage', compact('user'));
        
    }

    public function changeCart(Request $request)
    {
        session()->put('cart-step', 1);

        if (session('cart') == null) {
            return redirect()->route('menu');
        }
        // Get the products from the database
        $products1 = Product::where('subcat_id', 5)->take(3)->get();
        $products2 = Product::where('subcat_id', 27)->take(3)->get();
        $products3 = Product::where('subcat_id', 28)->take(3)->get();

        // Pass the products to the view
        return view('cart', ['products1' => $products1, 'products2' => $products2, 'products3' => $products3]);
    }

    public function addtoCart(Request $request)
    {
        if (session('cart-step') == '2') {
            return redirect()->route('summaryPage');
        }

        $product = Product::find($request->prod_id);

        // $optionId = $request->option_id;
        // $optionPrice = $request->option_price;

        $cart = session('cart', []);

        $productIndex = null;

        if (!array_key_exists('products', $cart)) {
            $cart['products'] = [];
        }

        $option_id = $request->option_id ?? null;

        foreach ($cart['products'] as $index => $cartProduct) {
            if (
                $cartProduct['prod_id'] == $product->prod_id &&
                ((!array_key_exists('option_id', $cartProduct) && $option_id === null) ||
                    (array_key_exists('option_id', $cartProduct) && $cartProduct['option_id'] == $option_id))
            ) {
                $productIndex = $index;
                break;
            }
        }

        if ($productIndex !== null) {
            $cart['products'][$productIndex]['qty'] += 1;
        } else {
            // If product does not exist in cart, add to cart
            $productToAdd = [
                'prod_id' => $product->prod_id,
                'name' => $product->prod_name,
                'price' => $product->price,
                'qty' => 1,
                'imgsrc' => $product->imgsrc,
            ];

            if (isset($request->option_id)) {

                $option = ProductOption::find($request->option_id);
                $productToAdd['option_id'] = $option->option_id;
                $productToAdd['option_price'] = $option->option_price;
                $productToAdd['option_name'] = $option->option_name;
            }

            if (isset($request->choices)) {
                $productToAdd['choices'] = $request->choices;
            }

            $cart['products'][] = $productToAdd;
        }

        session(['cart' => $cart]);

        // return redirect()->back();
        // return redirect()->route('product.details', ['id' => $prod_id]);
        return redirect()->route('cart');
        // return view('cart');
        // return response()->json($cart);
    }
    public function removeFromCart(Request $request)
    {
        $prod_id = $request->prod_id;

        $cart = session('cart', []);
        $productIndex = null;

        // Find product in cart
        foreach ($cart['products'] as $index => $cartProduct) {
            if ($cartProduct['prod_id'] == $prod_id) {
                $productIndex = $index;
                break;
            }
        }

        // If product exists in cart, remove it
        if ($productIndex !== null) {
            unset($cart['products'][$productIndex]);
        }

        // Re-index array
        $cart['products'] = array_values($cart['products']);

        session(['cart' => $cart]);

        return redirect()->back();
    }

    public function decreaseQty(Request $request)
    {
        $prod_id = $request->prod_id;

        $option_id = $request->option_id ?? null;

        $cart = session('cart', []);
        $productIndex = null;

        // Find product in cart
        foreach ($cart['products'] as $index => $cartProduct) {
            if (
                $cartProduct['prod_id'] == $prod_id &&
                ((!array_key_exists('option_id', $cartProduct) && $option_id === null) ||
                    (array_key_exists('option_id', $cartProduct) && $cartProduct['option_id'] == $option_id))
            ) {
                $productIndex = $index;
                break;
            }
        }

        // If product exists in cart, decrease quantity
        if ($productIndex !== null) {
            $cart['products'][$productIndex]['qty'] -= 1;

            // If quantity is 0 or less, remove the product from the cart
            if ($cart['products'][$productIndex]['qty'] <= 0) {
                unset($cart['products'][$productIndex]);
                $cart['products'] = array_values($cart['products']);  // Re-index array
            }
        }

        session(['cart' => $cart]);

        return redirect()->back();
    }
}
