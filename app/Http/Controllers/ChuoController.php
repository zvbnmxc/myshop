<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
class ChuoController extends Controller
{
    //展示
    public function index(Request $request)
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $num=$redis->get('num');
        echo $num."<br/>";
        
        $req=$request->all();
        if(isset($req['xm'])){
            $data=DB::table('chuo')->where('xm','like','%'.$req['xm'].'%')->paginate(5);
        }else{
            $req['xm']='';
            $data=DB::table('chuo')->orderBy('id','desc')->paginate(5);
        }
        return view('chuo/list',['data'=>$data,'xm'=>$req['xm']]);
    }
    //添加
    public function create(){
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->delete('num');
        return view('chuo.add');
    }
    //执行添加
    public function store(Request $request)
    {
        $data=$request->except(['_token']);
        $validator= \Validator::make($request->all(),[
            'xm'=>'required',
            'jie'=>'required',
        ],[
            'xm.required'=>'姓名必填',
            'jie.required'=>'介绍必填',
        ]);

        if($validator->fails()){
            return redirect('chuo/add')->withErrors($validator)->withInput();
        }
        $res=$request->all();
        $xm=$res['xm'];
        $jie=$res['jie'];
        if($xm==$jie){
            return '不能一样';
        }
        $data['addtime'] = time();
        // dd($data);
        $res=DB::table('chuo')->insert($data);
        // dd($res);
        if($res){
            return redirect('chuo/list');
        }
    }

    //执行修改
    public function edit(Request $request)
    {
        // dd(22);
        $req=$request->all();

        $res=DB::table('chuo')->where(['id'=>$req['id']])->update([
           'xm'=>$req['xm'],
           'jie'=>$req['jie']
        ]);
        if(!empty($res)){
            return redirect('chuo/list');
        }
    }
    //修改
    public function update(Request $request)
    {
       
        $req = $request->all();
     //   dd($req);
        $data=DB::table('chuo')->where(['id'=>$req['id']])->first();
       // dd($data);
        return view ('chuo.update',['data'=>$data]);
    }
    //删除
    public function shanchu(Request $request)
    {
        // dd(11);
        $req = $request->all();
        // dd($req);
        $data=DB::table('chuo')->where(['id'=>$req['id']])->delete();
        if(!empty($data)){
            return redirect('chuo/list');
        }
    }
    
}