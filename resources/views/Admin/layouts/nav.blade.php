<nav class="navbar navbar-inverse top-bar navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> <span class="menu-icon" id="menu-icon"><i class="fa fa-times" aria-hidden="true" id="chang-menu-icon"></i></span>
      </div>
      <div class="collapse navbar-collapse navbar-right" id="myNavbar">
      <ul class="nav navbar-nav">
         
          <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="{{ route('admin.logout') }}">Logout          
           <span class="caret"></span></a>
            <!-- <ul class="dropdown-menu">
              <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
              <li> <a href="#"><i class="fa fa-cog"></i> Setting</a> </li>
              <li> <a href="#"><i class="fa fa-power-off"></i> Logout</a> </li>
            </ul> -->
          </li>
        </ul>
        
      </div>
    </div>
  </nav>