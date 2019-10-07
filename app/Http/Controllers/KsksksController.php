<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ksksksController extends Controller
{
    //展示
    public function index(Request $request)
    {   
        $name=request()->get('name');
        if($name){
            $data=DB::table('ksksks')->where('name','like','%'.$name.'%')->paginate(2);
        }else{
            $req['name']='';
            $data=DB::table('ksksks')->orderBy('id','desc')->paginate(2);
        }
        return view('ksksks/list',['data'=>$data,'name'=>$name]);
    }
    //添加
    public function create(){
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        return view('ksksks.add');
    }
    //执行添加
    public function store(Request $request)
    {
        $data=$request->except(['_token']);
        $path = $request->file('tel')->store('ksksks');
        $img=asset('storage'.'/'.$path);
        // echo asset('storage'.'/'.$path);
        // dd($path);
        $data['time'] = time();
        // dd($data);
        $data['tel']=$img;
        $res=DB::table('ksksks')->insert($data);
        // dd($res);
         if($res){
            return redirect('ksksks/list');
         }
    }
    //删除
    public function shanchu(Request $request)
    {
        // dd(11);
        $req = $request->all();
        // dd($req);
        $data=DB::table('ksksks')->where(['id'=>$req['id']])->delete();
        if(!empty($data)){
            return redirect('ksksks/list');
        }
    }
    //修改
    public function update(Request $request)
    {
        $req = $request->all();
        $data=DB::table('ksksks')->where(['id'=>$req['id']])->first();
        // dd($data);
        return view ('ksksks.update',['data'=>$data]);
    }
    //执行修改
    public function edit(Request $request)
    {
        $req=$request->all();
        $path = $request->file('tel')->store('ksksks');
        $img=asset('storage'.'/'.$path);
        // dd($data);
        $res=DB::table('ksksks')->where(['id'=>$req['id']])->update([
            'name'=>$req['name'],
            'tel'=>$req['tel'],
            'tel'=> $img,
            'time' => time(),
        ]);
        if(!empty($res)){
            return redirect('ksksks/list');
        }
    }
    
}

