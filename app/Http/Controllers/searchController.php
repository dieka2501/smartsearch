<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\destination;
use App\tagValue;

class searchController extends Controller
{
    //
    function __construct(){
    	date_default_timezone_set('Asia/Jakarta');
    	$this->des 		= new destination;
    	$this->tag 		= new tagValue;
    }

    function index(Request $request){

    	if($request->has("q")){
    		if($request->session()->has('interest')){
    			$arr = session('interest');
    			// var_dump($arr);die;
    		}else{
    			$gettag 	= $this->tag->get_count();
	    		// var_dump($gettag);
	    		foreach ($gettag as $tags) {
	    			$arr[] = [$tags->key => $tags->jumlah];
	    		}	
    		}
    		
    		$cari 		= $request->input('q');
	    	// $getdata 	= $this->des->get_search($cari);	

	    	$getdata 	= $this->des->get_tag($arr,$cari);
    	}else{
    		$getdata 	= [];
    		$cari 		= "";
    	}
    	// var_dump(session('interest'));
    	$view['data'] 	= $getdata;
    	$view['cari'] 	= $cari;
    	return view('front.index',$view);
    }
    function detail(Request $request,$id){
    	$getid 	= $this->des->get_id($id);
    	$view['destination_name']	 		= $getid->destination_name;
    	$view['destination_description'] 	= $getid->destination_description;
    	$insert['tag_key'] 					= $getid->destination_tag;
    	$insert['tag_value'] 				= 1;
    	$insert['created_at'] 				= date('Y-m-d H:i:s');
    	// var_dump($request->session()->has($getid->destination_tag));
    	if(!$request->session()->has('interest.'.$getid->destination_tag)){
    		$request->session()->put('interest.'.$getid->destination_tag, 1);	
    	}else{
    		$sesbefore = session('interest.'.$getid->destination_tag);
    		$sesnext   = $sesbefore +1;	
    		$request->session()->put('interest.'.$getid->destination_tag,$sesnext);	
    		// if(isset($sesbefore[$getid->destination_tag])){
    			
    		// }else{
    		// 	$request->session()->put('interest',[$getid->destination_tag => 1]);		
    		// }
    		
    		// echo $sesnext;
    		

    	}
    	// var_dump(session('interest'));
    	$this->tag->add($insert);
    	// var_dump($request->session()->all());
    	return view('front.detail',$view);
    }
}
