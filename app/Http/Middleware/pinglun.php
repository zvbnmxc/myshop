<?php

namespace App\Http\Middleware;

use Closure;

class goods2
{
    // /**
    //  * Handle an incoming request.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \Closure  $next
    //  * @return mixed
    //  */
    // public function handle($request, Closure $next)
    // {   
    //     // dd(111);
    //     $start=strtotime('9:00:00');
    //     $end=strtotime('23:00:00');
    //     $now=time();
    //     if($now>=$start&&$now<=$end){
    //         //可以通过
    //         //return redirect('goods2/list');
    //         //商品修改页面【使用中间件处理商品修改需要在【9:00-17:00】才可以进入】
    //     }else{
    //         // 不可以通过
    //         dd('当前时间不可访问');
    //     }
    //     return $next($request);
    // }
}