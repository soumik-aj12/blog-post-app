<?php
//
//namespace App\Models;
//use Illuminate\Database\Eloquent\ModelNotFoundException;
//use Illuminate\Support\Facades\File;
//use Spatie\YamlFrontMatter\YamlFrontMatter;
//
//class Posts{
//    public $title;
//    public $body;
//    public $anchor;
//
//    public function __construct($title,$body,$anchor)
//    {
//        $this->title = $title;
//        $this->anchor = anchor;
//        $this->body = $body;
//    }
//
//
//    public static function all(){
//        return cache()->rememberForever("posts.all",function (){
//            return collect(File::files(resource_path("/posts")))
//                ->map(function($file){
//                    return YamlFrontMatter::parseFile($file);
//                })
//                ->map(function ($document){
//                    return new Posts(
//                        $document->title,
//                        $document->body(),
//                        $document->anchor
//                    );
//                });
//        });
//
//    }
//    public static function find($slug){
//        $post = static::all();
////        dd($post->firstWhere("anchor",$slug));
//        return $post->firstWhere("anchor",$slug);
//    }
//}
