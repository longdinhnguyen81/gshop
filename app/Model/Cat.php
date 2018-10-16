<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
	protected $table = 'cat';
	protected $primaryKey = 'cid';
	public $timestamps = false;

    public function getItems(){
    	return $this->where('parrent_id',0)->orderBy('cid','desc')->get();
    }
    public function getAll(){
        return $this->orderBy('cid','desc')->get();
    }
    public function getcItems(){
        return $this->where('parrent_id','!=',0)->get();
    }
    public function getdItems()
    {
        return $this->where('parrent_id',0)->get();
    }
    public function getpItem($id){
        return $this->where('parrent_id',$id)->get();
    }
    public function getItem($id){
    	return $this->findOrFail($id);
    }
    public function addItem($arItem){
    	return $this->insert($arItem);
    }
    public function editItem($id,$arItem){
    	return $this->where('cid',$id)->update($arItem);
    }
    public function delItem($id){
    	return $this->findOrFail($id)->delete();
    }
}
