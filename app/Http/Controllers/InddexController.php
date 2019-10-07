<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class IndexController extends Controller
{
    //商品主页[商品list]
    public function index(Request $request){
        return view('index');
    }

}