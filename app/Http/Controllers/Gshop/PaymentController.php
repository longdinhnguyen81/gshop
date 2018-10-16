<?php

namespace App\Http\Controllers\Gshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function cart(){
    	return view('gshop.payment.cart');
    }
    public function payment(){
    	return view('gshop.payment.payment');
    }
}
