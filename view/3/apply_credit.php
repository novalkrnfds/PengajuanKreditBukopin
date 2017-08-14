<?php
    $idnasabah = $_SESSION['id_nasabah'];

    //get data nasabah
    $sql  = mysql_query("SELECT * FROM tb_nasabah as a LEFT OUTER JOIN tb_pekerjaan as b ON a.id_nasabah = b.id_nasabah LEFT OUTER JOIN tb_penghasilan as c ON a.id_nasabah = c.id_nasabah WHERE a.id_nasabah = '$idnasabah'");
    $data = mysql_fetch_array( $sql);

    //get id_kredit by id_nasabah for disabled field
    $selectkredit = mysql_query("select * from tb_kredit where id_nasabah = '$idnasabah'");
    $count = mysql_num_rows($selectkredit);

    //Save Biodata
    if(isset($_POST['savebiodata'])){
        $tgl = date("Y-m-d", strtotime($_POST['tgl_lahir']));

        $savebiodata = mysql_query("update tb_nasabah set nama = '$_POST[nama]', tmp_lahir = '$_POST[tmp_lahir]', tgl_lahir = '$tgl',
                        agama = '$_POST[agama]', no_identitas = '$_POST[no_identitas]', no_npwp = '$_POST[no_npwp]', alamat = '$_POST[alamat]', lama_menetap = '$_POST[lama_menetap]',
                        no_telprumah = '$_POST[no_telp]', no_hp = '$_POST[hp]', status_perkawinan = '$_POST[status_perkawinan]', pendidikan = '$_POST[pendidikan]',
                        nama_ibukandung = '$_POST[nama_ibukandung]', jml_tanggungan = '$_POST[jml_tanggungan]', alamat_korespondensi = '$_POST[alamat_korespondensi]',
                        kepemilikan_rumah = '$_POST[kepemilikan_rumah]' where id_nasabah = '$idnasabah'");

        //kondisi apakah save berhasil
        if($savebiodata){
        echo "<script type='text/javascript'> setTimeout(function () { swal({ title: 'Simpan biodata diri berhasil', text:  'Mohon tunggu', type: 'success', timer: 3000, showConfirmButton: false }); },10); window.setTimeout(function(){
                window.location.replace('index.php?menu=apply_credit&data=2'); } ,2000); </script>";
        } else {
        echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'Simpan biodata diri gagal', type: 'error', confirmButtonText: 'Ok' }); </script>";
        }
    } else {
        unset($_POST['savebiodata']);
    }

    //Save Pekerjaan
    if(isset($_POST['savepekerjaan'])){
        $savepekerjaan = mysql_query("insert into tb_pekerjaan values('', $idnasabah, '$_POST[nama_perusahaan]', '$_POST[alamat_perusahaan]', '$_POST[telp_perusahaan]', '$_POST[fax_perusahaan]',
                        '$_POST[jenis_usaha]', '$_POST[bidang_pekerjaan]', '$_POST[jabatan]', '$_POST[status]', '$_POST[masa_kerja]', '$_POST[nm_atasan]', '$_POST[telp_atasan]', '$_POST[nm_kep_personalia]',
                        '$_POST[telp_personalia]', '$_POST[nm_company_before]', '$_POST[masa_kerja_before]')");

        //kondisi apakah save berhasil
        if($savepekerjaan){
        echo "<script type='text/javascript'> setTimeout(function () { swal({ title: 'Simpan data pekerjaan berhasil', text:  'Mohon tunggu', type: 'success', timer: 3000, showConfirmButton: false }); },10); window.setTimeout(function(){
                window.location.replace('index.php?menu=apply_credit&data=3'); } ,2000); </script>";
        } else {
        echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'Simpan data pekerjaan gagal', type: 'error', confirmButtonText: 'Ok' }); </script>";
        }
    } else {
        unset($_POST['savepekerjaan']);
    }

    //Save Penghasilan
    if(isset($_POST['savepenghasilan'])){
        $savepenghasilan = mysql_query("insert into tb_penghasilan values ('', $idnasabah, '$_POST[pendapatan_pokok]', '$_POST[tunjangan]', '$_POST[penghasilan]', '$_POST[total_penghasilan]',
                            '$_POST[biaya_rutin]', '$_POST[angsuran_lain]', '$_POST[biaya_lain]', '$_POST[total_pengeluaran]', 0)");
        
        //kondisi apakah save berhasil
        if($savepenghasilan){
        echo "<script type='text/javascript'> setTimeout(function () { swal({ title: 'Simpan data penghasilan berhasil', text:  'Mohon tunggu', type: 'success', timer: 3000, showConfirmButton: false }); },10); window.setTimeout(function(){
                window.location.replace('index.php?menu=apply_credit&data=4'); } ,2000); </script>";
        } else {
        echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'Simpan data penghasilan gagal', type: 'error', confirmButtonText: 'Ok' }); </script>";
        }
    } else {
        unset($_POST['savepenghasilan']);
    }

    //Save Dokumen
    if(isset($_POST['apply'])){
        //get type file for kondisi
        $identitas = getimagesize($_FILES['identitas']['tmp_name']);
        $kk = getimagesize($_FILES['kk']['tmp_name']);
        $surat_nikah = getimagesize($_FILES['surat_nikah']['tmp_name']);
        $sk = getimagesize($_FILES['sk']['tmp_name']);
        $npwp = getimagesize($_FILES['npwp']['tmp_name']);
        $rekening = getimagesize($_FILES['rekening']['tmp_name']);
        
        if (($identitas['mime'] == "image/jpeg" || "image/png") || ($kk['mime'] == "image/jpeg" || "image/png") || ($surat_nikah['mime'] == "image/jpeg" || "image/png") || ($sk['mime'] == "image/jpeg" || "image/png") || ($npwp['mime'] == "image/jpeg" || "image/png") || ($rekening['mime'] == "image/jpeg" || "image/png")){
			//define file
            $file_foto1 = $_FILES['identitas']['tmp_name'];
            $file_foto2 = $_FILES['kk']['tmp_name'];
            $file_foto3 = $_FILES['surat_nikah']['tmp_name'];
            $file_foto4 = $_FILES['sk']['tmp_name'];
            $file_foto5 = $_FILES['npwp']['tmp_name'];
            $file_foto6 = $_FILES['rekening']['tmp_name'];

			$nama_foto1 = $_FILES['identitas']['name'];
			$nama_foto2 = $_FILES['kk']['name'];
			$nama_foto3 = $_FILES['surat_nikah']['name'];
			$nama_foto4 = $_FILES['sk']['name'];
			$nama_foto5 = $_FILES['npwp']['name'];
			$nama_foto6 = $_FILES['rekening']['name'];

            //set directory to upload
			$dir="upload/";

			$upload1 = $dir.$nama_foto1;
            $upload2 = $dir.$nama_foto2;
            $upload3 = $dir.$nama_foto3;
            $upload4 = $dir.$nama_foto4;
            $upload5 = $dir.$nama_foto5;
            $upload6 = $dir.$nama_foto6;
			
            //moving file
            $move1 = move_uploaded_file($file_foto1, $upload1);
            $move2 = move_uploaded_file($file_foto2, $upload2);
            $move3 = move_uploaded_file($file_foto3, $upload3);
            $move4 = move_uploaded_file($file_foto4, $upload4);
            $move5 = move_uploaded_file($file_foto5, $upload5);
            $move6 = move_uploaded_file($file_foto6, $upload6);

            //kondisi, apakah file ter-upload
            if($move1 && $move2 && $move3 && $move4 && $move6){
                //save kredit
                $savekredit = mysql_query("insert into tb_kredit values ('', $idnasabah, 1, '$_POST[permohonan_kredit]', '$_POST[jangka_waktu]', '2.95%')");
                //get last insert id kredit
                $getId = mysql_insert_id();

                //save dokumen and detail kredit
                $savedokumen = mysql_query("insert into tb_dokumen values ('', $getId, '$nama_foto1', '$nama_foto2', '$nama_foto3', '$nama_foto4', '$nama_foto5', '$nama_foto6')");
                $savedetailkredit = mysql_query("insert into tb_detailkredit values('', $idnasabah, $getId)");

                //save default ke status validasi
                $savestatus = mysql_query("insert into tb_status_validasi values ('', $getId, 1, '0', '-', now())");
                
                //kondisi, apakah save berhasil
                if($savekredit && $savedokumen && $savedetailkredit && $savestatus){
                    echo "<script type='text/javascript'> setTimeout(function () { swal({ title: 'Simpan data pengajuan kredit berhasil', text:  'Mohon tunggu', type: 'success', timer: 3000, showConfirmButton: false }); },10); window.setTimeout(function(){
                    window.location.replace('index.php'); } ,2000); </script>";
                } else {
                    echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'Gagal menyimpan pengajuan kredit anda, mohon di cek kembali!', type: 'error', confirmButtonText: 'Ok' }); </script>";
                }
            } else {
                echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'Upload gagal', type: 'error', confirmButtonText: 'Ok' }); </script>";
            }
		} else{
            echo "<script type='text/javascript'> swal({ title: 'Error!', text: 'File tidak sesuai dengan ketentuan. Ulangi !', type: 'error', confirmButtonText: 'Ok' }); </script>";
		}

    } else {
        unset($_POST['apply']);
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
                                <input type="text" name="nama" id="name" value="<?=$data['nama']?>" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                               <label for="username">Agama: </label><br>
                               <select class="chosen-select" style="width:500px" name="agama" <?php if($count > 0){ echo "disabled";}?>>
                                   <option value="">--- Pilih ---</option>
                                   <option value="Islam" <?php if($data['agama'] == 'Islam'){echo 'selected';}?>>Islam</option>
                                   <option value="Khatolik" <?php if($data['agama'] == 'Khatolik'){echo 'selected';}?>>Khatolik</option>
                                   <option value="Protestan" <?php if($data['agama'] == 'Protestan'){echo 'selected';}?>>Protestan</option>
                                   <option value="Hindu" <?php if($data['agama'] == 'Hindu'){echo 'selected';}?>>Hindu</option>
                                   <option value="Budha" <?php if($data['agama'] == 'Budha'){echo 'selected';}?>>Hindu</option>
                                   <option value="Lainnya" <?php if($data['agama'] == 'Lainnya'){echo 'selected';}?>>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">Tempat Lahir: </label>
                                <input type="text" name="tmp_lahir" value="<?=$data['tmp_lahir']?>" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Tanggal Lahir: </label>
                                <input type="text" name="tgl_lahir" value="<?=date("m/d/Y", strtotime($data['tgl_lahir']))?>" class="form-control datepicker" data-format="L" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">No. Identitas: </label>
                                <input type="text" name="no_identitas" value="<?=$data['no_identitas']?>" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">No. NPWP : </label>
                                <input type="text" name="no_npwp" value="<?=$data['no_npwp']?>" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="message">Alamat saat ini: </label>
                            <textarea class="form-control" rows="4" name="alamat" id="message" <?php if($count > 0){ echo "disabled";}?>><?=$data['alamat']?></textarea>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">No. Telepon: </label>
                                <input type="text" name="no_telp" value="<?=$data['no_telprumah']?>" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Handphone : </label>
                                <input type="text" name="hp" value="<?=$data['no_hp']?>" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Status : </label>
                                <br>
                                <select class="chosen-select" style="width:500px" name="status_perkawinan" <?php if($count > 0){ echo "disabled";}?>>
                                    <option value="">--- Pilih ---</option>
                                    <option value="Menikah" <?php if($data['status_perkawinan'] == 'Menikah'){echo 'selected';}?>>Menikah</option>
                                    <option value="Belum Menikah" <?php if($data['status_perkawinan'] == 'Belum Menikah'){echo 'selected';}?>>Belum Menikah</option>
                                    <option value="Janda/Duda" <?php if($data['status_perkawinan'] == 'Janda/Duda'){echo 'selected';}?>>Janda/Duda</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">Pendidikan Terakhir: </label>
                                <br>
                                <select class="chosen-select" style="width:500px" name="pendidikan" <?php if($count > 0){ echo "disabled";}?>>
                                   <option value="">--- Pilih ---</option>
                                   <option value="SD" <?php if($data['pendidikan'] == 'SD'){echo 'selected';}?>>SD</option>
                                   <option value="SLTP" <?php if($data['pendidikan'] == 'SLTP'){echo 'selected';}?>>SLTP</option>
                                   <option value="SLTA" <?php if($data['pendidikan'] == 'SLTA'){echo 'selected';}?>>SLTA</option>
                                   <option value="S1" <?php if($data['pendidikan'] == 'S1'){echo 'selected';}?>>S1</option>
                                   <option value="S2" <?php if($data['pendidikan'] == 'S2'){echo 'selected';}?>>S2</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Nama Ibu Kandung : </label>
                                <input type="text" value="<?=$data['nama_ibukandung']?>" name="nama_ibukandung" id="name" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">Jumlah Tanggungan : </label>
                                <input type="text" value="<?=$data['jml_tanggungan']?>" name="jml_tanggungan" id="username" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Alamat korespodensi: </label>
                            <textarea class="form-control" rows="4" name="alamat_korespondensi" id="message" <?php if($count > 0){ echo "disabled";}?>><?=$data['alamat_korespondensi']?></textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Kepemilikan Rumah : </label>
                                <br>
                                <select class="chosen-select" style="width:500px" name="kepemilikan_rumah" <?php if($count > 0){ echo "disabled";}?>>
                                  <option value="">--- Pilih ---</option>
                                  <option value="Sendiri" <?php if($data['kepemilikan_rumah'] == 'Sendiri'){echo 'selected';}?>>Sendiri</option>
                                  <option value="Sewa/Kontrak" <?php if($data['kepemilikan_rumah'] == 'Sewa/Kontrak'){echo 'selected';}?>>Sewa/Kontrak</option>
                                  <option value="Orang tua" <?php if($data['kepemilikan_rumah'] == 'Orang tua'){echo 'selected';}?>>Orang tua</option>
                                  <option value="Dinas" <?php if($data['kepemilikan_rumah'] == 'Dinas'){echo 'selected';}?>>Dinas</option>
                                  <option value="Lainnya" <?php if($data['kepemilikan_rumah'] == 'Lainnya'){echo 'selected';}?>>Lainnya</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">Lama Menetap: </label>
                                <input type="text" class="form-control" value="<?=$data['lama_menetap']?>" name="lama_menetap" <?php if($count > 0){ echo "disabled";}?>>
                            </div>
                        </div>
                    </div>

                    <ul class="pager">
                        <li>
                            <input type="submit" class="btn btn-default pull-right" value="Next" name="savebiodata" <?php if($count > 0){ echo "disabled";}?>></li>
                        <li class="next finish" style="display:none;"><input type="submit" class="btn btn-success" name="apply" value="Submit Pengajuan"></li>
                    </ul>
                  </form>

                  <?php } else if($_GET['data'] == 2){ ?>
                  <form method="post" enctype="multipart/form-data">
                    <div class="tab-content">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Nama Perusahaan : </label>
                                <input type="text" name="nama_perusahaan" id="name" value="<?=$data['nama_perusahaan']?>" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">No. Telepon Perusahaan : </label>
                                <input type="text" name="telp_perusahaan" value="<?=$data['telp_perusahaan']?>" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Alamat Perusahaan : </label>
                            <textarea class="form-control" rows="4" name="alamat_perusahaan" id="message" <?php if($count > 0){ echo "disabled";}?>><?=$data['alamat_perusahaan']?></textarea>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">No. Fax : </label>
                                <input type="text" name="fax_perusahaan" value="<?=$data['fax_perusahaan']?>" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Jenis Usaha : </label>
                                <input type="text" name="jenis_usaha" value="<?=$data['jenis_usaha']?>" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">Jabatan/Pangkat : </label>
                                <input type="text" name="jabatan" value="<?=$data['jabatan']?>" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Bidang Pekerjaan : </label>
                                <br>
                                <select class="chosen-select" style="width:500px" name="bidang_pekerjaan" <?php if($count > 0){ echo "disabled";}?>>
                                    <option value="">--- Pilih ---</option>
                                    <option value="Humas" <?php if($data['bidang_pekerjaan'] == 'Humas'){echo 'selected';}?>>Humas</option>
                                    <option value="Keuangan" <?php if($data['bidang_pekerjaan'] == 'Keuangan'){echo 'selected';}?>>Keuangan</option>
                                    <option value="Pemasaran" <?php if($data['bidang_pekerjaan'] == 'Pemasaran'){echo 'selected';}?>>Pemasaran</option>
                                    <option value="Lainnya" <?php if($data['bidang_pekerjaan'] == 'Lainnya'){echo 'selected';}?>>Lainnya</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="password">Masa Kerja: </label>
                                <input type="text" name="masa_kerja" value="<?=$data['masa_kerja']?>" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Status Bekerja : </label>
                                <br>
                                <select class="chosen-select" style="width:500px" name="status" <?php if($count > 0){ echo "disabled";}?>>
                                		<option value="">--- Pilih ---</option>
                                		<option value="Karyawan Tetap" <?php if($data['status'] == 'Karyawan Tetap'){echo 'selected';}?>>Karyawan Tetap</option>
                                		<option value="Kontrak" <?php if($data['status'] == 'Kontrak'){echo 'selected';}?>>Kontrak</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Nama Atasan Langsung : </label>
                                <input type="text" name="nm_atasan" value="<?=$data['nm_atasan']?>" id="name" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">No. Telelpon Atasan : </label>
                                <input type="text" name="telp_atasan" value="<?=$data['telp_atasan']?>" id="username" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Nama Kepala Personalia : </label>
                                <input type="text" name="nm_kep_personalia" value="<?=$data['nm_kep_personalia']?>" id="name" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">No. Telelpon Personalia : </label>
                                <input type="text" name="telp_personalia" value="<?=$data['telp_personalia']?>" id="username" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Nama Perusahaan Sebelumnya : </label>
                                <input type="text" name="nm_company_before" value="<?=$data['nm_company_before']?>" id="name" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">Masa Kerja Diperusahaan Sebelumnya : </label>
                                <input type="text" name="masa_kerja_before" value="<?=$data['masa_kerja_before']?>" id="username" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>
                        </div>
                    </div>

                    <ul class="pager">
                        <li>
                            <input type="submit" class="btn btn-default pull-right" value="Next" name="savepekerjaan" <?php if($count > 0){ echo "disabled";}?>></li>
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
                                <input type="number" minlength="0" maxlength="12" value="<?=$data['pendapatan_pokok']?>" name="pendapatan_pokok" onchange="totalPendapatan();" id="pendapatan_pokok" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Tunjangan / Pendapatan Lain : </label>
                                <input type="number" minlength="0" maxlength="12" value="<?=$data['tunjangan']?>" name="tunjangan" onchange="totalPendapatan();" id="tunjangan" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">Penghasilan Istri / Suami : </label>
                                <input type="number" minlength="0" maxlength="12" value="<?=$data['penghasilan']?>" name="penghasilan" onchange="totalPendapatan();" id="penghasilan" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Total : </label>
                                <input type="number" minlength="0" maxlength="12" value="<?=$data['total_penghasilan']?>" name="total_penghasilan" id="total_penghasilan" class="form-control" <?php if($count > 0){ echo "disabled";}?> >
                            </div>

                        </div>
                        <h3>Pengeluaran / bulan</h3><hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Biaya rutin rumah tangga : </label>
                                <input type="number" minlength="0" maxlength="12" value="<?=$data['biaya_rutin']?>" name="biaya_rutin" id="biaya_rutin" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">Angsuran pinjaman lain : </label>
                                <input type="number" minlength="0" maxlength="12" value="<?=$data['angsuran_lain']?>" name="angsuran_lain" id="angsuran_lain" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Biaya lain-lain : </label>
                                <input type="number" minlength="0" maxlength="12" value="<?=$data['biaya_lain']?>" name="biaya_lain" id="biaya_lain" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">Total : </label>
                                <input type="number" minlength="0" maxlength="12" value="<?=$data['total_pengeluaran']?>" name="total_pengeluaran" id="total_pengeluaran" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>
                        </div>
                    </div>

                    <ul class="pager">
                        <li>
                            <input type="submit" class="btn btn-default pull-right" value="Next" name="savepenghasilan" <?php if($count > 0){ echo "disabled";}?>></li>
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
                                <input type="file" class="filestyle" data-buttonText="Find Image" accept="image/*" name="identitas" data-iconName="fa fa-inbox" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Foto Kartu Keluarga : </label>
                                <input type="file" class="filestyle" data-buttonText="Find Image" accept="image/*" name="kk" data-iconName="fa fa-inbox" <?php if($count > 0){ echo "disabled";}?>>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">Foto Surat Nikah : </label>
                                <input type="file" class="filestyle" data-buttonText="Find Image" accept="image/*" name="surat_nikah" data-iconName="fa fa-inbox" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Foto Surat Keterangan Karyawan : </label>
                                <input type="file" class="filestyle" data-buttonText="Find Image" accept="image/*" name="sk" data-iconName="fa fa-inbox" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="password">Foto NPWP : </label>
                                <input type="file" class="filestyle" data-buttonText="Find Image" accept="image/*" name="npwp" data-iconName="fa fa-inbox" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Foto Rekening Tabungan : </label>
                                <input type="file" class="filestyle" data-buttonText="Find Image" accept="image/*" name="rekening" data-iconName="fa fa-inbox" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                        </div>
                        <h3>Pengajuan Kredit</h3><hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Permohonan Kredit (Jumlah) : </label>
                                <input type="number" minlength="0" maxlength="12" name="permohonan_kredit" id="permohonan_kredit" class="form-control" <?php if($count > 0){ echo "disabled";}?>>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">Jangka Watu : </label>
                                <input type="number" minlength="0" maxlength="12" name="jangka_waktu" id="jangka_waktu" class="form-control" <?php if($count > 0){ echo "disabled";}?> >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Bunga Saat ini : </label>
                                <input type="text" name="bunya" id="biaya_lain" class="form-control" value="2.95 %" disabled>
                            </div>
                        </div>
                    </div>

                    <ul class="pager">
                        <li><input type="submit" class="btn btn-success pull-right" name="apply" value="Submit Pengajuan" <?php if($count > 0){ echo "disabled";}?>></li>
                    </ul>
                  </form>
                  <?php } ?>
              </div>
              <!-- /tile body -->

            </section>
        </div>


    </div>
</section
