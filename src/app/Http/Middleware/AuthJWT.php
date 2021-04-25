<?php

namespace App\Http\Middleware;

use Closure;
use http\Env;
use Illuminate\Http\Request;
use Exception;

use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class AuthJWT extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $methods = ['POST', 'PUT', 'DELETE'];

        if (in_array($request->method(), $methods) && empty($request->json()->all())) {
            return response()->json([
                'message' => 'The request is not a valid JSON.',
            ], 400);
        }

        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Token is Invalid'],400);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status' => 'Token is Expired'],400);
            }else{
                return response()->json(['status' => 'Authorization Token not found'],400);
            }
        }

        $GLOBALS['userInfo'] = $user;
        return $next($request);
    }
}
