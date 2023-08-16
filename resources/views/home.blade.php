
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    .blogShort{ box-sizing: border-box;border: 1px solid #ccc;margin-top:20px;
}
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
 .paginate{
    margin-top: 30px;
 }
 
</style>
<div class="container">
     <div class="row">
    	<div class="col-md-12">
        <div class="usermenu">
    		  <h1> User Post
        	   <span class="pull-right">
                    <!-- <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-home"></span> Home</a> 
                    <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-folder-open"></span> Categories</a> 
                    <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-tags"></span> Tags</a> 
                    <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-tower"></span> Team</a> 
                    <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-calendar"></span> Archives</a> 
                                        
                    <div class="btn-group">
                    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> Username</button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    </button>                    
                    <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Blog Posts</a></li>
                    <li><a href="#">Posts Under Review</a></li>
                    <li><a href="#">Comments</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Tags</a></li>
                    <li><a href="#">My Subscriptions/a></li>
                    <li><a href="#">Team Blog Requests</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Sign Out</a></li>
                    </ul>
                    </div>
                    -->
                    <a href="{{ route('post.show') }}" class="btn btn-lg btn-primary">
                    My Post</a>
                    <a href="{{ route('post.create') }}" class="btn btn-lg btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Create new</a>
                </span>   
    		  </h1>
		</div>
	</div>
</div>
   
	 <div id="blog" class="row"> 
                @if(count($posts) != 0)
                @foreach($posts as $post)
                 <div class="col-md-10 blogShort">
                     <h1>{{ $post->title }}</h1>                     
                       <b>User:</b>  <em>{{ $post->user['name'] }}</em>
                     <article><p>
                         {!! $post->description !!}
                         </p></article>
                 </div>
                @endforeach  
                @else
                    <h2 style="color:red;text-align:center">Post Not Found</h2>
                @endif       
            </div>
            <div class="paginate col-md-12" >{{ $posts->links() }}</div>
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
