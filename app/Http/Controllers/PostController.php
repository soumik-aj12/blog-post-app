<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //
    public function createPostPage(){
        return view('createpost');
    }
    public function addPost(Request $req){
        $data = $req->validate([
            'title'=>'required',
            'body'=>'required',
        ]);
        $data['title'] = strip_tags($data['title']);
        $data['body'] = strip_tags($data['body']);
        $data['user_id'] = auth()->id();
        $new_post = Post::create($data);
        return redirect("/posts/{$new_post->id}");
    }
    public function deletePost(Post $post)
    {
        if(auth()->user()->cannot('delete',$post)){
            return "You cannot do that!";
        }
        $post->delete();
        return redirect('/profile/'.auth()->user()->name)->with('success',"Post Deleted");
    }
    public function getSinglePost(Post $post)
    {
        $outHTML = Str::markdown($post->body);
        $post['body'] = $outHTML;
        return view('post',['post'=>$post]);
    }
}
