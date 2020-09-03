<?php

namespace Afracode\Statistic\App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Afracode\Statistic\App\Models\Statistic;
use Illuminate\Support\Facades\Session;

class TrackMiddleware
{

    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    public function terminate($request, $response): void
    {

       Statistic::create([
            'uri' => $request->getUri(),
            'method' => $request->getMethod(),
            'status_code' => $response->getStatusCode(),
            'ip' => \Request::ip(),
            'session_id' => Session::getId() ?? null,
            'user_id' => Auth::id() ?? null,
            'server' => $request->server() ?? null,
            'input' => $request->input() ?? null,
            'created_at' => Carbon::now(),
        ]);
    }
}
