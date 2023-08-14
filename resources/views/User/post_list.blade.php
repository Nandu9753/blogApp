@extends('User.layouts.app')
@section('content')
<div class="row">
            <div class="col-md-4">
            <ul class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ url('/') }}"> Home</a></li>
						<li class="active">Post List</li>
					</ul>
            </div>
           <div class="title"><h2>Post List</h2></div>
            </div>
<table class="table">
  <thead>
    
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $key => $post)
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $post->title }} </td>
      <td>{{ strip_tags($post->description) }}</td>
      <td><a class="btn btn-primary btn-xs" href="{{ route('post.edit',$post->id) }}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
    <a class="btn btn-danger btn-xs" href="{{ route('post.delete',$post->id) }}" onclick="return confirm('Are you sure you want to delete this post?');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection