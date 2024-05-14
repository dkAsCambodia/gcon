<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = $request->path();
        if(($path == 'login' || $path == 'register' || $path == 'forgetPassword') && Session::get('memberdata')
        || (strpos($path, 'PasswordDetails') !== false && Session::has('memberdata'))
        )
        {
            return redirect('/');
        }
        
        if(
            ($path == 'profile' && !Session::get('memberdata'))
         || (strpos($path, 'dashboard') !== false && !Session::has('memberdata'))
        )
        {
            return redirect('/login');
        }
        return $next($request);
    }
}
