<?php

namespace App\Http\Middleware;

use App\Models\ActionLog;
use Closure;

class ActionLoggerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $log = new ActionLog([
            'user_id' => $request->user()->id,
            'method'  => $request->method(),
            'url'     => $request->url(),
            'content' => $request->getContent(),
        ]);

        $log->save();

        return $next($request);
    }
}
