<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create(Request $request){
        $post=new Post;
        $post->user_id=Auth::user()->id;
        $post->desc=$request->desc;

        //check if post has photo
        if($request->photo !=''){
            //un unique nom pour la photo
            $photo=time().'jpg';
            //chemin du repertoire photo
            file_put_contents('storage/posts/'.$photo,base64_decode($request->photo));
            $post->photo=$photo;
        }
        $post->save();
        $post->user;
        return response()->json([
            'success'=>true,
            'message'=>'posted',
            'post'=>$post
        ]);
    }

    public function update(Request $request){
        $post=Post::find($request->id);
        if(Auth::user()->id!=$request->user_id){
            return response()->json([
                'success'=>false,
                'message'=>'acces non autorise'
            ]);
        }
        $post->desc=$request->desc;
        $post->update();
        return response()->json([
            'success'=>true,
            'message'=>'post edited'
        ]);
    }

    public function delete(Request $request){
        $post=Post::find($request->id);
        if(Auth::user()->id!=$post->user_id){
            return response()->json([
                'success'=>false,
                'message'=>'acces non autorise'
            ]);
        }
        //check if post have photo to delete
        if($post->photo !=''){
            storage::delete('public/posts/'.$post->photo);
        }
        $post->delete();
        return response()->json([
            'success'=>true,
            'message'=>'post deleted'
        ]);
    }

    public function posts(){
        $posts=Post::orderBy('id','desc')->get();
        foreach($posts as $post){
            //get user of post
            $post->user;
            //comment count
            $post['commentsCount']=count($post->comments);
            //likes count
            $post['likesCount']=count($post->likes);
            $post['selfLike']= false;
            foreach($post->likes as $like){
                if($like->user_id==Auth::user()->id){
                    $post['selfLike']=true;
                }
            }
        }
        return response()->json([
            'success'=>true,
            'posts'=>$posts
        ]);
    }
}