<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="sumit kumar">
        <title>Blog App</title>
        <style>
   
        </style>
  <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
 <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
 </head>

<body>
  <!--=============================
                                             NAVIGATION
                                   =============================-->
  <!--top nav start=======-->
    @include('Admin.layouts.nav')
  <!--    top nav end===========-->
  <div class="wrapper" id="wrapper">
    <div class="left-container" id="left-container">
      <!-- begin SIDE NAV USER PANEL -->
        @include('Admin.layouts.side_bar')
      <!-- END SIDE NAV USER PANEL -->
    </div>
    <div class="right-container" id="right-container">
        <div class="container-fluid">
        @yield('content')
    </div>
  </div>
    
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@if(Session::has('success'))
<script>
    // success message popup notification
        toastr.success("{{ Session::get('success') }}");
</script>
@endif
  <script type="text/javascript">
    $(document).ready(function() {
     
        
      $("#menu-icon").click(function() {
        $("#chang-menu-icon").toggleClass("fa-bars");
        $("#chang-menu-icon").toggleClass("fa-times");
        $("#show-nav").toggleClass("hide-sidebar");
        $("#show-nav").toggleClass("left-sidebar");
          
        $("#left-container").toggleClass("less-width");
        $("#right-container").toggleClass("full-width");
      });
        
     
        
    });
  </script>
    