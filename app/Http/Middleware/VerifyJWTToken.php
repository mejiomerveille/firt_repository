<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class VerifyJWTToken
{
 public function handle($request, Closure $next)
 {
 try {
 $user = JWTAuth::parseToken()->authenticate();
 } catch (JWTException $e) {
 if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
 return response()->json(['token_expired'], $e->getStatusCode());
 } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
 return response()->json(['token_invalid'], $e->getStatusCode());
 } else {
 return response()->json(['error' => 'Token is required']);
 }
 }
 return $next($request);
 }
}
