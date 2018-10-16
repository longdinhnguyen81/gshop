<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Payment extends Model
{
    protected $table = 'pay';
    protected $primaryKey = 'pay_id';
    public $timestamps = false;

    public function getItems(){
    	return DB::table('pay as pay')
    	->join('produce as p' ,'pay.pid', '=', 'p.pid')
    	->join('users as u', 'pay.uid', '=', 'u.id')
    	->orderBy('pay_id','desc')
    	->paginate(10);
    }
    public function getItem($id){
    	return $this->findOrFail($id);
    }
    public function getActive1($id){
        return $this->where('pay_id',$id)->update(['active' => 0]);
    }
    public function getActive0($id){
        return $this->where('pay_id',$id)->update(['active' => 1]);
    }
    public function delItem($id){
        return $this->findOrFail($id)->delete();
    }
}
