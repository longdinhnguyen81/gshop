<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Produce;
use Storage;

class ProduceController extends Controller
{
	function __construct(Produce $produce)
	{
		$this->produce = $produce;
	}
    public function index(){
    	$items = $this->produce->getItems();
    	return view('admin.produce.index', compact('items'));
    }
    public function getAdd(){
    	return view('admin.produce.add');
    }
    public function postAdd(Request $request){
    	$arItem = array(
    		'name' => $request->name,
    		'cid' => $request->cid,
    		'cost' => $request->cost,
    		'recost' => $request->recost,
    		'description' => $request->description,
    		'detail' => $request->detail,
    		'count' => 1
    	);
    	if($request->file('hinhanh') != null){
            $path = $request->file('hinhanh')->store('files');
            $arFile = explode('/',$path);
            $arItem['picture'] = end($arFile);
        }
        $result = $this->produce->addItem($arItem);
        if ($result) {
            return redirect(route('admin.produce.index'))->with('msg', 'Thêm thành công');
        } else {
            return redirect(route('admin.produce.index'))->with('msg', 'Có lỗi khi thêm');
        }
    }
    public function getEdit($id){
    	$items = $this->produce->getItem($id);
    	return view('admin.produce.edit', compact('items'));
    }
    public function postEdit($id, Request $request){
    	$items = $this->produce->getItem($id);
    	$images = $items->picture;

    	$arItem = array(
    		'name' => $request->name,
    		'cid' => $request->cid,
    		'cost' => $request->cost,
    		'recost' => $request->recost,
    		'description' => $request->description,
    		'detail' => $request->detail,
    		'count' => 1
    	);
    	if($request->file('hinhanh') != null){
            $path = $request->file('hinhanh')->store('files');
            $arFile = explode('/',$path);
            $arItem['picture'] = end($arFile);
            Storage::delete("files/".$images);
        }else{
        	$arItem['picture'] = $images;
        }
        $result = $this->produce->editItem($id, $arItem);
        if ($result) {
            return redirect(route('admin.produce.index'))->with('msg', 'Sửa thành công');
        } else {
            return redirect(route('admin.produce.index'))->with('msg', 'Có lỗi khi sửa');
        }
    }
    public function del($id){
    	$items = $this->produce->getItem($id);
    	$images = $items->picture;
    	$result = $this->produce->delItem($id);
        if ($result) {
            Storage::delete("files/".$images);
            return redirect(route('admin.produce.index'))->with('msg', 'Xóa thành công');
        } else {
            return redirect(route('admin.produce.index'))->with('msg', 'Có lỗi khi xóa');
        }
    }
}
