<?php
  $idnasabah = $_SESSION['id_nasabah'];

  $select = mysql_query("SELECT * FROM tb_kredit as a
                         INNER JOIN tb_nasabah as b ON a.id_nasabah = b.id_nasabah INNER JOIN tb_status_validasi as c
                         ON a.id_marketing = c.id_marketing WHERE b.id_nasabah = '$idnasabah' order by c.datetime desc");
  $data = mysql_fetch_array($select);
  $count = mysql_num_rows($select);
?>

<section id="content">

    <div class="page page-dashboard">

        <div class="pageheader">

            <h2>Beranda</h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> e-Submission Bank Bukopin</a>
                    </li>
                    <li class="active">
                        <a style="cursor:pointer;">Beranda</a>
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
                        <h1 class="custom-font"><strong>Status </strong>Pengajuan Kredit</h1>
                    </div>
                    <!-- /tile header -->

                    <!-- tile body -->
                    <div class="tile-body">
                      <?php if($data['id_kredit'] == null){ ?>
                      <div class="alert alert-big alert-success alert-dismissable fade in">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h4><strong>Selamat datang!</strong> <em><?=$_SESSION['name']?></em></h4>
                          <p style="text-align:justify;">
                              Selamat datang di website e-Submission Credit BANK BUKOPIN. Klik tombol dibawah jika anda ingin mengajukan kredit.
                              Perlu di ingat, setelah anda mengajukan kredit anda tidak bisa mengubah data Anda. Anda akan bisa mengubah saat
                              ajuan kredit anda di tolak. Mohon isi data diri Anda dengan benar.
                          </p>
                          <p>
                              <a href="?menu=apply_credit&data=1" class="btn btn-success">Apply Credit</a>
                          </p>
                      </div>
                      <?php } ?>
                      <br>
                      <div class="table-responsive">
                          <table class="table table-custom" id="editable-usage">
                              <thead>
                                  <tr>
                                      <th>Nama</th>
                                      <th>Permohonan Kredit</th>
                                      <th>jangka Waktu</th>
                                      <th>Status Terakhir</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php if($count > 0){?>
                                <tr class="odd gradeX">
                                    <td><?=$data['nama']?></td>
                                    <td>Rp. <?=number_format($data['permohonan'], 0, ',', '.')?></td>
                                    <td><?=$data['jangka_waktu']?></td>
                                    <td><?=$data['status']?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#myModal" class="text-success text-uppercase text-strong text-sm mr-10" >Detail</a>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <!-- col -->
                    <div class="col-md-12">


                        <!-- tile -->
                        <section class="tile tile-simple">


                            <!-- tile body -->
                            <div class="tile-body">


                                <!-- row -->
                                <div class="row">

                                    <!-- col -->
                                    <div class="col-md-10">
                                        <h3 class="mb-0 text-custom text-strong"><?=$data['nama']?></h3>
                                        <p class="text-default lt"><?=$data['no_identitas']?></p>
                                    </div>
                                    <!-- /col -->

                                    <!-- col -->
                                    <div class="col-md-2">
                                        <img src="assets/images/small-logo.jpg" alt="" class="thumb thumb-xl m-10 mb-20">
                                    </div>
                                    <!-- /col -->

                                </div>
                                <!-- /row -->

                                <!-- row -->
                                <div class="row b-t pt-20">

                                    <!-- col -->
                                    <div class="col-md-4 b-r">
                                        <p class="text-uppercase text-strong mb-10 custom-font">
                                            Pengajuan Kredit
                                        </p>

                                        <ul class="list-unstyled text-default lt mb-20">
                                            <li>Rp. <?=number_format($data['permohonan'], 0, ',', '.')?></li>
                                        </ul>

                                    </div>
                                    <!-- /col -->

                                    <!-- col -->
                                    <div class="col-md-4 b-r">
                                        <p class="text-uppercase text-strong mb-10 custom-font">
                                            Jangka Waktu
                                        </p>
                                        <ul class="list-unstyled text-default lt mb-20">
                                            <li><?=$data['jangka_waktu']?></li>
                                        </ul>
                                    </div>
                                    <!-- /col -->

                                    <!-- col -->
                                    <div class="col-md-4">
                                        <p class="text-uppercase text-strong mb-10 custom-font">Status Saat Ini</p>
                                        <ul class="list-unstyled text-default lt mb-20">
                                            <li><?=$data['status']?></li>

                                        </ul>
                                    </div>
                                    <!-- /col -->

                                </div>
                                <!-- /row -->


                            </div>
                            <!-- /tile body -->

                        </section>
                        <!-- /tile -->


                        <!-- tile -->
                        <section class="tile tile-simple">

                            <!-- tile body -->
                            <div class="tile-body p-0">

                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th colspan="2" style="background-color:#f5f5f5">History Review</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $sql = mysql_query("SELECT c.status, c.datetime FROM tb_kredit as a
                                                                INNER JOIN tb_nasabah as b ON a.id_nasabah = b.id_nasabah INNER JOIN tb_status_validasi as c
                                                                ON a.id_marketing = c.id_marketing WHERE b.id_nasabah = '$idnasabah' order by c.datetime");
                                            while($r = mysql_fetch_array($sql)){
                                        ?>
                                            <tr>
                                                <td style="width:30%"><?=date("d-m-Y H:i", strtotime($r['datetime']))?></td>
                                                <td><?=$r['status']?></td>
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
                    <!-- /col -->
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Close</button>
            </div>
        </div>
    </div>
</div>