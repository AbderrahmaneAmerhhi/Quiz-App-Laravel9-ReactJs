<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isEdutiant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if($request->is('group') || $request->is('cats') || $request->is('quiz') || $request->is('quiz/*') ){
        //    if(auth()->user()->role != 'student' || auth()->guard('admin') ){
        //     return $next($request);
        //    }else{
        //     return redirect()->route('dash.index');
        //    }
        // }
        if (!$request->expectsJson()) {
            if(auth()){
            if($request->is('establishment') &&  auth()->user()->role == 'teacher'  ||$request->is('cats') &&  auth()->user()->role == 'teacher' || $request->is('group') &&  auth()->user()->role == 'teacher' || Auth::guard('admin')->check()){

                return $next($request);
                }else{
                    return redirect()->route('dash.index');
                }

            }else{
                return redirect()->route('dash.index');
            }

        }
        // return $next($request);
    }
}
