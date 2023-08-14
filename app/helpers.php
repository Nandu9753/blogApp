<?php
namespace App;
use Illuminate\Support\Facades\Auth;
if(function_exists('isAdmin')){
    function isAdmin(){
        $user = Auth::guard('admin')->user();
        dd($user);
        return $user;
    }
}



?>