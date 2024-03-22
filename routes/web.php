<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
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

Route::get('/admin-pages',function (){
    return "Welcome Admin";
})->middleware('can:verifyAdmin');

Route::get('/profile',[UsersController::class,'viewProfile']);
Route::post('/users',[UsersController::class,'login'])->middleware('guest');
Route::view('/login',"form")->name('login');
Route::view('/register',"register");
Route::post('/register',[UsersController::class,'register']);
Route::post('/logout',[UsersController::class,'logout'])->middleware('isLoggedIn');

Route::get('/create-post',[PostController::class,'createPostPage'])->middleware('isLoggedIn');
Route::post('/create-post',[PostController::class,'addPost'])->middleware('isLoggedIn');
Route::get('/posts/{post}',[PostController::class,'getSinglePost'])->middleware('isLoggedIn');
Route::delete('/posts/{post}',[PostController::class,'deletePost']);

Route::get('/profile/{user:name}',[UsersController::class,'profile'])->middleware('isLoggedIn')->middleware('isLoggedIn');
Route::get('/manage-avatar',[UsersController::class,'showAvatarForm'])->middleware('isLoggedIn');
Route::post('/manage-avatar',[UsersController::class,'manageAvatar'])->middleware('isLoggedIn');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
