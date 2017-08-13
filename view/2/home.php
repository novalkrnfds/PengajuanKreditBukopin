<?php
    $select = mysql_query("SELECT a.id_kredit, a.id_nasabah, a.permohonan, a.jangka_waktu, b.nama, c.status FROM tb_kredit as a
                         INNER JOIN tb_nasabah as b ON a.id_nasabah = b.id_nasabah INNER JOIN tb_status_validasi as c
                         ON a.id_marketing = c.id_marketing GROUP by a.id_kredit ORDER by c.datetime DESC");
    $count = mysql_num_rows($select);

    if(isset($_POST['save'])){
        $save = mysql_query("insert into tb_status_validasi values ('','$_POST[id_kredit]', '$_SESSION[id_marketing]', '$_POST[status]', '$_POST[keterangan]', 'now()')");

        if($save){

        } else {
            
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
                                    <td><?php if($data['status'] != "Approved"){ echo "On process"; } else { echo "Approveds";}?></td>
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
                            
                            <input type="text" name="id_kredit" id="idkredit">

                            <label>Status Pengajuan Kredit</label>
                            <select name="status" class="form-control" placeholder="Status Validasi" required/>
                                <option value="">--- Pilih ---</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Janda/Duda">Janda/Duda</option>
                            </select>
                        </div>
                        <div class="form-group" style="padding-bottom: 10px;">
                            <label>Keterangan</label>
                            <textarea class="form-control" style="resize:none;" name="keterangan" rows="3" placeholder="Keterangan" required></textarea>
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