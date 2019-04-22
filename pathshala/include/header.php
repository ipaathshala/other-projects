<header class="main-header">
  <a href="#" class="logo">
    <span class="logo-mini"><b>A</b>LT</span>
    <span class="logo-lg"><b>Admin</b>LTE</span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
          <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <p><?php echo $_SESSION['username'];?></p>
            </li>
            <li class="user-footer">
              <div class="pull-right">
                <a href="logout" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>