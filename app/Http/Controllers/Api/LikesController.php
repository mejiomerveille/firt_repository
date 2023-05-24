<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function like(Request $request){
        $like=Like::where('post_id',$request->id)->where('user_id',Auth::user()->id)->get();
        //check if it return 0 them this post is not liked
        if(count($like)>0){
            $like[0]->delete();
            return response()->json([
                'success'=>true,
                'message'=>'unliked'
            ]);    
        }
        $like=new Like;
        $like->user_id=Auth::user()->id;
        $like->post_id=$request->id;
        $like->save();

         return response()->json([
            'success'=>true,
            'message'=>'liked'
        ]);
    }
}