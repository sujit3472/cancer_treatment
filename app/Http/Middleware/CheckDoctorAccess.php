<?php
namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Auth;

class CheckDoctorAccess
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
        if(Auth::check())  {
            $user_role = Auth::user()->role_id;
          
            if($user_role == 2){
                return $next($request);
            }
            ## if user is other than the doctor, then give the forbidden access 
            return redirect('404');    
        } else {
            return redirect('login');
        }
    }
}
