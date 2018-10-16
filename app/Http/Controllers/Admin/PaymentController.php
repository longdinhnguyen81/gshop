<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Payment;

class PaymentController extends Controller
{
	function __construct(Payment $payment)
	{
		$this->payment = $payment;
	}
    public function index(){
    	$items = $this->payment->getItems();
    	return view('admin.payment.index', compact('items'));
    }
    public function del($id){
    	$result = $this->payment->delItem($id);
        if ($result) {
            return redirect(route('admin.payment.index'))->with('msg', 'Xóa thành công');
        } else {
            return redirect(route('admin.payment.index'))->with('msg', 'Có lỗi khi xóa');
        }
    }
}
