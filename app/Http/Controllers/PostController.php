<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Exception;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user')->get();
        return view('home',compact('posts'));
    }
    public function create(){
        return view('User.create_post');
    }
    public function store(PostRequest $request){
        try{
            $user_id = Auth::guard('web')->user()->id;
            $post = new Post;
            $post->user_id = $user_id;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();
            return redirect()->back()->withSuccess('Post Created');
        }
        catch(Exception $e){
            return $e;
        }
    }
    public function show(){
        $user_id = Auth::guard('web')->user()->id;
        $posts = Post::where('user_id','=',$user_id)->get();
        return view('User.post_list',compact('posts'));
    }
    public function edit($id){
      
        $user_id = Auth::user()->id;
        $post = Post::where('id',$id)->where('user_id',$user_id)->first();
        if(empty($post)){
            return redirect()->back()->withSuccess('You Are Not Permission For Update');
        }
        return view('User.edit_post',compact('post'));
    }
    public function update(PostRequest $request,$id){
        try{
            $user_id = Auth::user()->id;
            $post = Post::where('id',$id)->where('user_id',$user_id)->first();
            if(empty($post)){
                return redirect()->back()->withSuccess('You Are Not Permission For Update');
            }
            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();
            return redirect()->route('post.show')->withSuccess('Post Updated');
        }
        catch(Exception $e){
            return $e;
        }
    }
    public function delete($id){
        try{
            $user_id = Auth::user()->id;
            $post = Post::where('id',$id)->where('user_id',$user_id)->first();
            if(empty($post)){
                return redirect()->back()->withSuccess('You Are Not Permission For Delete');
            }else{
                $post = Post::where('id',$id)->delete();
            }
            return redirect()->route('post.show')->withSuccess('Post Deleted');
        }catch(Exception $e){
            return $e;
        }
    }
}
