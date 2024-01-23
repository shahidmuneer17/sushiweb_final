<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class SessionController extends Controller
{
    public function storeInSession(Request $request)
    {
        if(null !== $request->input('method')) {

        session([
            'method' => $request->input('method'),
            'restaurent' => $request->input('restaurent'),
            'address' => $request->input('address'),
        ]);

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
        
        Log::info('Current session data', session()->all());
        
        if(auth::user()) {
            $user = auth::user();
            $user->address = $request->input('address');
            $user->save();
        }


        if (url()->previous() == 'https://newtest.centralsushi.fr/') {
            return redirect()->route('menu');
        } else {
            return redirect()->back();
        }

        }

        if(null !== $request->input('timeslot')) {

        
            session([
                'timeslot' => $request->input('timeslot'),
                
            ]);
    
            return redirect()->back();
    
        }

        if(null !== $request->input('soja_sucre')) {

            $request->session()->put('soja_sucre', $request->json()->get('soja_sucre'));

            return response()->json(['success' => true]);
        }

        if(null !== $request->input('wasabi')) {
            
            $request->session()->put('wasabi', $request->json()->get('wasabi'));

            return response()->json(['success' => true]);
        }

        if(null !== $request->input('ginger')) {
            
            $request->session()->put('ginger', $request->json()->get('ginger'));

            return response()->json(['success' => true]);
        }

        if(null !== $request->input('baguettes')) {
            
            $request->session()->put('baguettes', $request->json()->get('baguettes'));

            return response()->json(['success' => true]);
        }

        if(null !== $request->input('sauce_spicy')) {
            
            $request->session()->put('sauce_spicy', $request->json()->get('sauce_spicy'));

            return response()->json(['success' => true]);
        }

        if(null !== $request->input('soja_salee')) {
            
            $request->session()->put('soja_salee', $request->json()->get('soja_salee'));

            return response()->json(['success' => true]);
        }

        if($request->has(['soja_salee_price', 'soja_sucre_price', 'sauce_spicy_price', 'wasabi_price', 'ginger_price', 'service_charge'])) {
            $request->session()->put('soja_salee_price', $request->json()->get('soja_salee_price'));
            $request->session()->put('soja_sucre_price', $request->json()->get('soja_sucre_price'));
            $request->session()->put('sauce_spicy_price', $request->json()->get('sauce_spicy_price'));
            $request->session()->put('wasabi_price', $request->json()->get('wasabi_price'));
            $request->session()->put('ginger_price', $request->json()->get('ginger_price'));
            $request->session()->put('service_charge', $request->json()->get('service_charge'));
    
            return response()->json(['success' => true]);
        }
    }
    public function updateSession($item, $quantityChange)
    {
        // Update the session values based on $item and $quantityChange
        // Return the updated values in the response
        //get product prices from session
        $cart = session('cart.products');
        $total = array_reduce($cart, function ($carry, $product) {
            return $carry + $product['price'] * $product['qty'];
        }, 0);

        $allowedFreeItems = floor($total / 10);

        // Example:
        $quantity = session($item, 0) + $quantityChange;
        $price = $this->calculatePrice($item, $quantity);

        session([$item => $quantity]);

        if ($quantity > $allowedFreeItems) {
            $price = $this->calculatePrice($item, $quantity - $allowedFreeItems);
        } else {
            $price = 0;
        }
        //$item add _price to the end of the item name and update price in session
        session([$item . '_price' => $price]);

        // Log::info('Current session data', session()->all());

        return response()->json(['quantity' => $quantity, 'price' => $price]);
    }

    // Function to calculate the price based on the item and quantity
    private function calculatePrice($item, $quantity)
    {
        switch ($item) {
            case 'soja_sucre':
                return 0.80 * $quantity;
            case 'soja_salee':
                return 0.50 * $quantity;
            case 'sauce_spicy':
                return 0.80 * $quantity;
            case 'wasabi':
                return 0.50 * $quantity;
            case 'ginger':
                return 0.70 * $quantity;
            // Add cases for other items as needed
            default:
                return 0; // Default to 0 if the item is not found
        }
    }    
}