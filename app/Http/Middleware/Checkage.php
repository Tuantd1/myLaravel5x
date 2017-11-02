<?php

namespace App\Http\Middleware;

use Closure;

class Checkage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param)
    {
        // after middleware
        //$response = $next($request);
        dd($param);
        // before middleware
        if ($request->age <= 200) {
            // su dung ten cua Route
            return redirect()->route('testabc');
            // su dung request route
            //return redirect('/abc1');
        }
        //return $response;
        // cho phep thuc thi request tiep theo
        return $next($request);
    }
}
