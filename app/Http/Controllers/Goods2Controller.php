<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Goods2Controller extends Controller
{
    //展示
    public function index(Request $request)
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        $num=$redis->get('num');
        echo $num."<br/>";

        $goods_name=request()->get('goods_name');
        if($goods_name){
            $data=DB::table('goods2')->where('goods_name','like','%'.$goods_name.'%')->paginate(5);
        }else{
            $req['goods_name']='';
            $data=DB::table('goods2')->orderBy('goods_id','desc')->paginate(5);
        }
        return view('goods2/list',['data'=>$data,'goods_name'=>$goods_name]);
    }
    //添加
    public function create(){
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        return view('goods2.add');
    }
    //执行添加
    public function store(Request $request)
    {
        $data=$request->except(['_token']);
        $path = $request->file('goods_tup')->store('goods2');
        $img=asset('storage'.'/'.$path);
        // echo asset('storage'.'/'.$path);
        // dd($path);
        $data['goods_time'] = time();
        // dd($data);
        $data['goods_tup']=$img;
        $res=DB::table('goods2')->insert($data);
        // dd($res);
         if($res){
            return redirect('goods2/list');
         }
    }
    //删除
    public function shanchu(Request $request)
    {
        // dd(11);
        $req = $request->all();
        // dd($req);
        $data=DB::table('goods2')->where(['goods_id'=>$req['goods_id']])->delete();
        if(!empty($data)){
            return redirect('goods2/list');
        }
    }
    //修改
    public function update(Request $request)
    {
        $req = $request->all();
        $data=DB::table('goods2')->where(['goods_id'=>$req['goods_id']])->first();
        // dd($data);
        return view ('goods2.update',['data'=>$data]);
    }
    //执行修改
    public function edit(Request $request)
    {
        $req=$request->all();
        $path = $request->file('goods_tup')->store('goods2');
        $img=asset('storage'.'/'.$path);
        // dd($data);
        $res=DB::table('goods2')->where(['goods_id'=>$req['goods_id']])->update([
            'goods_name'=>$req['goods_name'],
            'goods_tup'=>$req['goods_tup'],
            'goods_kc'=>$req['goods_kc'],
            'goods_price'=>$req['goods_price'],
            'goods_tup'=> $img,
            'goods_time' => time(),
        ]);
        if(!empty($res)){
            return redirect('goods2/list');
        }
    }
    

}



    // public function index()
    // {
    //     $redis = new \Redis();
    //     $redis->connect('127.0.0.1','6379');
    //     $num = $redis->get('num');
    //     echo $num."<br/>";
    //   $n=request()->n;
    //     $where=[];
    //     if($n){
    //         $where[]=['goods_name','like',"%$n%"];
    //     }
        
    //     $data=DB::table('crm_goods')->where($where)->paginate(2);
    //     return view('goods.list',['data'=>$data,'n'=>$n]);
    // }
    // public function create()
    // {
    //     $redis = new \Redis();
    //     $redis->connect('127.0.0.1','6379');
    //     $redis->incr('num');
    //     return view('goods.add');
    // }

    // public function store(Request $request)
    // {
    //     $data=$request->all();
    //     // dd($data);
    //     $path = $request->file('goods_logo')->store('goods');
    //     $img=asset('storage'.'/'.$path);
    //     // echo asset('storage'.'/'.$path);
    //     // dd($path);
        
    
    //     //  if($request->hasFile('goods_logo')){
    //     //     $res= $this->upload('goods_logo');
    //     //     if($res['code']){
    //     //         $data['goods_logo']=$res['imgurl'];
    //     //     }else{
    //     //         return $res['message'];
    //     //     }
    //     //     
    //     $res=DB::table('crm_goods')->insert([
    //         'goods_name'=>$data['goods_name'],
    //         'goods_logo'=>$img,
    //         'goods_num'=>$data['goods_num'],
    //         'create_time'=>time(),
    //     ]);
    //   if($res){
    //       return redirect('/goods/list');
    //   }
    // }
    //  public function upload($file)
    // {
    //     if( request()->file($file)->isValid() ){
    //         $photo=request()->file($file);a
    //         $data=$photo->store(date('Ymd'));
    //         return ['code'=>1,'imgurl'=>$data];
    //     }else{
    //         return ['code'=>2,'message'=>'失败'];
    //     }
    // }

