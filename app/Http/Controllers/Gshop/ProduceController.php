<?php

namespace App\Http\Controllers\Gshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Produce;

class ProduceController extends Controller
{
	function __construct(Produce $produce)
	{
		$this->produce = $produce;
	}
    public function index($slug, $cid){
    	$items = $this->produce->get8Item($cid);
    	return view('gshop.produce.index', compact('items','cid'));
    }
    public function detail($slug, $id){
    	$item = $this->produce->getItem($id);
    	$cid = $item->cid;
    	$ritems = $this->produce->getItemRandom($cid);
    	return view('gshop.produce.detail', compact('item','ritems'));
    }
}
