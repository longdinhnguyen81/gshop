<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Users;
use App\Model\SetCard;

class UsersController extends Controller
{
	function __construct(Users $users, SetCard $setcard)
	{
		$this->users = $users;
        $this->setcard = $setcard;
	}
    public function index(){
        $sitems = $this->setcard->getItems();
    	$items = $this->users->getItems();
    	return view('admin.users.index', compact('items','sitems'));
    }
    public function del(){

    }
}
