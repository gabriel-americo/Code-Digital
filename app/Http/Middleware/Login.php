<?php

namespace App\Http\Middleware;

use Closure;
use App\Repositories\UserRepository;
use Auth;

class Login {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $loggedUser = Auth::user();

        if ($loggedUser == null) {
            return redirect()->route('sistema.login');
        }

        return $next($request);
    }

}
