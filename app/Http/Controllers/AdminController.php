<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Exception;
class AdminController extends Controller
{
    
    public function index(){
        return view('Admin.login');
    }
    public function login(LoginRequest $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        //$credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => 
        $request->password],$request->remember_token)){
            return redirect()->route('admin.dashboard')->withSuccess("Admin Login Successfull");
        }
  
        return redirect("admin/login")->withError('Login details are not valid');
    }
    public function logout() {
        Session::flush();
        Auth::guard('admin')->logout();
        return Redirect('/admin/login');
    }
    public function dashboard(){
        return view('Admin.dashboard');
    }
    public function userList(){
        $users = User::orderBy('id','DESC')->paginate(2);
        return view('Admin.user_list',compact('users'));
    }
    public function edit($id){
        
        $user = User::find($id);
        return view('Admin.user-edit',compact('user'));
    }
    public function update(Request $request,$id){
        try{
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->save();
            return redirect()->route('users.list')->withSuccess('User Updated');
        }catch(Exception $e){
            return $e;
        }
    }
    public function delete($id){
        try{
            $post = User::where('id',$id)->delete();
            return redirect()->route('users.list')->withSuccess('User Deleted');
        }catch(Exception $e){
            return $e;
        }
    }
    public function status($id){
        try{
            $user = User::find($id);
            $user->active = $user->active != '1' ? '1' : '0' ;
            $user->save();
            return redirect()->route('users.list')->withSuccess('User Status Updated');
        }catch(Exception $e){
            return $e;
        }
    }
    public function userPost($id){
        $users = User::find($id);
        $posts = $users->posts()->get();
        return view('Admin.post_list',compact('posts'));
    }
    public function postEdit($id){
        $post = Post::find($id);
        return view('Admin.post_edit',compact('post'));
    }
    public function postUpdate(PostRequest $request,$id){
        try{
            $post = Post::find($id);
            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();
            return redirect()->back()->withSuccess('Post Updated');
        }
        catch(Exception $e){
            return $e;
        }
    }
    public function postDelete($id){
        try{
            $post = Post::find($id);    
            $post->delete();
            return redirect()->back()->withSuccess('Post Deleted');
        }catch(Exception $e){
            return $e;
        }
    }
    public function postStatus($id){
        try{
            $post = Post::find($id);
            $post->active = $post->active != '1' ? '1' : '0' ;
            $post->save();
            return redirect()->back()->withSuccess('Post Status Update');
        }catch(Exception $e){
            return $e;
        }
    }
}
