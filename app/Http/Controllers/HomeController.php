<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $status = 'Welcome to home';
        Session::put('status', $status);
        return view('home');
    }

    public function products()
    {
        $products= Products::all();
        return view('products',compact('products'));
    }

    public function checkout($id)
    {   
        
        \Stripe\Stripe::setApiKey('sk_test_51J9kNCSAvD6DRDqDvX6AH2mLE7qqdviFWJMyzxXWrVWxgv5jvwOIixqxHj7tBzWwdnTgm8UpTbWh9IENLzsygPfU00lVmsSOYu');
        $products= Products::find($id);
        
		$amount =$products->price;	
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Payment From Codehunger',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout',compact('intent','amount'));

    }

    public function afterPayment()
    {
        $status = 'Payment Has been Received';
        Session::put('status', $status);
        return view('home');
    }
}
