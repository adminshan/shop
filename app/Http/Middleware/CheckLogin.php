<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty($_COOKIE['uid'])){
            header('Refresh:2;url=/login');
            echo '没有此用户，请确定';echo '</br>';
            exit;
        }else if(!$request->session()->get('u_token')){

                echo json_encode([
                    'error' => 301,
                    'url'   => url('/users/login')
                ]);
                die;
        }
        return $next($request);
    }
}
