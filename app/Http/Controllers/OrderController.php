<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('customer-login');
        }

        $deliveryMethod = session('method');
        if (!$deliveryMethod) {
            return redirect()->route('home');
        }

        $paymentMethod = $request->payment_method;

        $cart = session('cart.products');
        $total = array_reduce($cart, function ($carry, $product) {
            return $carry + $product['price'] * $product['qty'];
        }, 0);

        //add prices of sauces and extras
        $extra1 = session('soja_sucre');
        $extraprice1 = session('soja_sucre_price');
        $extra2 = session('soja_salee');
        $extraprice2 = session('soja_salee_price');
        $extra3 = session('sauce_spicy');
        $extraprice3 = session('sauce_spicy_price');
        $extra4 = session('baguettes');
        $extraprice4 = session('baguettes_price');
        $extra5 = session('wasabi');
        $extraprice5 = session('wasabi_price');
        $extra6 = session('ginger');
        $extraprice6 = session('ginger_price');

        $service_charge = 0.95;

        $total = $total + $extraprice1 + $extraprice2 + $extraprice3 + $extraprice4 + $extraprice5 + $extraprice6 + $service_charge;

        $transaction_id = Str::random(12);

        $orderData = [
            'order_number' => uniqid(),
            'user_id' => Auth::user()->id,
            'order_date' => date('Y-m-d'),
            'order_time' => date('H:i:s'),
            'total_order_price' => $total,
            'estimated_delivery_time' => date('H:i:s', strtotime('+30 minutes')),
            'delivery_method' => $deliveryMethod,
            'payment_id' => $transaction_id,
            'order_status' => 'pending payment',
            'rest_id' => session('restaurent'),
            'timeslot' => session('timeslot'),
        ];

        $order = Order::create($orderData);
        
        $paymentData = [
            'payment_id' => $order->payment_id,
            'order_id' => $order->order_id,
            'payment_amount' => $total,
            'payment_method' => $paymentMethod,
            'payment_status' => 'pending', // Add this line
        ];

        $payment = Payment::create($paymentData);

        if($extra1 != null) {
            array_push($cart, [
                'extra_id' => 1,
                'name' => 'Soja sucrée',
                'price' => $extraprice1,
                'qty' => $extra1
            ]);
        }

        if($extra2 != null) {
            array_push($cart, [
                'extra_id' => 2,
                'name' => 'Soja salée',
                'price' => $extraprice2,
                'qty' => $extra2
            ]);
        }

        if($extra3 != null) {
            array_push($cart, [
                'extra_id' => 3,
                'name' => 'Sauce spicy',
                'price' => $extraprice3,
                'qty' => $extra3
            ]);
        }

        if($extra4 != null) {
            array_push($cart, [
                'extra_id' => 4,
                'name' => 'Baguettes',
                'price' => $extraprice4,
                'qty' => $extra4
            ]);
        } 

        if($extra5 != null) {
            array_push($cart, [
                'extra_id' => 5,
                'name' => 'Wasabi',
                'price' => $extraprice5,
                'qty' => $extra5
            ]);
        }

        if($extra6 != null) {
            array_push($cart, [
                'extra_id' => 6,
                'name' => 'Ginger',
                'price' => $extraprice6,
                'qty' => $extra6
            ]);
        }
       
        foreach ($cart as $product) {
            $productpice = 0;
            if(array_key_exists('option_id', $product) && $product['option_id'] != null) {
                $productpice = $product['option_price'];
            } else {
                $productpice = $product['price'];
            }
            OrderDetail::create([
                'order_id' => $order->order_id,
                'product_id' => $product['prod_id'] ?? null,
                'option_id' => $product['option_id'] ?? null,
                'extra_id' => $product['extra_id'] ?? null,
                'extra_price' => $product['extra_price'] ?? null,
                'choices' => $product['choices'] ?? null,
                'product_name' => $product['name'],
                'product_qty' => $product['qty'],
                'product_price' => $productpice,
            ]);
        }

        session()->forget('cart');

        session()->forget('soja_sucre');

        session()->forget('soja_salee');

        session()->forget('sauce_spicy');

        session()->forget('baguettes');

        session()->forget('wasabi');

        session()->forget('ginger');

        session()->forget('soja_salee_price');

        session()->forget('soja_sucre_price');

        session()->forget('sauce_spicy_price');

        session()->forget('wasabi_price');

        session()->forget('ginger_price');

        session()->forget('baguettes_price');

        session()->put('cart-step', 2);

        session()->put('order_id', $order->order_id);

        if($paymentMethod == 'cb-en-ligne') {
            return redirect()->route('payment-process', ['order_id' => $order->order_id]);
        }

        // $restaurent = $order->rest_id;

        // if($paymentMethod == 'cb-en-ligne') {
        //     if($restaurent == 1) {
        //         return redirect()->route('payment-process-dijon', ['order_id' => $order->order_id]);
        //     } 
        //     if($restaurent == 2) {
        //         return redirect()->route('payment-process-belfort', ['order_id' => $order->order_id]);
        //     } 
        //     if($restaurent == 3) {
        //         return redirect()->route('payment-process-besancon', ['order_id' => $order->order_id]);
        //     }
        //}
        return redirect()->route('payment-finalize', ['order_id' => $order->order_id]);
        
    }
    public function myOrders(Request $request)
    {

        $orders = Order::where('user_id', Auth::user()->id)->get();


        return view('my-orders', ['orders' => $orders]);

    }

    public function orderDetails(Request $request, $order_id)
    {

        $order = Order::where('order_id', $order_id)->first();

        $orderDetails = OrderDetail::where('order_id', $order_id)->get();

        Log::info('Order details:'.$orderDetails);
        
        //log info order details -> product relationship
        Log::info($orderDetails[0]->product);
        

        

        return view('orders.details', compact('order', 'orderDetails'));

    }
    public function editOrder($order_id)
{
    // Fetch order details and products for the specified order_id
    $order = Order::find($order_id);
    $orderDetails = OrderDetail::where('order_id', $order_id)->get();
    $products1 = Product::where('subcat_id', 1)->take(3)->get();
    $products2 = Product::where('subcat_id', 2)->take(3)->get();
    $products3 = Product::where('subcat_id', 3)->take(3)->get();

    return view('edit-order', compact('order', 'orderDetails', 'products1', 'products2', 'products3'));
}

public function updateOrder(Request $request, $order_id)
    {
        // Validate the form data
        $request->validate([
            'quantity' => 'required|integer|min:1', // Add more validation rules for other fields
        ]);

        // Fetch the order
        $order = Order::find($order_id);

        // Update order details based on the submitted form data
        $orderDetail = OrderDetail::where('order_id', $order_id)->first(); // Assuming there is only one order detail for simplicity
        $orderDetail->quantity = $request->input('quantity');
        $orderDetail->save();

        // Redirect back to the order page with a success message
        return redirect()->route('order', ['order_id' => $order_id])->with('success', 'Order details updated successfully');
    }

}