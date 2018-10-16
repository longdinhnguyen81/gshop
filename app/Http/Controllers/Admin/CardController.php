<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Card;

class CardController extends Controller
{
	function __construct(Card $card)
	{
		$this->card = $card;
	}
    public function index(){
    	$items = $this->card->getItems();
    	return view('admin.card.index', compact('items'));
    }
    public function getAdd(){
    	return view('admin.card.add');
    }
    public function postAdd(Request $request){
        $arItem = array(
            'card_name' => $request->name,
            'discount' => $request->discount
        );
        $result = $this->card->addItem($arItem);
        if ($result) {
            return redirect(route('admin.card.index'))->with('msg', 'Thêm thành công');
        } else {
            return redirect(route('admin.card.index'))->with('msg', 'Có lỗi khi thêm');
        }
    }
    public function getEdit($id){
        $items = $this->card->getItem($id);
    	return view('admin.card.edit', compact('items'));
    }
    public function postEdit(Request $request,$id){
    	$arItem = array(
            'card_name' => $request->name,
            'discount' => $request->discount,
        );
        $result = $this->card->editItem($id, $arItem);
        if ($result) {
            return redirect(route('admin.card.index'))->with('msg', 'Sửa thành công');
        } else {
            return redirect(route('admin.card.index'))->with('msg', 'Có lỗi khi sửa');
        }
    }
    public function del($id){
        $result = $this->card->del($id);
        if ($result) {
            return redirect(route('admin.card.index'))->with('msg', 'Xóa thành công');
        } else {
            return redirect(route('admin.card.index'))->with('msg', 'Có lỗi khi xóa');
        }
    }
}
