<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class SetCard extends Model
{
    protected $table = 'setcard';
    protected $primaryKey = 'sid';
    public $timestamps = false;

    public function getItems(){
    	return DB::table('setcard as s')
    	->join('users as u', 's.uid', '=', 'u.id')
    	->join('card as c', 's.card_id', '=', 'c.card_id')
    	->orderBy('s.sid', 'desc')
    	->get();
    }
    public function delItem($id){
        return $this->findOrFail($id)->delete();
    }
}
