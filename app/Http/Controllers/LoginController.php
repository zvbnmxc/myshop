<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class LoginController extends Controller
{
    public function select()
    {
        $zhucInfo = DB::table('deng')->paginate(2);
        // dd($zhucInfo);
        return view('login.select',['zhucInfo'=>$zhucInfo]);
    }
    //注册视图
    public function add(){
        return view('login.che');
    }
    //执行添加
    public function doadd(Request $request)
    {
        $data=$request->except(['_token','id']);
        // dd($data);
        $res=DB::table('deng')->insert($data);
        // dd($res);
         if($res){
            return redirect('login/index');
         }
    }
    //登录视图
    public function kong(Request $request)
    {
        return view('login.index');
    }
    //执行登录
    public function store(Request $request)
    {
        // 接收数据库里的值
        $res = $request->all();
        // dd($res);exit;
        // where条件
        $data = DB::table('deng')->where('admin_name',$res['admin_name'])->where('admin_pwd',$res['admin_pwd'])->first();
        if(!empty($data)){
            return redirect('admin');
        }
        // $where['admin_name'] = $post['admin_name'];
        // $user = DB::name('deng')->where($where)->first();
        // if(!$user){
        //     return view('', ['data'=>$post,'error'=>'查无此人']) ;
        // }
        // $pwd = createPwd($post['admin_pwd'], $user['salt']);
        // if( $pwd!==$user['admin_pwd']){
        //     return view('', ['data'=>$post,'error'=>'密码错误']) ;
        // }  
        // session('admin_name',$user); 
        // return redirect('login/zhanshi');
    }
    //展示
    public function zhanshi(Request $request)
    { 
        $req=$request->all();
        if(isset($req['admin_name'])){
            $data=DB::table('deng')->where('admin_name','like', '%'.$req['admin_name'].'%')->paginate(2);
        }else{
            $req['admin_name']='';
            $data=DB::table('deng')->paginate(2);
        }
        return view('login/zhanshi',['data'=>$data,'admin_name'=>$req['admin_name']]);
    }
    
}
   