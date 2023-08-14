@extends('Admin.layouts.app')
@section('content')
<div class="row">
            <h1>edit Product</h1>
            <form action="{{route('user.update',$user->id)}}" method="post">
                @csrf
            <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name" value="{{ $user->name }}">
  </div>            
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email" value="{{ $user->email }}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mobile</label>
    <input type="mobile" class="form-control" id="exampleInputPassword1" placeholder="Mobile" name="mobile" value="{{ $user->mobile }}">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection