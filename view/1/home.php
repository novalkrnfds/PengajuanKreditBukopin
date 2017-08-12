<?php
  $idnasabah = $_SESSION['id_nasabah'];

  $select = mysql_query("SELECT a.id_kredit, a.id_nasabah, a.permohonan, a.jangka_waktu, b.nama, c.status FROM tb_kredit as a
                         INNER JOIN tb_nasabah as b ON a.id_nasabah = b.id_nasabah INNER JOIN tb_status_validasi as c
                         ON a.id_marketing = c.id_marketing WHERE b.id_nasabah = '$idnasabah'");
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
                        <h1 class="custom-font"><strong>Status </strong>Pengajuan</h1>
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
                                      <th>Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php if($count > 0){?>
                                <tr class="odd gradeX">
                                    <td><?=$data['nama']?></td>
                                    <td><?=$data['permohonan']?></td>
                                    <td><?=$data['jangka_waktu']?></td>
                                    <td><?=$data['status']?></td>
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
