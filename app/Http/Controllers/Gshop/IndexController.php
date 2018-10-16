<?php

namespace App\Http\Controllers\Gshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Produce;

class IndexController extends Controller
{
    function __construct(Produce $produce)
	{
		$this->produce = $produce;
	}
    public function index(){
    	$CSItems = $this->produce->getCS();
    	$PUItems = $this->produce->getPU();
    	$DOItems = $this->produce->getDO();
    	$slideItems = $this->produce->getSlide();
    	return view('gshop.index.index', compact('slideItems','CSItems','DOItems','PUItems'));
    }
    public function search(){
    	return view('gshop.index.search');
    }
}
