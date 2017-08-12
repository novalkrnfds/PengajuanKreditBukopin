<?php 
    if(isset($_POST['save'])){

        //melakukan cek, apakah insert atau edit
        $id = $_POST['idmarketing'];
        if($id == ""){
            $save = mysql_query("insert into tb_marketing values ('', '$_POST[nama_marketing]', '$_POST[alamat]', '$_POST[kontak_marketing]')");
            $getId = mysql_insert_id();

            $password = md5($_POST['email']."bukopin".$_POST['password']);
            $savelogin = mysql_query("insert into user_login values ('', '$_POST[nama_marketing]', '$_POST[email]', '$password', 2, '', $getId)");

            //kondisi apakah save berhasil
            if($save && $savelogin){
            echo "<script type='text/javascript'> setTimeout(function () { swal({ title: 'Simpan data marketing berhasil', text:  'Mohon tunggu', type: 'success', timer: 3000, showConfirmButton: false }); },10); </script>";
            } else {
            echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'Simpan data marketing gagal', type: 'error', confirmButtonText: 'Ok' }); </script>";
            }
            
        } else {
            $update = mysql_query("update tb_marketing set nama = '$_POST[nama_marketing]', kontak = '$_POST[kontak_marketing]', alamat = '$_POST[alamat]' where id_marketing = '$_POST[idmarketing]'");

            $password = md5($_POST['email']."bukopin".$_POST['password']);
            $updatelogin = mysql_query("update user_login set email = '$_POST[email]', password = '$password' where id_marketing = '$_POST[idmarketing]'");

            //kondisi apakah update berhasil
            if($update && $updatelogin){
            echo "<script type='text/javascript'> setTimeout(function () { swal({ title: 'Update data marketing berhasil', text:  'Mohon tunggu', type: 'success', timer: 3000, showConfirmButton: false }); },10); </script>";
            } else {
            echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'Update data marketing gagal', type: 'error', confirmButtonText: 'Ok' }); </script>";
            }
        }
    } else {
        unset($_POST['save']);
    }

    if(isset($_POST['delete'])){
        $delete = mysql_query("delete from tb_marketing where id_marketing = '$_POST[id_marketing]'");
        $deletelogin = mysql_query("delete from user_login where id_marketing = '$_POST[id_marketing]'");

        if($delete && $deletelogin){
            echo "<script type='text/javascript'> setTimeout(function () { swal({ title: 'Delete berhasil', text:  'Mohon tunggu', type: 'success', timer: 3000, showConfirmButton: false }); },10); </script>";
        } else {
            echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'Delete gagal', type: 'error', confirmButtonText: 'Ok' }); </script>";
        }
    } else {
        unset($_POST['delete']);
    }

?>

<section id="content">

    <div class="page page-dashboard">

        <div class="pageheader">

            <h2>Manage Marketing</h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> e-Submission Bank Bukopin</a>
                    </li>
                    <li class="active">
                        <a style="cursor:pointer;">Manage Marketing</a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- cards row -->

        <div class="row">

            <!-- col -->
            <div class="col-md-12">

                <!-- tile -->
                <section class="tile">

                    <!-- tile header -->
                    <div class="tile-header dvd dvd-btm">
                        <h1 class="custom-font"><strong>List </strong>Marketing</h1>
                        <ul class="controls">

                            <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus mr-5"></i> Add Marketing</a></li>

                        </ul>
                    </div>
                    <!-- /tile header -->

                    <!-- tile body -->
                    <div class="tile-body">
                      <div class="table-responsive">
                          <table class="table table-custom" id="editable-usage">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>Alamat</th>
                                      <th>Kontak</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                    $no = 0;
                                    $select = mysql_query("SELECT * FROM tb_marketing as a INNER JOIN user_login as b ON a.id_marketing = b.id_marketing");
                                    while($data = mysql_fetch_array($select)){
                                    $no++;
                                ?>
                                <tr class="odd gradeX">
                                    <td><?=$no;?></td>
                                    <td><?=$data['nama']?></td>
                                    <td><?=$data['alamat']?></td>
                                    <td><?=$data['kontak']?></td>
                                    <td class="actions">
                                        <a href="#" data-id="<?=$data['id_marketing']?>" data-name="<?=$data['nama']?>" data-alamat="<?=$data['alamat']?>" data-kontak="<?=$data['kontak']?>" data-email="<?=$data['email']?>" data-toggle="modal" data-target="#myModal" class="modal-marketing text-success text-uppercase text-strong text-sm mr-10" >Edit</a>
                                        <a href="#" data-id="<?=$data['id_marketing']?>" data-toggle="modal" data-target="#splash" data-options="splash-1 splash-ef-1" class="delete-marketing text-danger text-uppercase text-strong text-sm mr-10" >Hapus</a>
                                    </td>
                                </tr>
                                <?php } ?>
                              </tbody>
                          </table>
                      </div>


                    </div>
                    <!-- /tile body -->

                </section>
                <!-- /tile -->

            </div>
        </div>





    </div>


</section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <form enctype="multipart/form-data" method="POST">
                <div class="modal-header">
                    <h3 class="modal-title custom-font">Manage Marketing</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group" style="padding-bottom: 10px;">
                            
                            <input type="hidden" name="idmarketing" id="idmarketing">

                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Nama Marketing" id="namamarketing" name="nama_marketing" required>
                        </div>
                        <div class="form-group" style="padding-bottom: 10px;">

                            <label>Kontak</label>
                            <input type="text" class="form-control" placeholder="Kontak Marketing" id="kontakmarketing" name="kontak_marketing" required>
                        </div>
                        <div class="form-group" style="padding-bottom: 10px;">
                            <label>Alamat</label>
                            <textarea class="form-control" style="resize:none;" name="alamat" rows="2" id="alamatmarketing" placeholder="Alamat" required></textarea>
                        </div>
                        <div class="form-group" style="padding-bottom: 10px;">

                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email Marketing" id="email" name="email" required>
                        </div>
                        <div class="form-group" style="padding-bottom: 10px;">

                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Save</button>
                    <button type="reset" class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Splash Modal -->
<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Delete Data</h3>
            </div>
            <form enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    <p align="center">Are you sure to delete this data?</p>

                    <p align="center">Data yang dihapus tidak akan bisa dikembalikan lagi.</p>
                    <input type="hidden" id="id_marketing" name="id_marketing">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="delete" class="btn btn-default btn-border">Delete</button>
                    <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
