<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyForUsers {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) {
        if(!Auth::check() ) {
            return redirect()->to('/login')->with('error', __('The requested page can be accessed only for users!'));
    }
    return $next ($request);
    //ez adja vissza a leszűrt eredményt
}
}