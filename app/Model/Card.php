<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'card';
    protected $primaryKey = 'card_id';
    public $timestamps = false;

    public function getItems(){
    	return $this->orderBy('card_id','desc')->get();
    }
    public function getItem($id){
        return $this->findOrFail($id);
    }
    public function addItem($arItem){
    	return $this->insert($arItem);
    }
    public function editItem($id, $arItem){
    	return $this->where('card_id',$id)->update($arItem);
    }
    public function del($id){
    	return $this->findOrFail($id)->delete();
    }
}
