<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
      public function login(Request $request){     
        $creds=$request->only(['email','password']);  
               if($token=auth()->attempt($creds)){
                    return response()->json([    
                        'succes'=>false,
                        'message'=>'invalid credentials' 
                             ]);       
                             }        
                        return response()->json([    
                             'succes'=>true,   
                             'token'=>$token,  
                             'user'=>Auth::user()      
                               ]);  
         }

         public function register(Request $request){   
            $encryptedPass=Hash::make($request->password); 

            $user=new User;  

             try{ 
                $user->name=$request->name;            
                $user->email=$request->email;        
                $user->password=$encryptedPass;    
                $user->save();         
                return $this->login($request);   
            }      
            catch(Exeption $e){                                          
                return response()->json([     
                    'succes'=>false, 
                    'message'=>''.$e 
                ]);     
            } 
        }

         public function logout(Request $request){  
            try{            
                JWTAuth::invalidate(JWTAuth::parseToken($request->token));  
                     return response()->json([               
                        'succes'=>true,     
                        'message'=>'Logout success'      
                    ]);        
            }       
            catch(Exeption $e){    
                return response()->json([ 
                    'succes'=>false,                                                                      
                    'message'=>''.$e     
                ]);  
            }     
        }
}