@extends('Admin.layouts.app')
@section('content')
<div class="row">
            <div class="col-md-4">
            <ul class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ url('/') }}"> Home</a></li>
						<li class="active">User List</li>
					</ul>
            </div>
           <div class="title"><h2>All Users List</h2></div>
            </div>
<table class="table">
  <thead>
    
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $key => $user)
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $user->name }} </td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->mobile }}</td>
      <td><a class="btn btn-{{$user->active == 1 ? 'success' : 'danger'}}" href="{{ route('user.status',$user->id) }}" >{{ $user->active == 1 ? 'Active' : 'Inactive' }}</a></td>
      <td><a class="btn btn-primary btn-xs" href="{{ route('user.edit',$user->id) }}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
      <a class="btn btn-danger btn-xs" href="{{ route('user.delete',$user->id) }}" onclick="return confirm('Are you sure you want to delete this User    ?');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection