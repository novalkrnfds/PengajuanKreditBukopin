<?php
    $status = array('0' => "Menunggu Verifikasi",
                        '1' => "Sedang di proses verifikasi",
                        '2' => "Telah diverifikasi, dan dalam pengecekan dokumen",
                        '3' => "Sedang dalam tahap survey rumah",
                        '4' => "Approved",
                        '5' => "Rejected"
                );

    $select = mysql_query("SELECT a.id_kredit, max(a.datetime) as datetime, MAX(a.status) AS status, b.*, c.*
        FROM tb_status_validasi a INNER JOIN tb_kredit b ON a.id_kredit = b.id_kredit INNER JOIN tb_nasabah c ON b.id_nasabah = c.id_nasabah WHERE status = 4");
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
                      <div class="table-responsive">
                          <table class="table table-custom" id="editable-usage">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>Permohonan Kredit</th>
                                      <th>jangka Waktu</th>
                                      <th>Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $no = 0;
                                while($r = mysql_fetch_array($select)){
                                $no++; ?>
                                <tr class="odd gradeX">
                                    <td><?=$no;?></td>
                                    <td><?=$r['nama']?></td>
                                    <td>Rp. <?=number_format($r['permohonan'], 0, ',', '.')?></td>
                                    <td><?=$r['jangka_waktu']?></td>
                                    <td><?=$status[$r['status']]?></td>
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
