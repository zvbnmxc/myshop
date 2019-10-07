<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use DB;
class ZkdyController extends Controller
{
    //登录
    public function add()
    {
        return view('zkdy.add');
    }
    //执行登录
    public function add_do(Request $request)
    {
         $data=$request->all();
         $info=DB::table('deng')->insert([
             'admin_name'=>$data['admin_name'],
             'admin_pwd'=>md5($data['admin_pwd']),
         ]);
        if($info){
            return redirect('/zkdy/list');
        }
    } 
    //调研添加
    public function list()
    {
        return view('zkdy.list');
    }
    //执行调研添加
    public function list_do(Request $request)
    {
        $data=$request->except(['_token']);
        // dd($data);
        $res=DB::table('zkdy')->insert($data);
        // dd($res);
         if($res){
            return redirect('/zkdy/list_list');
         }
    }
    //展示
    public function list_list(Request $request)
    {  
        $data=DB::table('zkdy')->orderBy('id','desc')->paginate(5);
        return view('/zkdy/list_list',['data'=>$data]);
    }
    //删除
    public function del(Request $request)
    {
            // dd(11);
            $req = $request->all();
            // dd($req);
            $data=DB::table('zkdy')->where(['id'=>$req['id']])->delete();
            if(!empty($data)){
                return redirect('zkdy/list_list');
        }
    }
    //调研问题   
    public function list_fff(Request $request)
    {  
        $req = $request->all();
        $data=DB::table('zkdy')->where(['id'=>$req['id']])->first();
        // dd($data);
        return view ('zkdy.list_fff',['data'=>$data]);
    }
  
    public function list_add(Request $request)
    {
        $data=$request->all();
        //dd($data);
        $info=DB::table('strator')->insert([
             'aa'=>$data['aa'],
             'bb'=>$data['bb'],
             'cc'=>$data['cc'],
             'dd'=>$data['dd'],
        ]);
        dd($info);
    }
    public function list_acc(Request $request)
    {
        $data=$request->all();
        //dd($data);
        $info=DB::table('duoxuan')->insert([
             'a'=>$data['a'],
             'b'=>$data['b'],
             'c'=>$data['c'],
             'd'=>$data['d'],
        ]);
        dd($info);
    }
 
    
}
