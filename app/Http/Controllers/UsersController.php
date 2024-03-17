<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            return redirect('/login')->with('success','You are logged in!');
        }else{
            return 'login failed';
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/login')->with('success','You are logged out!');
    }
}
