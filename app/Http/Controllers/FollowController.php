<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class  FollowController extends Controller
{
    //
    public function createFollow(User $user)
    {
        if($user->id == auth()->user()->id){
            return back()->with('failure','You cannot follow yourself');
        }

        $existFollow = Follow::where([['user_id','=',auth()->user()->id],['followeduser','=',$user->id]])->count();

        if($existFollow){
            return back()->with('failure','You are already following the user');
        }

        $newFollow = new Follow();
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followeduser = $user->id;
        $newFollow->save();
        return back()->with('success','User followed');

    }

    public function removeFollow(User $user)
    {
        Follow::where([['user_id','=',auth()->user()->id],['followeduser','=',$user->id]])->delete();
        return back()->with('success','User unfollowed');
    }
}
