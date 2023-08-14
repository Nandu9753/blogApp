

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    .blogShort{ border-bottom:1px solid #ddd;}
.add{background: #333; padding: 10%; height: 300px;}

.nav-sidebar { 
    width: 100%;
    padding: 8px 0; 
    border-right: 1px solid #ddd;
}
.nav-sidebar a {
    color: #333;
    -webkit-transition: all 0.08s linear;
    -moz-transition: all 0.08s linear;
    -o-transition: all 0.08s linear;
    transition: all 0.08s linear;
}
.nav-sidebar .active a { 
    cursor: default;
    background-color: #34ca78; 
    color: #fff; 
}
.nav-sidebar .active a:hover {
    background-color: #37D980;   
}
.nav-sidebar .text-overflow a,
.nav-sidebar .text-overflow .media-body {
    white-space: nowrap;
    overflow: hidden;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis; 
}

.btn-blog {
    color: #ffffff;
    background-color: #37d980;
    border-color: #37d980;
    border-radius:0;
    margin-bottom:10px
}
.btn-blog:hover,
.btn-blog:focus,
.btn-blog:active,
.btn-blog.active,
.open .dropdown-toggle.btn-blog {
    color: white;
    background-color:#34ca78;
    border-color: #34ca78;
}
 h2{color:#34ca78;}
 .margin10{margin-bottom:10px; margin-right:10px;}
</style>
<div class="container">
    <h1>User Posts</h1>
	 <div id="blog" class="row"> 
                @foreach($posts as $post)
                 <div class="col-md-10 blogShort">
                     <h1>{{ $post->title }}</h1>                     
                         <em>{{ $post->user['name'] }}</em>
                     <article><p>
                         {!! $post->description !!}
                         </p></article>
                     @if(Auth::guard('admin')->user())    
                     <a class="btn btn-primary pull-right marginBottom10" href="{{ route('admin.post.edit',$post->id) }}">Edit</a>
                     <a class="btn btn-danger btn-xs" href="{{ route('admin.post.delete',$post->id) }}" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                     @else 
                     <a class="btn btn-primary pull-right marginBottom10" href="{{ route('post.edit',$post->id) }}">Edit</a>
                     <a class="btn btn-danger btn-xs" href="{{ route('post.delete',$post->id) }}" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                     @endif 
                 </div>
                @endforeach         
               <div class="col-md-12 gap10"></div>
             </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

@if(Session::has('success'))
<script>
    // success message popup notification
        toastr.warning("{{ Session::get('success') }}");
</script>
@endif
