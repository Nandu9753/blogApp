<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function registration(){
        return view('User.register');
    }
    public function register(RegisterRequest $request) 
    {
        $data = $request->all();
        $check = $this->create($data);
        return redirect()->route('user.login')->with('success', "Account successfully registered.");
    }
    public function index(){
        return view('User.login');
    }
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'mobile' => $data['mobile'],
        'password' => Hash::make($data['password'])
      ]);
    }
    public function login(LoginRequest $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        //$credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => 
    $request->password,'active' =>'1'],$request->remember_token)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withError('Login details are not valid');
    }
    public function logout() {
        Session::flush();
        Auth::guard('web')->logout();
        return Redirect('login');
    }
    public function dashboard(){
        return view('User.dashboard');
    }
     
}

