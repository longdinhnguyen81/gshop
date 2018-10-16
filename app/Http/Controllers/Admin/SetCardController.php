<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SetCard;

class SetCardController extends Controller
{
	function __construct(SetCard $setcard)
	{
		$this->setcard = $setcard;
	}
    public function index(){
    	$items = $this->setcard->getItems();
    	return view('admin.setcard.index', compact('items'));
    }
    public function del($id){
    	$result = $this->setcard->delItem($id);
    	if ($result) {
            return redirect(route('admin.setcard.index'))->with('msg', 'Xóa thành công');
        } else {
            return redirect(route('admin.setcard.index'))->with('msg', 'Có lỗi khi xóa');
        }
    }
}
