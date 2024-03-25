<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    //
    public function register(Request $req)
    {
        $data = $req->validate(
            [
                'name'=>'required',
                'email'=>['required',Rule::unique('users','email')],
                'password'=>['required','min:4','max:10','confirmed']]
        );
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect('/login')->with('registered','Registered! You can now log in!');
    }
    public function login(Request $req)
    {
        $data = $req->validate(
            ['loginemail'=>'required',
            'loginpassword'=>'required']
        );
        if(auth()->attempt(['email'=>$data['loginemail'],'password'=>$data['loginpassword']])){
            return redirect('/profile/'.auth()->user()->name)->with('success','You are logged in!');
        }else{
            return 'login failed';
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/login')->with('success','You are logged out!');
    }
    public function profile(User $user)
    {
        $posts =  $user->getPostsByUser()->get();

        $currentlyFollowing = 0;
        if(auth()->check()) $currentlyFollowing = Follow::where([['user_id','=',auth()->user()->id],['followeduser','=',$user->id]])->count();
//        return $user->toJson();
        return view('profile-posts',['name'=>$user->name,'posts'=>$posts,'avatar'=> $user->avatar, 'currentlyFollowing' => $currentlyFollowing,'postCount'=>$posts->count()]);
    }
    public function showAvatarForm()
    {
        return view('avatar');
    }
    public function manageAvatar(Request $req)
    {
        $user = auth()->user();
        $req->validate([
            'avatar'=>'required|image|max:3000'
        ]);
        $img = Image::make($req->file('avatar'))->fit(120)->encode('jpg');
        $filename = $user->id . '-' . uniqid(). '.jpg';
        Storage::put('public/Avatars/'.$filename,$img);
        $old_img = $user->avatar;
        $user->avatar = $filename;
        $user->save();
        if($old_img!='/default-image.jpg'){
            Storage::delete(str_replace("/storage/","public/",$old_img));
        }
        return redirect('/profile/'.auth()->user()->name)->with("success","Congratulations on your new avatar!");
    }
    public function profileFollowers(User $user)
    {
        $posts =  $user->getPostsByUser()->get();

        $currentlyFollowing = 0;
        if(auth()->check()) $currentlyFollowing = Follow::where([['user_id','=',auth()->user()->id],['followeduser','=',$user->id]])->count();
//        return $user->toJson();
        return view('profile-followers',['name'=>$user->name,'posts'=>$posts,'avatar'=> $user->avatar, 'currentlyFollowing' => $currentlyFollowing,'postCount'=>$posts->count()]);

    }
    public function profileFollowing(User $user)
    {
        $posts =  $user->getPostsByUser()->get();

        $currentlyFollowing = 0;
        if(auth()->check()) $currentlyFollowing = Follow::where([['user_id','=',auth()->user()->id],['followeduser','=',$user->id]])->count();
//        return $user->toJson();
        return view('profile-following',['name'=>$user->name,'posts'=>$posts,'avatar'=> $user->avatar, 'currentlyFollowing' => $currentlyFollowing,'postCount'=>$posts->count()]);

    }
}

