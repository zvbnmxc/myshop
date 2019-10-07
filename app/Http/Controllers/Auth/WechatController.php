<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use DB;
    class WechatController extends Controller
    {
        //
        public function get_access_token()
        {
            //获取access_token
            $redis = new \Redis();
            $redis->connect('127.0.0.1','6379');
            $access_token_key = 'wechat_access_token';
            if($redis->exists($access_token_key)){
                //去缓存拿
                $access_token = $redis->get($access_token_key);
            }else{
                //去微信接口拿
                $access_re = file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET");
                $access_result = json_decode($access_re,1);
                $access_token = $access_result['access_token'];
                $expire_time = $access_result['expires_in'];
                //加入缓存
                $redis->set($access_token_key,$access_token,$expire_time);
            }
            return $access_token;
        }
            
    }


// namespace App\Http\Controllers;
// use Illuminate\Http\Request;
// use DB;
// class WechatController extends Controller
// {
// 	// 获取用户信息
//     public function wechat_add($access_token,$dares)
//     {
//     	// $access_token=$this->get_access_token();
//     	// $openid='o40CXv8ycnbfQvpkRV1CkDcwHe_I';
//     	$wechat_user=file_get_contents("https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$dares."&lang=zh_CN");
//     	$user_info=json_decode($wechat_user,1);
//     	// dd($user_info);
//         return $user_info;
//     }
//     // 获取用户列表
//     public function wechat_index()
//     {
//     	$access_token=$this->get_access_token();
//     	// dd($access_token);
//     	//拉取关注用户列表（粉丝）
//     	$wechat_user=file_get_contents("https://api.weixin.qq.com/cgi-bin/user/get?access_token={$access_token}&next_openid=");
//     	// dd($wechat_user);
//     	$user_info=json_decode($wechat_user,1);
//     	// dd($user_info);
//         $dares=$user_info['next_openid'];
//         // dd($dares);
//         $data=$this->wechat_add($access_token,$dares);
//         // dd($data);
//         $data=DB::table('wechat_openid')->insert([
//             "openid"=>$data['openid'],  
//             "nickname"=>$data['nickname'],
//             "sex"=>$data['sex'],
//             "headimgurl"=>$data['headimgurl'],
//             "subscribe"=>$data['subscribe'],
//             "city"=>$data['city'],
//             'add_time'=>time()
//         ]);
//         // dd($data);
//     }

//     public function wechat_to_index(request $request)
//     {
//         $res=DB::table('wechat_openid')->get();
//         // dd($res);
//         return view('fensi.wechat_to_index',['res'=>$res]);
//     }
//     // 获取assess_token
//     public function get_access_token()
//     {
//     	// 获取access_token
//     	$redis=new \Redis();
//     	$redis->connect('127.0.0.1','6379');
//     	$access_token_key='wechat_assess_token';
//     	if($redis->exists($access_token_key)){
//     	4 ;	// 去缓存拿
//     		$access_token=$redis->get($access_token_key);
//     	}else{
//     		//去微信接口拿
//             $access_re=file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_creden");
//                     $access_result = json_decode($access_re,1);
//                     $access_token = $access_result['access_token'];
//                     $expire_time = $access_result['expires_in'];
//                     //加入缓存
//                     $redis->set($access_token_key,$access_token,$expire_time);
//                 }
//                 return $access_token;
//             }
                
//         }
    