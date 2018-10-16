<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cat;

class CatController extends Controller
{
	public function __construct(Cat $cat){
		$this->Cat = $cat;
	}
    public function index(){
    	$items = $this->Cat->getItems();
        $cItems = $this->Cat->getcItems();
    	return view('admin.cat.index', compact('items','cItems'));
    }
    public function getAdd(){
        $items = $this->Cat->getItems();
    	return view('admin.cat.add', compact('items'));
    }
    public function postAdd(Request $request){
        $arItem['cname'] = $request->name;
        $arItem['parrent_id'] = $request->pid;
        $result = $this->Cat->addItem($arItem);
        if ($result) {
            return redirect(route('admin.cat.index'))->with('msg', 'Thêm thành công');
        } else {
            return redirect(route('admin.cat.index'))->with('msg', 'Có lỗi khi thêm');
        }
    }
    public function getEdit($id){
        $item = $this->Cat->getItem($id);
    	return view('admin.cat.edit', compact('item'));
    }
    public function postEdit(Request $request,$id){
        $item = $this->Cat->getItem($id);
        $pid = $item->parrent_id;
    	$arItem = array(
            'cname' => $request->name,
            'parrent_id' => $pid
        );
        $result = $this->Cat->editItem($id,$arItem);
        if ($result) {
            return redirect(route('admin.cat.index'))->with('msg', 'Sửa thành công');
        } else {
            return redirect(route('admin.cat.index'))->with('msg', 'Có lỗi khi sửa');
        }
    }
    public function del($id){
    	$result = $this->Cat->delItem($id);
        if ($result) {
            return redirect(route('admin.cat.index'))->with('msg', 'Xóa thành công');
        } else {
            return redirect(route('admin.cat.index'))->with('msg', 'Có lỗi khi xóa');
        }
    }
}

