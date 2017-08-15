<?php
    $status = array('0' => "Menunggu Verifikasi",
                    '1' => "Sedang di proses verifikasi",
                    '2' => "Telah diverifikasi, dan dalam pengecekan dokumen",
                    '3' => "Sedang dalam tahap survey rumah",
                    '4' => "Approved",
                    '5' => "Rejected"
              );

    $select = mysql_query("SELECT a.id_kredit, max(a.status) as status, b., c.
    FROM tb_status_validasi a INNER JOIN tb_kredit b ON a.id_kredit = b.id_kredit INNER JOIN tb_nasabah c ON b.id_nasabah = c.id_nasabah GROUP BY a.id_kredit");
    $count = mysql_num_rows($select);

    if(isset($_POST['save'])){
        $save = mysql_query("insert into tb_status_validasi values ('','$_POST[id_kredit]', '$_SESSION[id_marketing]', '$_POST[status]', '$_POST[keterangan]', now())");

        if($save){
            echo "<script type='text/javascript'> setTimeout(function () { swal({ title: 'Update status berhasil', text:  'Mohon tunggu', type: 'success', timer: 3000, showConfirmButton: false }); },10); window.setTimeout(function(){
                    window.location.replace('index.php'); } ,2000); </script>";
        } else {
            echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'Update status gagal', type: 'error', confirmButtonText: 'Ok' }); </script>";
        }
    } else {
        unset($_POST['save']);
    }
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
                        <h1 class="custom-font"><strong>List </strong>Pengajuan</h1>
                    </div>
                    <!-- /tile header -->

                    <!-- tile body -->
                    <div class="tile-body">
                      <div class="table-responsive">
                          <table class="table table-custom" id="editable-usage">
                              <thead>
                                  <tr>
                                      <th>No.</th>
                                      <th>Nama</th>
                                      <th>Permohonan Kredit</th>
                                      <th>Jangka Waktu</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                               <tbody>
                                <?php 
                                $no = 0;
                                while($data = mysql_fetch_array($select)){
								$no++;?>
                                <tr class="odd gradeX">
                                    <td><?=$no;?></td>
                                    <td><?=$data['nama']?></td>
                                    <td>Rp. <?=number_format($data['permohonan'], 0, ',', '.')?></td>
                                    <td><?=$data['jangka_waktu']?></td>
                                    <td><?php echo $status[$data['status']]?></td>
                                    <td class="actions">
                                        <a href="?menu=view_detail&id=<?=$data['id_nasabah']?>" class="text-success text-uppercase text-strong text-sm mr-10" >Lihat</a>
                                        <a href="#" data-name="<?=$data['nama']?>" data-id="<?=$data['id_kredit']?>" data-toggle="modal" data-target="#myModal" class="open-modal text-danger text-uppercase text-strong text-sm mr-10" >Update</a>
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
            
            <form action="index.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="modal-header">
                    <h3 class="modal-title custom-font">Update Status Pengajuan Kredit</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group" style="padding-bottom: 10px;">
                            
                            <input type="hidden" name="id_kredit" id="idkredit">

                            <label>Status Pengajuan Kredit</label>
                            <select name="status" class="form-control" placeholder="Status Validasi" required/>
                                <option value="">--- Pilih ---</option>
                                <option value="1">Sedang di proses verifikasi</option>
                                <option value="2">Telah diverifikasi, dan dalam pengecekan dokumen</option>
                                <option value="3">Sedang dalam tahap survey rumah</option>
                                <option value="4">Approved</option>
                                <option value="5">Rejected</option>
                            </select>
                        </div>
                        <div class="form-group" style="padding-bottom: 10px;">
                            <label>Keterangan</label>
                            <textarea class="form-control" style="resize:none;" name="keterangan" rows="3" placeholder="Keterangan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Save</button>
                    <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>