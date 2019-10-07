<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        $data= \DB::table('goods')->paginate(2);
        // dd($data);
        return view('index.index',['data'=>$data]);
    }
    public function product($goods_id){
        if($goods_id){
            $data= \DB::table('goods')->where('goods_id',$goods_id)->first();
            // dd($data);
            return view('index.wishlist',['data'=>$data]);
        }    
        
    }
    public function product3($goods_id){
        if($goods_id){
            $data= \DB::table('goods')->where('goods_id',$goods_id)->first();
            // dd($data);
            return view('index.cart',['data'=>$data]);
        }    
        
    }

}
