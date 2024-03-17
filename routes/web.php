<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use \App\Http\Controllers\UsersController;
use \App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    $path = resource_path("posts");
    $files = File::files($path);
    $posts = [];

    //APPROACH 1
//    foreach($files as $file) {
//        $document = YamlFrontMatter::parseFile($file);
//        $posts[] = new Posts(
//            $document->title,
//            $document->body(),
//            "posts/".$document->anchor
//
//        );
//    }

    //APPROACH 2
//    $posts = array_map(function($file){
//        $document = YamlFrontMatter::parseFile($file);
//
//        return new Posts(
//            $document->title,
//            $document->body(),
//            "posts/".$document->anchor
//        );
//    },$files);

    //APPROACH 3



//     ddd($posts);
    return view('posts',[
        'posts'=>Post::all()
    ]);
});

//Route::get('/posts/{post}', function ($id) {
//
//    $post = Post::find($id);
//    echo typeOf($post);
//    // return $slug;
////    return view('post', ['post'=> $post]);
//});

Route::get('/henlo',function () {
    $data = [
        'title' => "HELLO GALAXY",
        'desc' => "Lorem Epsum OH MAI GAAAH",

    ];
    return view('henlo',['henlo'=>$data]);
});

//Route::get('/users',fn()=> view('form'));
Route::post('/users',[UsersController::class,'login'])->middleware('guest');
Route::view('/login',"form")->name('login');
Route::view('/register',"register");
Route::post('/register',[UsersController::class,'register']);
Route::post('/logout',[UsersController::class,'logout']);

Route::get('/create-post',[PostController::class,'createPostPage'])->middleware('isLoggedIn');
Route::post('/create-post',[PostController::class,'addPost'])->middleware('isLoggedIn');
Route::get('/posts/{post}',[PostController::class,'getSinglePost'])->middleware('isLoggedIn');
