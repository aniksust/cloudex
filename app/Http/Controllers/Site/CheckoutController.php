<?php

namespace App\Http\Controllers\Site;

use App\Cart_table;
use App\Http\Requests\Checkout as CheckoutRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Purchasedgoods;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;



class CheckoutController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @param Product $product
     * @return ProductResource
     */
    public function index()
    {
        if (Cart::count() == 0) {
            return redirect()->route('site.new');
        }

        foreach(Cart::content() as $x){

            $cart = new  Cart_table();
            $cart->rowId = $x->rowId;
            $cart->subtotal = $x->subtotal;
//                'subtotal' => $x->subtotal,
//            Cart_table::create([
//                'rowId' => $x->rowId,
//                'subtotal' => $x->subtotal,
//            ]);
//            return $cart;
            $cart->save();
        }


//        $cart =  Cart::associate(rowId, 'Product');
//        $rowId='534ff9867d2744aa9aa7bf2902c7847b';
//        $name = '534ff9867d2744aa9aa7bf2902c7847b';
//        $cart = Cart::get($name);

//        $cart=Cart::content();

//
//        return $cart;



//            return new ProductResource($cart);

//        return $cart;
//
        return view('site.pages.checkout');
    }


    /**
     * Store a newly created resource in storage.
     * @param  \App\Models\Product $product
     * @param Product $product
     * @param CheckoutRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
//        $contents = Cart::content()->map(function ($item) {
//            return $item->model->slug . ', ' . $item->qty;
//        })->values()->toJson();
////        return $contents;
//
//        Stripe::charges()->create([
//            'amount' => Cart::subtotal(),
//            'currency' => 'BDT',
//            'source' => $request->stripeToken,
//            'description' => 'Order',
//            'receipt_email' => $request->email,
//            'metadata' => [
//                'contents' => $contents,
//                'quantity' => Cart::instance('default')->count(),
//            ],
//        ]);


        foreach (Cart::content() as $item){
            Purchasedgoods::create([
                'user_id' => Auth::user()->id,
                'product_id' => $item->id,
                'vendor' => $item->options->brand->name,
                'ship_status'=>0
            ]);

//            return $item;
        }


        Cart::destroy();

        return redirect()->route('cart.index')->with('success', __('site.checkout-payment-success'));
    }
}
