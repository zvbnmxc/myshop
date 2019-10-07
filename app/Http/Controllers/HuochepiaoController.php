<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HuochepiaoController extends Controller
{
    //展示
    public function index(Request $request)
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        $num=$redis->get('num');
        echo $num."<br/>";

        $chufazhan=request()->get('chufazhan');
        if($chufazhan){
            $data=DB::table('huochepiao')->where('chufazhan','like','%'.$chufazhan.'%')->paginate(5);
        }else{
            $req['chufazhan']='';
            $data=DB::table('huochepiao')->orderBy('id','desc')->paginate(5);
        }
        return view('huochepiao/list',['data'=>$data,'chufazhan'=>$chufazhan]);
    }
    //添加
    public function create(){
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        return view('huochepiao.add');
    }
    //执行添加
    public function store(Request $request)
    {
        $data=$request->except(['_token']);
        $data['chufa'] = time();
        // dd($data);
        $res=DB::table('huochepiao')->insert($data);
        // dd($res);
         if($res){
            return redirect('huochepiao/list');
         }
    }
    //预订
    public function update(Request $request)
    {
        $req = $request->all();
        $data=DB::table('huochepiao')->where(['id'=>$req['id']])->first();
        // dd($data);
        return view ('huochepiao.update',['data'=>$data]);
    }
    //执行修改
    public function edit(Request $request)
    {
        $req=$request->all();
        $res=DB::table('huochepiao')->where(['id'=>$req['id']])->update([
            'dadao'=>$req['daoda'],
            'chufa' => time(),
        ]);
        if(!empty($res)){
            return redirect('huochepiao/list');
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

