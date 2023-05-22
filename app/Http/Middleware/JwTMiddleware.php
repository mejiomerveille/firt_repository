<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JwTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $message='';

        try{ 
            //check token validations
            JWTAuth::parseToken()->authenticate(); 
            return $next($request);

    }catch(\Tymon\JWTAuth\Exceptions\TokenExpiredException $e){
    //do whatever you want to do if a token is expired            
     $message ='token expired';   

    }catch(\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
    //do whatever you want to do if a token is invalid   
    $message=' invalid token ';        

    }catch(\Tymon\JWTAuth\Exceptions\Exception $e){      
             //do whatever you want to do if a token is not present      
                    $message='provide token ';     
                    }         
    return response()->json([   
            'success'=>false,            
             'message'=>$message       
        ]);
    }
}