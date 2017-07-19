<?php
	session_start();

	if (empty($_SESSION['name']) AND empty($_SESSION['password'])){
		header("location:login.php");
	} else {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/global/images/favicon.png" type="image/png">
    <title>e-SUBMISSION BANK BUKOPIN</title>
    <link href="assets/global/css/style.css" rel="stylesheet">
    <link href="assets/global/css/theme.css" rel="stylesheet">
    <link href="assets/global/css/ui.css" rel="stylesheet">
    <link href="assets/admin/layout1/css/layout.css" rel="stylesheet">
    <!-- BEGIN PAGE STYLE -->
    <link href="assets/global/plugins/metrojs/metrojs.min.css" rel="stylesheet">
    <link href="assets/global/plugins/maps-amcharts/ammap/ammap.min.css" rel="stylesheet">
    <link href="assets/global/plugins/step-form-wizard/css/step-form-wizard.min.css" rel="stylesheet">
    <script src="assets/global/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END PAGE STYLE -->
    <script src="assets/global/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body class="fixed-topbar fixed-sidebar theme-sdtl color-default dashboard">
    <section>
      <div class="sidebar">
        <div class="logopanel"><h1>e-Submission</h1>
          <h1>
            <a href="?menu=home"></a>
          </h1>
        </div>
        <div class="sidebar-inner">
          <div class="sidebar-top">
            <div class="userlogged clearfix">
              <i class="icon icons-faces-users-01"></i>
              <div class="user-details">
                <h4><?=$_SESSION['name'];?></h4>
                <div class="dropdown user-login">
                  <button class="btn btn-xs dropdown-toggle btn-rounded" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300">
                  <i class="online"></i><span>Available</span><i class="fa fa-angle-down"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#"><i class="busy"></i><span>Busy</span></a></li>
                    <li><a  href="#"><i class="turquoise"></i><span>Invisible</span></a></li>
                    <li><a href="#"><i class="away"></i><span>Away</span></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="menu-title">Navigation</div>

          <?php include "nav.php"; ?>

          <div class="sidebar-footer clearfix">
            <a class="pull-left footer-settings" href="#" data-rel="tooltip" data-placement="top" data-original-title="Settings">
            <i class="icon-settings"></i></a>
            <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen">
            <i class="icon-size-fullscreen"></i></a>
            <a class="pull-left" href="#" data-rel="tooltip" data-placement="top" data-original-title="Lockscreen">
            <i class="icon-lock"></i></a>
            <a class="pull-left btn-effect" href="logout.php" id="logout" onclick="return confirm('Apakah anda yakin untuk keluar?')" data-modal="modal-1" data-rel="tooltip" data-placement="top" data-original-title="Logout">
            <i class="icon-power"></i></a>
          </div>
        </div>
      </div>

      <!-- END SIDEBAR -->
      <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <?php include "header.php";?>
        <!-- END TOPBAR -->
        <?php include "content.php"; ?>
      </div>
      <!-- END MAIN CONTENT -->
      <!-- BEGIN BUILDER -->
      <?php include "setting.php";?>
      <!-- END BUILDER -->
    </section>
    <div class="loader-overlay">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <!-- END PRELOADER -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>
    <script src="assets/global/plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="assets/global/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/global/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
    <script src="assets/global/plugins/gsap/main-gsap.min.js"></script>
    <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/global/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
    <script src="assets/global/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
    <script src="assets/global/plugins/bootbox/bootbox.min.js"></script> <!-- Modal with Validation -->
    <script src="assets/global/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
    <script src="assets/global/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
    <script src="assets/global/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->
    <script src="assets/global/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
    <script src="assets/global/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->
    <script src="assets/global/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
    <script src="assets/global/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
    <script src="assets/global/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
    <script src="assets/global/js/builder.js"></script> <!-- Theme Builder -->
    <script src="assets/global/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
    <script src="assets/global/js/application.js"></script> <!-- Main Application Script -->
    <script src="assets/global/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="assets/global/js/widgets/notes.js"></script> <!-- Notes Widget -->
    <script src="assets/global/js/quickview.js"></script> <!-- Chat Script -->
    <script src="assets/global/js/pages/search.js"></script> <!-- Search Script -->
		<script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> <!-- >Bootstrap Date Picker -->
  	<script src="assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <!-- BEGIN PAGE SCRIPT -->
    <!-- END PAGE SCRIPT -->
    <script src="assets/global/plugins/step-form-wizard/plugins/parsley/parsley.min.js"></script> <!-- OPTIONAL, IF YOU NEED VALIDATION -->
    <script src="assets/global/plugins/step-form-wizard/js/step-form-wizard.js"></script> <!-- Step Form Validation -->
    <script src="assets/admin/layout1/js/layout.js"></script>
    <script src="assets/global/js/pages/form_wizard.js"></script>
  </body>
</html>

<?php
	}
?>
