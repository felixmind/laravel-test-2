<?php

namespace App\Http\Middleware;

use App\Models\ActionLog;
use Closure;
use Illuminate\Http\Request;

/**
 * Посредник сохраняет информацию о действии, включая автора действия.
 */
class ActionLoggerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        ActionLog::create([
            'user_id' => $request->user()->id,
            'method'  => $request->method(),
            'url'     => $request->url(),
            'content' => $request->getContent(),
        ]);

        return $next($request);
    }
}
