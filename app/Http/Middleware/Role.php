<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        if (!auth()->check() || !in_array(auth()->user()->role, $roles)) {
            // return back()->with('aksesWrong', "Anda Tidak Memiliki Akses");
            abort(403, 'Anda tidak memiliki hak mengakses laman tersebut!');
        }

        return $next($request);
    }
}
