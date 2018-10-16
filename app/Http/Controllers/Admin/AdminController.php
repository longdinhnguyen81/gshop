<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;

class AdminController extends Controller
{
	function __construct(Admin $admin)
	{
		$this->admin = $admin;
	}
    public function index(){
    	$items = $this->admin->getItems();
    	return view('admin.admin.index', compact('items'));
    }
    public function getAdd(){
    	return view('admin.admin.add');
    }
    public function postAdd(Request $request){
    	$arItem = array(
    		'username' => $request->username,
    		'password' => bcrypt(trim($request->password)),
    		'fullname' => $request->fullname
    	);
    	$result = $this->admin->addItem($arItem);
        if ($result) {
            return redirect(route('admin.admin.index'))->with('msg', 'Thêm thành công');
        } else {
            return redirect(route('admin.admin.index'))->with('msg', 'Có lỗi khi thêm');
        }
    }
    public function getEdit($id){
    	$item = $this->admin->getItem($id);
    	return view('admin.admin.edit', compact('item'));
    }
    public function postEdit($id, Request $request){
    	$password = $request->password;
    	if($password != ""){
    		$arItem['password'] = bcrypt(trim($password));
    	}
    	$arItem = array(
    		'username' => $request->username,
    		'fullname' => $request->fullname
    	);
    	$result = $this->admin->editItem($id,$arItem);
        if ($result) {
            return redirect(route('admin.admin.index'))->with('msg', 'Sửa thành công');
        } else {
            return redirect(route('admin.admin.index'))->with('msg', 'Có lỗi khi sửa');
        }
    }
    public function del(){

    }
}
