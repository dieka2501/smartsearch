<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class destination extends Model
{
    //
    protected $table = "destination";
    protected $primaryKey = "id_destination";
    function get_search($cari){
    	return destination::where('destination_name','like',"%".$cari."%")->orWhere('destination_city','like','%'.$cari."%")->get();
    }
    function get_id($id){
    	return destination::find($id);
    }

    function get_tag($arr,$cari){
    	arsort($arr);
    	// var_dump($arr);
    	// $count = count($arr);
    	$sql   = "";
    	$where = "";
    	foreach ($arr as $key => $value) {
    		$sql .= "SELECT * FROM destination WHERE destination_tag LIKE '%".$key."%' AND (destination_city LIKE '%".$cari."%' OR destination_name LIKE '%".$cari."%') UNION ";
    		$where = "destination_tag NOT LIKE '%".$key."%' AND";
    	}
    	$sql .= "SELECT * FROM destination WHERE ".$where." (destination_city LIKE '%".$cari."%' OR destination_name LIKE '%".$cari."%')";
    	return DB::select($sql);

    }
}
