<?php
  if(@$_SESSION['level'] == '1'){

  } else if(@$_SESSION['level'] == '2'){

  } else if(@$_SESSION['level'] == '3'){ ?>
    <ul class="nav nav-sidebar">
      <li class="<?php if(($_GET['menu'] == "") || $_GET['menu'] == "apply_credit") {echo "nav-active active"; }?>"><a href="index.php"><i class="icon-home"></i><span>Home</span></a></li>
        <li class="<?php if($_GET['menu'] == "setting") {echo "nav-active active"; }?>"><a href="?menu=setting"><i class="fa fa-gear"></i><span>Setting</span></a></li>
    </ul>

<?php
  }
?>
