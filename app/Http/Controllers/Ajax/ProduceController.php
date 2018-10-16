<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Payment;
use App\Model\Produce;

class ProduceController extends Controller
{
	function __construct(Payment $payment, Produce $produce)
	{
        $this->payment = $payment;
		$this->produce = $produce;
	}
    public function active(Request $request){
    	$id = $request->id;
    	$obj = $this->payment->getItem($id);
    	$active = $obj->active;
    	if($active == 1){
    		$this->payment->getActive1($id);
    		return '<a href="javascript:void(0)" onclick="return getActive('.$id.')"><img src="/templates/admin/images/deactive.png" /></a><span>Đã xử lý</span>' ;
    	}else{
    		$this->payment->getActive0($id);
    		return '<a href="javascript:void(0)" onclick="return getActive('.$id.')"><img src="/templates/admin/images/active.png" /></a><span>Chưa xử lý</span>';	
    	}
    }   
    public function getValue(Request $request){
        $cid = $request->id;
        if(isset($request->value)){
            $value = $request->value;
        }
        if(isset($request->so)){
            $soft = $request->so;
        }
        $name = "";
        $sc = "";
        if($soft == 1){
            $name = "p.name";
            $sc = "asc";
        }elseif($soft == 2){
            $name = "p.name";
            $sc = "desc";
        }elseif ($soft == 3) {
            $name = "p.cost";
            $sc = "asc";
        }else{
            $name = "p.cost";
            $sc = "desc";
        }
        $items = $this->produce->getShow($cid, $value, $name, $sc);
        $result = "";
        foreach($items as $item){
            $id = $item->pid;
            $name = $item->name;
            $pic = "/storage/app/files/" . $item->picture;
            $des = $item->description;
            $cost = $item->cost;
            $disc = $item->recost;
            $recost = $cost * (100 - $disc) / 100;
            $dcost = number_format($cost,0,',','.');
            $drecost = number_format($recost,0,',','.');
            $url = route('gshop.produce.detail', ['slug' => str_slug($name), 'id' => $id]);
            $result .= '<div class="product">
                <div class="inner-product">
                    <div class="figure-image">
                        <a href="'.$url.'"><img src="'.$pic.'" alt="'.$des.'"></a>
                    </div>
                    <h3 class="product-title"><a href="'.$url.'">'.$name.'</a></h3>
                    <span style="color:red;text-decoration: line-through">'.$dcost.' VND</span>
                    <span style="color:#45b77d;margin-left:10px">'.$drecost.' VND</span>
                    <p>'.$des.'</p>
                    <a href="" class="button">Add to cart</a>
                    <a href="'.$url.'" class="button muted">Xem chi tiết</a>
                </div>
            </div>';
        };
        return $result;
    }   
}
