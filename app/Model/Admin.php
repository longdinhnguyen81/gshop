<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getItems(){
    	return $this->orderBy('id','desc')->get();
    }
    public function getItem($id){
    	return $this->findOrFail($id);
    }
    public function addItem($arItem){
    	return $this->insert($arItem);
    }
    public function editItem($id, $arItem){
    	return $this->where('id', $id)->update($arItem);
    }
    public function del($id){
    	return $this->findOrFail($id)->delete();
    }
}
