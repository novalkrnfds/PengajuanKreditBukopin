<?php
  $idnasabah = $_SESSION['id_nasabah'];

  $sql  = mysql_query("select * from tb_nasabah where id_nasabah = '$idnasabah'");
  $data = mysql_fetch_array( $sql);

  if(isset($_POST['savebiodata'])){
    $tgl = date("Y-m-d", strtotime($_POST['tgl_lahir']));

    $savebiodata = mysql_query("update tb_nasabah set nama = '$_POST[nama]', tmp_lahir = '$_POST[tmp_lahir]', tgl_lahir = '$tgl',
                    agama = '$_POST[agama]', no_identitas = '$_POST[no_identitas]', no_npwp = '$_POST[no_npwp]', alamat = '$_POST[alamat]', lama_menetap = '$_POST[lama_menetap]',
                    no_telprumah = '$_POST[no_telp]', no_hp = '$_POST[hp]', status_perkawinan = '$_POST[status_perkawinan]', pendidikan = '$_POST[pendidikan]',
                    nama_ibukandung = '$_POST[nama_ibukandung]', jml_tanggungan = '$_POST[jml_tanggungan]', alamat_korespondensi = '$_POST[alamat_korespondensi]',
                    kepemilikan_rumah = '$_POST[kepemilikan_rumah]' where id_nasabah = '$idnasabah'");

    if($savebiodata){
      echo "<script type='text/javascript'> setTimeout(function () { swal({ title: 'Simpan biodata diri berhasil', text:  'Mohon tunggu', type: 'success', timer: 3000, showConfirmButton: false }); },10); window.setTimeout(function(){
            window.location.replace('index.php?menu=apply_credit&data=2'); } ,2000); </script>";
    } else {
      echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'Simpan biodata diri gagal', type: 'error', confirmButtonText: 'Ok' }); </script>";
    }
  } else {
    unset($_POST['savebiodata']);
  }

  if(isset($_POST['savepekerjaan'])){
    $savepekerjaan = mysql_query("insert into tb_pekerjaan values('', $idnasabah, '$_POST[nama_perusahaan]', '$_POST[alamat_perusahaan]', '$_POST[telp_perusahaan]', '$_POST[fax_perusahaan]',
                      '$_POST[jenis_usaha]', '$_POST[bidang_pekerjaan]', '$_POST[jabatan]', '$_POST[status]', '$_POST[masa_kerja]', '$_POST[nm_atasan]', '$_POST[telp_atasan]', '$_POST[nm_kep_personalia]',
                      '$_POST[telp_personalia]', '$_POST[nm_company_before]', '$_POST[masa_kerja_before]')");

    if($savepekerjaan){
      echo "<script type='text/javascript'> setTimeout(function () { swal({ title: 'Simpan data pekerjaan berhasil', text:  'Mohon tunggu', type: 'success', timer: 3000, showConfirmButton: false }); },10); window.setTimeout(function(){
            window.location.replace('index.php?menu=apply_credit&data=3'); } ,2000); </script>";
    } else {
      echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'Simpan data pekerjaan gagal', type: 'error', confirmButtonText: 'Ok' }); </script>";
    }
  } else {
    unset($_POST['savepekerjaan']);
  }

  if(isset($_POST['savepenghasilan'])){
    $savepenghasilan = mysql_query("insert into tb_penghasilan values ('', $idnasabah, '$_POST[pendapatan_pokok]', '$_POST[tunjangan]', '$_POST[penghasilan]', '$_POST[total_penghasilan]',
                        '$_POST[biaya_rutin]', '$_POST[angsuran_lain]', '$_POST[biaya_lain]', '$_POST[total_pengeluaran]', 0)");
    if($savepenghasilan){
      echo "<script type='text/javascript'> setTimeout(function () { swal({ title: 'Simpan data penghasilan berhasil', text:  'Mohon tunggu', type: 'success', timer: 3000, showConfirmButton: false }); },10); window.setTimeout(function(){
            window.location.replace('index.php?menu=apply_credit&data=4'); } ,2000); </script>";
    } else {
      echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'Simpan data penghasilan gagal', type: 'error', confirmButtonText: 'Ok' }); </script>";
    }
  } else {
    unset($_POST['savepenghasilan']);
  }
