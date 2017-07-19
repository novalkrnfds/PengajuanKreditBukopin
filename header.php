
<div class="topbar">
  <div class="header-left">
    <div class="topnav">
      <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
    </div>
  </div>
  <div class="header-right">
    <ul class="header-menu nav navbar-nav">
      <li class="dropdown" id="user-header">
        <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <img src="assets/global/images/avatars/user1.png" alt="user image">
        <span class="username"><?=$_SESSION['name'];?></span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="logout.php" id="logout" onclick="return confirm('Apakah anda yakin untuk keluar?')"><i class="icon-logout"></i><span>Logout</span></a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
  <!-- header-right -->
</div>
