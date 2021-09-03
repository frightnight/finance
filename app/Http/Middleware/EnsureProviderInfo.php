<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureProviderInfo
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
        if (env('APP_ENV') === 'testing') {
            return $next($request);
        }

        if(subdomain_name() == 'wharf'){
            return $next($request);
        }

        if(auth()->user()->hasRole('loan-provider')){
            if(is_null(auth()->user()->loan_provider->profile)){
                return redirect()->route('loan-provider-profile-create');
            }
        }
        if(auth()->user()->hasRole('farmer')){
            if( (Auth::user()->farmer->profile->secondary_info == null) || (is_null(Auth::user()->farmer->profile)) ){
                return redirect()->route('farmer-profile-create');
            }
//            if(is_null(Auth::user()->farmer->profile)){
//                return redirect()->route('farmer-profile-create');
//            }
        }
        if(auth()->user()->hasRole('community-leader')){
//            dd(Auth::user()->leader->profile->secondary_info);
            if( (Auth::user()->leader->profile->secondary_info == null) || (is_null(Auth::user()->leader->profile)) ){
                return redirect()->route('farmer-profile-create');
            }
//            if(){
//                return redirect()->route('community-leader-profile-create');
//            }
        }

        return $next($request);
    }
}
