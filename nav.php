<div id="sidebar-wrap">

    <div class="panel-group slim-scroll" role="tablist">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#sidebarNav">
                        Navigation <i class="fa fa-angle-up"></i>
                    </a>
                </h4>
            </div>
            <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                <div class="panel-body">


                    <!-- ===================================================
                    ================= NAVIGATION Content ===================
                    ==================================================== -->
                    <ul id="navigation">
                        <?php if($_SESSION['level'] == 1){ ?>
                          <li class="<?php if($_GET["menu"] == ""){ echo "active";}?>"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
                        <?php } else if($_SESSION['level'] == 2){ ?>
                          <li class="<?php if($_GET["menu"] == ""){ echo "active";}?>"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
                        <?php } else if($_SESSION['level'] == 3){ ?>
                        <li class="<?php if(($_GET['id'])){ echo "active";}?>"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
                        <li class="<?php if($_GET['menu'] == "apply_credit"){ echo "active";}?>"><a href="?menu=apply_credit&data=1"><i class="fa fa-gears"></i> <span>Apply Credit</span> </a></li>
                        <li class="<?php if($_GET['menu'] == "setting"){ echo "active";}?>"><a href="?menu=setting"><i class="fa fa-briefcase"></i> <span>Setting</span> </a></li>
                        <?php } ?>
                    </ul>
                    <!--/ NAVIGATION Content -->


                </div>
            </div>
        </div>


    </div>

</div>
