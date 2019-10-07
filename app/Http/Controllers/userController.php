<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    //展示
    public function index(Request $request)
    {
        $req=$request->all();
        if(isset($req['xm'])){
            $data=DB::table('qwer')->where('xm','like','%'.$req['xm'].'%')->paginate(2);
        }else{
            $req['xm']='';
            $data=DB::table('qwer')->paginate(2);
        }
        return view('user/list',['data'=>$data,'xm'=>$req['xm']]);
    }
    //添加
    public function create(){
        return view('user.add');
    }
    //执行添加
    public function store(Request $request)
    {
        $data=$request->except(['_token']);
        // dd($data);
        $res=DB::table('qwer')->insert($data);
        // dd($res);
         if($res){
            return redirect('user/list');
         }
    }

    //执行修改
    public function edit(Request $request)
    {
        // dd(22);
        $req=$request->all();

        $res=DB::table('qwer')->where(['id'=>$req['id']])->update([
           'xm'=>$req['xm'],
           'ch'=>$req['ch']
        ]);
        if(!empty($res)){
            return redirect('user/list');
        }
    }
    //修改
    public function update(Request $request)
    {
       
        $req = $request->all();
     //   dd($req);
        $data=DB::table('qwer')->where(['id'=>$req['id']])->first();
       // dd($data);
        return view ('user.update',['data'=>$data]);
    }
    //删除
    public function shanchu(Request $request)
    {
        // dd(11);
        $req = $request->all();
        // dd($req);
        $data=DB::table('qwer')->where(['id'=>$req['id']])->delete();
        if(!empty($data)){
            return redirect('user/list');
        }
    }
    
}