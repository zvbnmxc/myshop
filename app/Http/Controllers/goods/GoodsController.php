<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    public function add_good(){
        return view('admin.add_good');
    }
    public function do_add_good(Request $request){
        $path=$request->file("good_source")->store('good');
        echo asset('storage');
        dd($path);
    }
}
