@extends('User.layouts.app')
@section('content')
<div class="row">
            <div class="col-md-4">
            <ul class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ url('/') }}"> Home</a></li>
						<li class="active">Edit Post</li>
					</ul>
            </div>
           <div class="title"><h2>Edit Post</h2></div>
            </div>
<form action="{{ route('post.update',$post->id) }}" method="post">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter Title" value="{{ $post->title }}">
  </div>
                    @if ($errors->has('title'))
                			<span class="text-danger text-left">{{ $errors->first('title') }}</span>
           				 @endif
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea  name="description" value="{{ old('description') }}">{{ $post->description }}</textarea>
  </div>
  @if ($errors->has('description'))
                			<span class="text-danger text-left">{{ $errors->first('description') }}</span><br>
  @endif
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection
@push('js')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'description' );
</script>
@endpush