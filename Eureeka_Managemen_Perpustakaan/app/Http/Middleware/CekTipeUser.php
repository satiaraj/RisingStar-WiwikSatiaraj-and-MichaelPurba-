<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CekTipeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next, $tipe)
    // {
    //     if (Auth::check()) {
    //         $user = Auth::user();
    //         Log::info('User logged in: ' . $user->email . ', Tipe: ' . $user->tipe);

    //         if ($user->tipe === $tipe) {
    //             return $next($request);
    //         }

    //         return response()->json([
    //             'status' => 'False',
    //             'message' => 'Akses tidak Diizinkan'
    //         ], 403);
    //     } else {
    //         return response()->json([
    //             'status' => 'False',
    //             'message' => 'Silahkan Login terlebih dahulu'
    //         ], 401);
    //     }
    // }
    public function handle(Request $request, Closure $next, $type)
    {
        if (Auth::check() && Auth::user()->tipe === $type) {
            return $next($request);
        }

        return response()->json([
            'status' => 'False',
            'message' => 'Anda tidak memiliki akses ke API ini'
        ], 403);
    }

}
