<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Session tidak sesuai, silahkan login terlebih dahulu. Salam Kami, PT Edrus Edukasi Utama']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status' => 'Session anda telah habis, silahkan logn kembali. Salam Kami, PT Edrus Edukasi Utama']);
            }else{
                return response()->json(['status' => 'Anda belum melakukan login, Silahkan login terlebih dahulu. Salam Kami, PT Edrus Edukasi Utama']);
            }
        }
        return $next($request);
    }
}
