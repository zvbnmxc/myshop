<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class PinglunController extends Controller
{
    //登录
    public function add(){
        return view('pinglun.add');
    }
    //执行登录
    public function add_do(Request $request)
    {
        $res=$request->all();
        $data = DB::table('pinglun')->where('u_name',$res['u_name'])->where('u_pwd',$res['u_pwd'])->first();
        if(!empty($data)){
            return redirect('/pinglun/list');
        }    
    } 
    //发布
    public function list(){
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->delete('num');

        return view('pinglun.list');
    }
     //执行发布
     public function list_do(Request $request)
     {
        $data=$request->except(['_token']);
        $data['addtime'] = time();
        // dd($data);
        $res=DB::table('pinglun')->insert($data);
        if($res){
            return redirect('/pinglun/list1');
        }
     } 
    //展示
    public function list1(Request $request)
    { 
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        $num=$redis->get('num');
        echo "当前页面浏览量为: $num 次"."<br/>";

        $req=$request->all();
        if(isset($req['u_name'])){
            $data=DB::table('pinglun')->where('u_name','like', '%'.$req['u_name'].'%')->paginate(5);
        }else{
            $req['u_name']='';
            $data=DB::table('pinglun')->orderBy('id','desc')->paginate(5);
        }
        return view('pinglun/list1',['data'=>$data,'u_name'=>$req['u_name']]);
    }
    //删除
    public function shanchu(Request $request)
    {
        // dd(11);
        $req = $request->all();
        // dd($req);
        
        $data=DB::table('pinglun')->where(['id'=>$req['id']])->delete();
        if(!empty($data)){
            return redirect('pinglun/list1');
        }
    }
}
   