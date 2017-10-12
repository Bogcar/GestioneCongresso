<?php

if (!isset($_SESSION['userid'])) {
        header('Location: http://fsy.samtinfo.ch/error.php?error=500');
        exit();
}

?>

<!--top bar start-->
<div class="top-bar primary-top-bar card card-1">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-6">
        <a href="http://fsy.samtinfo.ch" class="admin-logo ">
          <h1><img src="http://fsy.samtinfo.ch/assets/images/logo.png" alt=""></h1>
        </a>
        <div class="left-nav-toggle visible-xs visible-sm">
          <a href="#">
            <i class="glyphicon glyphicon-menu-hamburger"></i>
          </a>
        </div><!--end nav toggle icon-->
        <!--start search form-->
		<!--
        <div class="search-form hidden-xs">
          <form>
            <input type="text" class="form-control" placeholder="Search for...">
            <button type="button" class="btn-search"><i class="fa fa-search"></i></button>
          </form>
        </div>
	-->
        <!--end search form-->
      </div>
      <div class="col-xs-6">
        <ul class="list-inline top-right-nav">
          <li class="dropdown hidden-xs icon-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <i class="fa fa-globe"></i>
            </a>
            <ul class="dropdown-menu top-dropdown lg-dropdown notification-dropdown">
              <li>
                <div class="scrollDiv">
                  <div class="notification-list">
                    <a href="?lang=it" class="clearfix">
                      <span class="notification-title">Italiano</span>
                    </a>
                    <a href="?lang=en" class="clearfix">
                      <span class="notification-title">English</span>
                    </a>
                  </div>
                </div>
              </li>
            </ul>
          </li>
          <li class="dropdown avtar-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i>
            </a>
            <ul class="dropdown-menu top-dropdown">
              <li><a href="javascript: void(0);"><i class="icon-bell"></i> Activities</a></li>
              <li><a href="javascript: void(0);"><i class="icon-user"></i> Profile</a></li>
              <li><a href="javascript: void(0);"><i class="icon-settings"></i> Settings</a></li>
              <li class="divider"></li>
              <li><a href="/logout.php"><i class="icon-logout"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- top bar end-->
