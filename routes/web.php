<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','index\IndexController@index');
Route::get('admin','admin\AdminController@admin');
//中间介商品表2
Route::group(['middleware' => ['goods2']], function () {
	Route::prefix('/goods2')->group(function(){
		Route::any('/update','Goods2Controller@update');
		Route::any('edit','Goods2Controller@edit');
	});
});	
//商品表2
Route::prefix('/goods2')->group(function(){
	Route::get('add','Goods2Controller@create');
	Route::post('doadd','Goods2Controller@store');
	Route::get('list','Goods2Controller@index');
	Route::any('shanchu','Goods2Controller@shanchu');
});

// Route::get('/user','UserController@create');
//元老学生表
Route::prefix('/user')->group(function(){
	Route::get('add','UserController@create');
	Route::post('doadd','UserController@store');
	Route::get('list','UserController@index');
	Route::any('update','UserController@update');
	Route::any('edit','UserController@edit');
	Route::any('shanchu','UserController@shanchu');
});
//验证chuo
Route::prefix('/chuo')->group(function(){
	Route::get('add','ChuoController@create');
	Route::post('doadd','ChuoController@store');
	Route::get('list','ChuoController@index');
	Route::any('update','ChuoController@update');
	Route::any('edit','ChuoController@edit');
	Route::any('shanchu','ChuoController@shanchu');
});
//调研
Route::prefix('/zkdy')->group(function(){
	Route::get('add', 'ZkdyController@add');//添加
	Route::post('add_do', 'ZkdyController@add_do');//添加入库
	Route::get('list', 'ZkdyController@list');//列表添加
	Route::post('list_do', 'ZkdyController@list_do');//列表信息
	Route::get('list_list', 'ZkdyController@list_list');//列表展示
	Route::get('list_fff', 'ZkdyController@list_fff');//调研问题
	Route::get('del', 'ZkdyController@del');//调研删除

	Route::get('aa', 'ZkdyController@aa');//数组处理
	Route::get('bb', 'ZkdyController@bb');//数组处理
	Route::get('cc', 'ZkdyController@cc');//数组处理
	Route::get('dd', 'ZkdyController@dd');//数组处理
	Route::get('ee', 'ZkdyController@ee');//数组处理
});
//登录注册
Route::prefix('/login')->group(function(){
	Route::get('che','LoginController@add');
	Route::post('doadd','LoginController@doadd');
	Route::get('index','LoginController@kong');
	Route::post('store','LoginController@store');
	Route::get('zhanshi','LoginController@zhanshi');
	Route::get('select','Login@select');
});
//登录注册1
Route::prefix('/login1')->group(function(){
	Route::get('che','Login1Controller@add');
	Route::post('doadd','Login1Controller@doadd');
	Route::get('index','Login1Controller@kong');
	Route::post('store','Login1Controller@store');
	Route::get('zhanshi','Login1Controller@zhanshi');
	Route::get('select','Login1@select');
});
//商品表
Route::prefix('/goods')->group(function(){
	Route::get('add','GoodsController@create');
	Route::post('doadd','GoodsController@store');
	Route::get('list','GoodsController@index');
	Route::any('update','GoodsController@update');
	Route::any('edit','GoodsController@edit');
	Route::any('shanchu','GoodsController@shanchu');
});
//12306火车票
Route::prefix('/huochepiao')->group(function(){
	Route::get('add','HuochepiaoController@create');
	Route::post('doadd','HuochepiaoController@store');
	Route::get('list','HuochepiaoController@index');
	Route::any('update','HuochepiaoController@update');
	Route::any('edit','HuochepiaoController@edit');
	Route::any('shanchu','HhuochepiaoController@shanchu');
});
//周考
Route::prefix('/ksksks')->group(function(){
	Route::get('add','KsksksController@create');
	Route::post('doadd','KsksksController@store');
	Route::get('list','KsksksController@index');
	Route::any('update','KsksksController@update');
	Route::any('edit','KsksksController@edit');
	Route::any('shanchu','KsksksController@shanchu');
});
//详情页
Route::get('product/{goods_id}','index\IndexController@product');
Route::get('product3/{goods_id}','index\IndexController@product3');


Route::prefix('/index')->group(function(){
	Route::get('index','LoginController@index');
});
Route::get('add_good','Admin\GoodsController@add_good');
Route::post('do_add_good','Admin\GoodsController@do_add_good');
//阿里云
Route::get('/pay','pay\AliPayController@pay');
Route::post('/notify_url','pay\AotiliPayController@aliNotify');

//评论
Route::prefix('/pinglun')->group(function(){
	Route::get('add','PinglunController@add');
	Route::post('add_do','PinglunController@add_do');
	Route::get('list','PinglunController@list');
	Route::any('list_do','PinglunController@list_do');
	Route::get('list1','PinglunController@list1');
	Route::any('shanchu','PinglunController@shanchu');
});
// //舒雯
// Route::prefix('/wechat')->group(function(){
// 	Route::get('wechat_index','WechatController@wechat_index'); // 获取用户列表
// 	Route::get('wechat_to_index','WechatController@wechat_to_index');
// 	Route::get('wechat_add','WechatController@wechat_add');// 获取用户信息
// });

Route::get('wechat/get_access_token','WechatController@get_access_token');//获取access_token
Route::get('wechat/user_list','WechatController@user_list');//获取用户信息
Route::get('/login','LoginController@login');//没有的
Route::get('logins/login','LoginsController@login');//微信授权登录
Route::get('logins/wechat_login','LoginsController@wechat_login');//微信授权登录
Route::get('logins/code','LoginsController@code');//接受code

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login','LoginController@login');
////////////////////////////////////////////// 标签////////////////////////////////////////////////////
///
Route::get('/wechat/tag_list','TagController@tag_list');  //公众号标签列表
Route::get('/wechat/add_tag','TagController@add_tag');
Route::post('/wechat/do_add_tag','TagController@do_add_tag');
Route::get('/wechat/tag_openid_list','TagController@tag_openid_list'); //标签下用户的openid列表
Route::post('/wechat/tag_openid','TagController@tag_openid'); //为用户打标签
Route::get('/wechat/user_tag_list','TagController@user_tag_list'); //用户下的标签列表
Route::get('/wechat/push_tag_message','TagController@push_tag_message'); //推送标签消息
Route::post('/wechat/do_push_tag_message','TagController@do_push_tag_message'); //执行推送标签消息
Route::get('/wechat/push_template_message','WechatController@push_template_message'); //
//////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/wechat/clear_api','WechatController@clear_api');
Route::get('/wechat/source','WechatController@wechat_source'); //素材管理
Route::get('/wechat/download_source','WechatController@download_source'); //下载资源
Route::get('/wechat/upload','WechatController@upload'); //上传
Route::post('/wechat/do_upload','WechatController@do_upload'); //上传
Route::get('wechat/get_access_token','WechatController@get_access_token'); //获取access_token
Route::get('/wechat/get_user_list','WechatController@get_user_list'); //获取用户列表
Route::get('/wechat/login','LoginController@wechat_login'); //微信授权登陆
Route::get('/wechat/code','LoginController@code'); //接收code
