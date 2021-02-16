<?php

namespace App\Http\Middleware;

use App\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache as FacadesCache;

class ActivityByUser
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
        if (Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(1); // keep online for 1 min

            FacadesCache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
            // last seen
            $user = User::find(Auth::user()->id);
            $user->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
            $user->timestamps = false;
            $user->save();
        }
        return $next($request);
    }
}