?>

<section id="content">

    <div class="page page-dashboard">

        <div class="pageheader">

            <h2>Apply Credit</h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> e-Submission Bank Bukopin</a>
                    </li>
                    <li class="active">
                        <a style="cursor:pointer;">Apply Credit</a>
                    </li>
                </ul>
            </div>

        </div>


        <div class="pagecontent">
            <section class="tile">

              <!-- tile header -->
              <div class="tile-header dvd dvd-btm">
                  <h1 class="custom-font"><strong>Apply</strong> Credit</h1>
              </div>
              <!-- /tile header -->

              <!-- tile body -->
              <div class="tile-body tab-container tab-wizard">

                  <ul class="nav nav-tabs nav-justified">
                    <li class="<?php if($_GET['data'] == 1){ echo "active";}?>"><a href="#">Biodata Diri <span class="badge badge-default pull-right wizard-step">1</span></a></li>
                    <li class="<?php if($_GET['data'] == 2){ echo "active";}?>"><a href="#">Detail Pekerjaan<span class="badge badge-default pull-right wizard-step">2</span></a></li>
                    <li class="<?php if($_GET['data'] == 3){ echo "active";}?>"><a href="#">Detail Penghasilan<span class="badge badge-default pull-right wizard-step">3</span></a></li>
                    <li class="<?php if($_GET['data'] == 4){ echo "active";}?>"><a href="#" data-toggle="tab">Submit Kredit<span class="badge badge-default pull-right wizard-step">4</span></a></li>
                  </ul>
                  <br>
                  <br>
                  <?php if($_GET['data'] == 1){ ?>

                  <form method="post" enctype="multipart/form-data">
                    <div class="tab-content">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Nama Lengkap : </label>
                                <input type="text" name="nama" id="name" value="<?=$data['nama']?>" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                               <label for="username">Agama: </label><br>
                               <select class="chosen-select" style="width:500px" name="agama" >
                                   <option value="">--- Pilih ---</option>
                                   <option value="Islam">Islam</option>
                                   <option value="Khatolik">Khatolik</option>
                                   <option value="Protestan">Protestan</option>
                                   <option value="Hindu">Hindu</option>
                                   <option value="Budha">Hindu</option>
                                   <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">Tempat Lahir: </label>
                                <input type="text" name="tmp_lahir" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Tanggal Lahir: </label>
                                <input type="text" name="tgl_lahir" class="form-control datepicker" data-format="L" >
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">No. Identitas: </label>
                                <input type="text" name="no_identitas" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">No. NPWP : </label>
                                <input type="text" name="no_npwp" class="form-control" >
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="message">Alamat saat ini: </label>
                            <textarea class="form-control" rows="4" name="alamat" id="message" ></textarea>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">No. Telepon: </label>
                                <input type="text" name="no_telp" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Handphone : </label>
                                <input type="text" name="hp" class="form-control" >
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Status : </label>
                                <br>
                                <select class="chosen-select" style="width:500px" name="status_perkawinan" >
                                    <option value="">--- Pilih ---</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Janda/Duda">Janda/Duda</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">Pendidikan Terakhir: </label>
                                <br>
                                <select class="chosen-select" style="width:500px" name="pendidikan" >
                                   <option value="">--- Pilih ---</option>
                                   <option value="SD">SD</option>
                                   <option value="SLTP">SLTP</option>
                                   <option value="SLTA">SLTA</option>
                                   <option value="S1">S1</option>
                                   <option value="S2">S2</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Nama Ibu Kandung : </label>
                                <input type="text" name="nama_ibukandung" id="name" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">Jumlah Tanggungan : </label>
                                <input type="text" name="jml_tanggungan" id="username" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Alamat korespodensi: </label>
                            <textarea class="form-control" rows="4" name="alamat_korespondensi" id="message" ></textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Kepemilikan Rumah : </label>
                                <br>
                                <select class="chosen-select" style="width:500px" name="kepemilikan_rumah" >
                                  <option value="">--- Pilih ---</option>
                                  <option value="Sendiri">Sendiri</option>
                                  <option value="Sewa/Kontrak">Sewa/Kontrak</option>
                                  <option value="Orang tua">Orang tua</option>
                                  <option value="Dinas">Dinas</option>
                                  <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">Lama Menetap: </label>
                                <input type="text" class="form-control" name="lama_menetap" >
                            </div>
                        </div>
                    </div>

                    <ul class="pager">
                        <li>
                            <input type="submit" class="btn btn-default pull-right" value="Next" name="savebiodata"></li>
                        <li class="next finish" style="display:none;"><input type="submit" class="btn btn-success" name="apply" value="Submit Pengajuan"></li>
                    </ul>
                  </form>

                  <?php } else if($_GET['data'] == 2){ ?>
                  <form method="post" enctype="multipart/form-data">
                    <div class="tab-content">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Nama Perusahaan : </label>
                                <input type="text" name="nama_perusahaan" id="name" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">No. Telepon Perusahaan : </label>
                                <input type="text" name="telp_perusahaan" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Alamat Perusahaan : </label>
                            <textarea class="form-control" rows="4" name="alamat_perusahaan" id="message" ></textarea>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">No. Fax : </label>
                                <input type="text" name="fax_perusahaan" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Jenis Usaha : </label>
                                <input type="text" name="jenis_usaha" class="form-control" >
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">Jabatan/Pangkat : </label>
                                <input type="text" name="jabatan" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Bidang Pekerjaan : </label>
                                <br>
                                <select class="chosen-select" style="width:500px" name="bidang_pekerjaan" >
                                    <option value="">--- Pilih ---</option>
                                    <option value="Humas">Humas</option>
                                    <option value="Keuangan">Keuangan</option>
                                    <option value="Pemasaran">Pemasaran</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="password">Masa Kerja: </label>
                                <input type="text" name="masa_kerja" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Status Bekerja : </label>
                                <br>
                                <select class="chosen-select" style="width:500px" name="status" >
                                		<option value="">--- Pilih ---</option>
                                		<option value="Karyawan Tetap">Karyawan Tetap</option>
                                		<option value="Kontrak">Kontrak</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Nama Atasan Langsung : </label>
                                <input type="text" name="nm_atasan" id="name" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">No. Telelpon Atasan : </label>
                                <input type="text" name="telp_atasan" id="username" class="form-control" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Nama Kepala Personalia : </label>
                                <input type="text" name="nm_kep_personalia" id="name" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">No. Telelpon Personalia : </label>
                                <input type="text" name="telp_personalia" id="username" class="form-control" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Nama Perusahaan Sebelumnya : </label>
                                <input type="text" name="nm_company_before" id="name" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">Masa Kerja Diperusahaan Sebelumnya : </label>
                                <input type="text" name="masa_kerja_before" id="username" class="form-control" >
                            </div>
                        </div>
                    </div>

                    <ul class="pager">
                        <li>
                            <input type="submit" class="btn btn-default pull-right" value="Next" name="savepekerjaan"></li>
                        <li class="next finish" style="display:none;"><input type="submit" class="btn btn-success" name="apply" value="Submit Pengajuan"></li>
                    </ul>
                  </form>
                  <?php } else if($_GET['data'] == 3){ ?>
                  <form method="post" enctype="multipart/form-data">
                    <div class="tab-content">
                        <h3>Penghasilan / bulan</h3><hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Pendapatan Pokok : </label>
                                <input type="number" minlength="0" maxlength="12" name="pendapatan_pokok" onchange="totalPendapatan();" id="pendapatan_pokok" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Tunjangan / Pendapatan Lain : </label>
                                <input type="number" minlength="0" maxlength="12" name="tunjangan" onchange="totalPendapatan();" id="tunjangan" class="form-control" >
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">Penghasilan Istri / Suami : </label>
                                <input type="number" minlength="0" maxlength="12" name="penghasilan" onchange="totalPendapatan();" id="penghasilan" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Total : </label>
                                <input type="number" minlength="0" maxlength="12" name="total_penghasilan" id="total_penghasilan" class="form-control" >
                            </div>

                        </div>
                        <h3>Pengeluaran / bulan</h3><hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Biaya rutin rumah tangga : </label>
                                <input type="number" minlength="0" maxlength="12" name="biaya_rutin" id="biaya_rutin" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">Angsuran pinjaman lain : </label>
                                <input type="number" minlength="0" maxlength="12" name="angsuran_lain" id="angsuran_lain" class="form-control" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Biaya lain-lain : </label>
                                <input type="number" minlength="0" maxlength="12" name="biaya_lain" id="biaya_lain" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">Total : </label>
                                <input type="number" minlength="0" maxlength="12" name="total_pengeluaran" id="total_pengeluaran" class="form-control" >
                            </div>
                        </div>
                    </div>

                    <ul class="pager">
                        <li>
                            <input type="submit" class="btn btn-default pull-right" value="Next" name="savepenghasilan"></li>
                        <li class="next finish" style="display:none;"><input type="submit" class="btn btn-success" name="apply" value="Submit Pengajuan"></li>
                    </ul>
                  </form>
                  <?php } else if($_GET['data'] == 4){ ?>
                  <form method="post" enctype="multipart/form-data">
                    <div class="tab-content">
                        <h3>Dokumen Penting</h3>
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Perhatian!</strong> Anda diwajibkan untuk mengupload data anda, file yang diupload harus beresolusi HD agar memudahkan Marketing untuk pengecekan.
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Foto Identitas : </label>
                                <input type="file" class="filestyle" data-buttonText="Find Image" name="identitas" data-iconName="fa fa-inbox">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Foto Kartu Keluarga : </label>
                                <input type="file" class="filestyle" data-buttonText="Find Image" name="kk" data-iconName="fa fa-inbox">
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">Foto Surat Nikah : </label>
                                <input type="file" class="filestyle" data-buttonText="Find Image" name="surat_nikah" data-iconName="fa fa-inbox">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Foto Surat Keterangan Karyawan : </label>
                                <input type="file" class="filestyle" data-buttonText="Find Image" name="sk" data-iconName="fa fa-inbox">
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">Foto NPWP : </label>
                                <input type="file" class="filestyle" data-buttonText="Find Image" name="npwp" data-iconName="fa fa-inbox">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Foto Rekening Tabungan : </label>
                                <input type="file" class="filestyle" data-buttonText="Find Image" name="rekening" data-iconName="fa fa-inbox">
                            </div>

                        </div>
                        <h3>Pengajuan Kredit</h3><hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Permohonan Kredit (Jumlah) : </label>
                                <input type="number" minlength="0" maxlength="12" name="permohonan_kredit" id="permohonan_kredit" class="form-control" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">Jangka Watu : </label>
                                <input type="number" minlength="0" maxlength="12" name="jangka_waktu" id="jangka_waktu" class="form-control" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Bunga Saat ini : </label>
                                <input type="text" name="bunya" id="biaya_lain" class="form-control" value="2.5 %" disabled>
                            </div>
                        </div>
                    </div>

                    <ul class="pager">
                        <li><input type="submit" class="btn btn-success pull-right" name="apply" value="Submit Pengajuan"></li>
                    </ul>
                  </form>
                  <?php } ?>
              </div>
              <!-- /tile body -->

            </section>
        </div>


    </div>
</section
