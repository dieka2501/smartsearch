<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class tagValue extends Model
{
    //
    protected $table 		= "tag_value";
    protected $primaryKey 	= "id_tag";
    function add($data){
    	return tagValue::insertGetId($data);	
    }
    
    function get_count(){
    	return tagValue::select(DB::raw('tag_key, count(tag_value) as jumlah'))->groupBy('tag_value')->take(3)->get();
    }
}
