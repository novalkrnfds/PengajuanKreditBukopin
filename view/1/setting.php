<?php 
    $idnasabah = $_SESSION['id_nasabah'];
    
    $select = mysql_query("select id,email,password from user_login where id_nasabah = '$idnasabah'");
    $data = mysql_fetch_array($select);

    if(isset($_POST['changePass'])){
        $id = $data['id'];
        $passLama = md5($data['email'].'bukopin'.$_POST['passlama']);
        $passBaru = md5($data['email'].'bukopin'.$_POST['passbaru']);

        if($passLama == $data['password']){
            $update = mysql_query("update user_login set password = '$passBaru' where id = '$id'");

            if($update){
                echo "<script type='text/javascript'> setTimeout(function () { swal({ title: 'Change password berhasil', text:  'Mohon tunggu', type: 'success', timer: 3000, showConfirmButton: false }); },10); window.setTimeout(function(){
                    window.location.replace('index.php?menu=setting'); } ,2000); </script>";
            } else {
                echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'Change password gagal, silakan cek data anda', type: 'error', confirmButtonText: 'Ok' }); </script>";
            }
        } else {
            echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'Change password gagal, password lama anda yang anda masukan salah', type: 'error', confirmButtonText: 'Ok' }); </script>";
        }
    } else {
        unset($_POST['changePass']);
    }
?>

<section id="content">

    <div class="page page-dashboard">

        <div class="pageheader">

            <h2>Setting Password</h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> e-Submission Bank Bukopin</a>
                    </li>
                    <li class="active">
                        <a style="cursor:pointer;">Setting Password</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="row">
          <div class="col-md-6">

              <!-- tile -->
              <section class="tile">

                  <!-- tile header -->
                  <div class="tile-header dvd dvd-btm">
                      <h1 class="custom-font"><strong>Setting </strong>Password</h1>
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body">

                      <form method="post" enctype="multipart/form-data" role="form">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Password Lama</label>
                              <input type="password" class="form-control" id="exampleInputEmail1" name="passlama" placeholder="Password Lama">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword1">Password Baru</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="passbaru" placeholder="Password Baru">
                          </div>
                          <input type="submit" class="btn btn-rounded btn-success btn-sm" name="changePass" value="Change Password">
                      </form>

                  </div>
                  <!-- /tile body -->

              </section>
              <!-- /tile -->

          </div>
        <!-- /col -->


      </div>
    </div>
    <!-- /row -->
</section>
