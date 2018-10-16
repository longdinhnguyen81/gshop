<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Produce extends Model
{
	protected $table = 'produce';
	protected $primaryKey = 'pid';
	public $timestamps = true;

	public function getItems(){
		return DB::table('produce as p')
		->join('cat as c','p.cid', '=', 'c.cid')
		->orderBy('p.pid','desc')
		->paginate(10);
	}
	public function getSlide(){
		return DB::table('produce as p')
		->join('cat as c','p.cid', '=', 'c.cid')
		->orderBy('p.pid','desc')
		->paginate(5);
	}
	public function getCS()
	{
		return DB::table('produce as p')
		->join('cat as c','p.cid', '=', 'c.cid')
		->where('p.cid',1)
		->orderBy('p.pid','desc')
		->paginate(8);
	}
	public function getDO(){
		return DB::table('produce as p')
		->join('cat as c','p.cid', '=', 'c.cid')
		->where('p.cid',3)
		->orderBy('p.pid','desc')
		->paginate(8);
	}
	public function get8Item($id){
		return DB::table('produce as p')
		->join('cat as c','p.cid', '=', 'c.cid')
		->where('p.cid',$id)
		->orderBy('p.pid','desc')
		->paginate(8);
	}
	public function getShow($id, $value, $name = 'p.name', $sc='desc'){
		return DB::table('produce as p')
		->join('cat as c','p.cid', '=', 'c.cid')
		->where('p.cid',$id)
		->orderBy($name, $sc)
		->paginate($value);
	}
	public function getPU(){
		return DB::table('produce as p')
		->join('cat as c','p.cid', '=', 'c.cid')
		->where('p.cid',4)
		->orderBy('p.pid','desc')
		->paginate(8);
	}
	public function getItem($id){
		return DB::table('produce as p')
		->join('cat as c','p.cid', '=', 'c.cid')
		->orderBy('p.pid','desc')
		->where('p.pid',$id)
		->first();
	}
	public function getItemRandom($id){
		return DB::table('produce as p')
		->join('cat as c','p.cid', '=', 'c.cid')
		->orderBy('p.pid','desc')
		->where('p.cid',$id)
		->inRandomOrder()
		->paginate(4);
	}
	public function addItem($arItem){
		return $this->insert($arItem);
	}
	public function editItem($id, $arItem){
		return $this->where('pid',$id)->update($arItem);
	}
	public function delItem($id){
		return $this->findOrFail($id)->delete();
	}
}
