<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckVotingPeriod
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentDate = now();
        $campaignStart = config('election.campaign');
        $votingStart = config('election.start');
        $votingEnd = config('election.end');
        if ($currentDate < $votingStart) {
            if ($currentDate > $campaignStart) {
                if (strcmp($request->path(), 'pemilu') === 0) {
                    return $next($request);
                } 
                return redirect('/pemilu/info?status=campaign');
            } 
            return redirect('/pemilu/info?status=notstarted');
        } else  if ($currentDate > $votingEnd) {
            return redirect('/pemilu/info?status=ended'); 
        }

        return $next($request);

    }
}
