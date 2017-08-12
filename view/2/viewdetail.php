<?php 
    $idnasabah = $_GET['id'];

    $sql  = mysql_query("SELECT * FROM tb_nasabah as a, tb_pekerjaan as b, tb_penghasilan as c, tb_kredit as d, tb_dokumen as e WHERE a.id_nasabah = b.id_nasabah AND a.id_nasabah = c.id_nasabah AND d.id_nasabah = a.id_nasabah AND d.id_kredit = e.id_kredit AND a.id_nasabah = '$idnasabah'");
    $data = mysql_fetch_array( $sql);
?>

<section id="content">

    <div class="page page-dashboard">

        <div class="pageheader">

            <h2>Detail Kelengkapan Data</h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> e-Submission Bank Bukopin</a>
                    </li>
                    <li class="active">
                        <a style="cursor:pointer;">Detail Kelengkapan Data</a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- cards row -->

        <div class="row">

            <div class="col-md-12">

                <!-- tile -->
                <section class="tile tile-simple">

                    <!-- tile body -->
                    <div class="tile-body p-0">

                        <div role="tabpanel">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#nasabahTab" aria-controls="nasabahTab" role="tab" data-toggle="tab">Nasabah</a></li>
                                <li role="presentation"><a href="#pekerjaanTab" aria-controls="pekerjaanTab" role="tab" data-toggle="tab">Pekerjaan</a></li>
                                <li role="presentation"><a href="#penghasilanTab" aria-controls="penghasilanTab" role="tab" data-toggle="tab">Penghasilan</a></li>
                                <li role="presentation"><a href="#dokumenTab" aria-controls="dokumenTab" role="tab" data-toggle="tab">Dokumen</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active" id="nasabahTab">

                                    <div class="wrap-reset">

                                        <form class="profile-settings">

                                            <div class="row">
                                                <div class="form-group col-md-12 legend">
                                                    <h4><strong>Detail</strong> Nasabah</h4>
                                                    <p><?=$data['nama']?> - <?=$data['no_identitas']?></p>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">No. Identitas</label>
                                                    <input type="text" placeholder="No. Identitas"  class="form-control" id="last-name" value="<?=$data['no_identitas']?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Nama Nasabah</label>
                                                    <input type="text" placeholder="Nama Nasabah" class="form-control" id="first-name" value="<?=$data['nama']?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">No. NPWP</label>
                                                    <input type="text" placeholder="No. NPWP" class="form-control" id="first-name" value="<?=$data['no_npwp']?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Tempat, Tanggal Lahir</label>
                                                    <input type="text" placeholder="Tempat, Tanggal Lahir" class="form-control" id="last-name" value="<?=$data['tmp_lahir']?>, <?=date("d F Y", strtotime($data['tgl_lahir']))?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Agama</label>
                                                    <input type="text" placeholder="Agama" class="form-control" id="first-name" value="<?=$data['agama']?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Alamat</label>
                                                    <input type="text" placeholder="Alamat" class="form-control" id="last-name" value="<?=$data['alamat']?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Lama Menetap</label>
                                                    <input type="text" placeholder="Lama Menetap" class="form-control" id="first-name" value="<?=$data['lama_menetap']?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">No. Telpon Rumah</label>
                                                    <input type="text" placeholder="No. Telpon Rumah" class="form-control" id="last-name" value="<?=$data['no_telprumah']?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">No. Handphone</label>
                                                    <input type="text" placeholder="No. Handphone" class="form-control" id="first-name" value="<?=$data['no_hp']?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Status Perkawinan</label>
                                                    <input type="text" placeholder="Status Perkawinan" class="form-control" id="last-name" value="<?=$data['status_perkawinan']?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Pendidikan Terakhir</label>
                                                    <input type="text" placeholder="Pendidikan Terakhir" class="form-control" id="first-name" value="<?=$data['pendidikan']?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Nama Ibu Kandung</label>
                                                    <input type="text" placeholder="Nama Ibu Kandung" class="form-control" id="last-name" value="<?=$data['nama_ibukandung']?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Jumlah Tanggungan</label>
                                                    <input type="text" placeholder="Jumlah Tanggungan" class="form-control" id="first-name" value="<?=$data['jml_tanggungan']?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Alamat Korespodensi</label>
                                                    <input type="text" placeholder="Alamat Korespodensi" class="form-control" id="last-name" value="<?=$data['alamat_korespondensi']?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Status Kepemilikan Rumah</label>
                                                    <input type="text" placeholder="Status Kepemilikan Rumah" class="form-control" id="first-name" value="<?=$data['kepemilikan_rumah']?>" disabled>
                                                </div>
                                                
                                                <div class="form-group col-sm-6 text-right">
                                                    <label for="first-name">&nbsp;</label><br>
                                                    <a href="index.php" class="btn btn-lightred btn-rounded btn-ef btn-ef-4 btn-ef-4c" id="first-name" >Back to List</a>
                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                                <div role="tabpanel" class="tab-pane" id="pekerjaanTab">

                                    <div class="wrap-reset">

                                        <form class="profile-settings">

                                            <div class="row">
                                                <div class="form-group col-md-12 legend">
                                                    <h4><strong>Detail</strong> Pekerjaan</h4>
                                                    <p><?=$data['nama']?> - <?=$data['no_identitas']?></p>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Nama Perusahaan</label>
                                                    <input type="text" placeholder="Nama Perusahaan"  class="form-control" id="last-name" value="<?=$data['nama_perusahaan']?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Alamat Perusahaan</label>
                                                    <input type="text" placeholder="Alamat Perusahaan" class="form-control" id="first-name" value="<?=$data['alamat_perusahaan']?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">No. Telepon</label>
                                                    <input type="text" placeholder="No. Telepon" class="form-control" id="first-name" value="<?=$data['telp_perusahaan']?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Fax</label>
                                                    <input type="text" placeholder="Fax" class="form-control" id="last-name" value="<?=$data['fax_perusahaan']?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Jenis Usaha</label>
                                                    <input type="text" placeholder="Jenis Usaha" class="form-control" id="first-name" value="<?=$data['jenis_usaha']?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Bidang Pekerjaan</label>
                                                    <input type="text" placeholder="Bidang Pekerjaan" class="form-control" id="last-name" value="<?=$data['bidang_pekerjaan']?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Jabatan</label>
                                                    <input type="text" placeholder="Jabatan" class="form-control" id="first-name" value="<?=$data['jabatan']?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Status Kerja</label>
                                                    <input type="text" placeholder="Status Kerja" class="form-control" id="last-name" value="<?=$data['status']?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Masa Bekerja</label>
                                                    <input type="text" placeholder="Masa Bekerja" class="form-control" id="first-name" value="<?=$data['masa_kerja']?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Nama Atasan</label>
                                                    <input type="text" placeholder="Nama Atasan" class="form-control" id="last-name" value="<?=$data['nm_atasan']?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">No. Telepon Atasan</label>
                                                    <input type="text" placeholder="No. Telepon Atasan" class="form-control" id="first-name" value="<?=$data['telp_atasan']?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Nama Kepala Personalia</label>
                                                    <input type="text" placeholder="Nama Kepala Personalia" class="form-control" id="last-name" value="<?=$data['nm_kep_personalia']?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">No. Telepon Personalia</label>
                                                    <input type="text" placeholder="No. Telepon Personalia" class="form-control" id="first-name" value="<?=$data['telp_personalia']?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Nama Perusahaan Sebelumnya</label>
                                                    <input type="text" placeholder="Nama Perusahaan Sebelumnya" class="form-control" id="last-name" value="<?=$data['nm_company_before']?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Masa Kerja di Perusahaan Sebelumnya</label>
                                                    <input type="text" placeholder="Masa Kerja di Perusahaan Sebelumnya" class="form-control" id="first-name" value="<?=$data['masa_kerja_before']?>" disabled>
                                                </div>
                                                
                                                <div class="form-group col-sm-6 text-right">
                                                    <label for="first-name">&nbsp;</label><br>
                                                    <a href="index.php" class="btn btn-lightred btn-rounded btn-ef btn-ef-4 btn-ef-4c" id="first-name" >Back to List</a>
                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                                <div role="tabpanel" class="tab-pane" id="penghasilanTab">

                                    <div class="wrap-reset">

                                        <form class="profile-settings">

                                            <div class="row">
                                                <div class="form-group col-md-12 legend">
                                                    <h4><strong>Detail</strong> Penghasilan</h4>
                                                    <p><?=$data['nama']?> - <?=$data['no_identitas']?></p>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Pendapatan Pokok</label>
                                                    <input type="text" placeholder="Pendapatan Pokok"  class="form-control" id="last-name" value="Rp. <?=number_format($data['pendapatan_pokok'], 0, ',', '.')?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Tunjangan</label>
                                                    <input type="text" placeholder="Tunjangan" class="form-control" id="first-name" value="Rp. <?=number_format($data['tunjangan'], 0, ',', '.')?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Penghasilan</label>
                                                    <input type="text" placeholder="Penghasilan" class="form-control" id="first-name" value="Rp. <?=number_format($data['penghasilan'], 0, ',', '.')?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Total Penghasilan</label>
                                                    <input type="text" placeholder="Total Penghasilan" class="form-control" id="last-name" value="Rp. <?=number_format($data['total_penghasilan'], 0, ',', '.')?>" disabled>
                                                </div>

                                            </div>
                                            
                                            <div class="row">
                                                <div class="form-group col-md-12 legend">
                                                    <p>Pengeluaran</p>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Biaya Rutin Per Bulan</label>
                                                    <input type="text" placeholder="Biaya Rutin" class="form-control" id="first-name" value="Rp. <?=number_format($data['biaya_rutin'], 0, ',', '.')?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Angsuran Lain</label>
                                                    <input type="text" placeholder="Angsuran Lain" class="form-control" id="last-name" value="Rp. <?=number_format($data['angsuran_lain'], 0, ',', '.')?>" disabled>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">Biaya Lain</label>
                                                    <input type="text" placeholder="Biaya Lain" class="form-control" id="first-name" value="Rp. <?=number_format($data['biaya_lain'], 0, ',', '.')?>" disabled>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name">Total Pengeluaran</label>
                                                    <input type="text" placeholder="Total Pengeluaran" class="form-control" id="last-name" value="Rp. <?=number_format($data['total_pengeluaran'], 0, ',', '.')?>" disabled>
                                                </div>

                                            </div>
                                            
                                            <div class="row">
                                                <div class="form-group col-md-12 legend">
                                                    <p>Total Penghasilan (Bersih)</p>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name">&nbsp;</label>
                                                    <input type="text" placeholder="Total Penghasilan (Bersih)" class="form-control" id="first-name" value="Rp. <?=number_format($data['netto_penghasilan'], 0, ',', '.')?>" disabled>
                                                </div>
                                                
                                                <div class="form-group col-sm-6 text-right">
                                                    <label for="first-name">&nbsp;</label><br>
                                                    <a href="index.php" class="btn btn-lightred btn-rounded btn-ef btn-ef-4 btn-ef-4c" id="first-name" >Back to List</a>
                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                                <div role="tabpanel" class="tab-pane" id="dokumenTab">

                                    <div class="wrap-reset">

                                        <form class="profile-settings">

                                            <div class="row">
                                                <div class="form-group col-md-12 legend">
                                                    <h4><strong>Detail</strong> Dokumen</h4>
                                                    <p><?=$data['nama']?> - <?=$data['no_identitas']?></p>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name"><strong>1. Foto Identitas</strong></label><br>
                                                    <img src="upload/<?=$data['foto_identitas']?>" width="100%">
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name"><strong>2. Foto Kartu Keluarga</strong></label><br>
                                                    <img src="upload/<?=$data['foto_kk']?>" width="100%">
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name"><strong>3. Foto Surat Nikah</strong></label><br>
                                                    <img src="upload/<?=$data['foto_suratnikah']?>" width="100%">
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name"><strong>4. Foto Surat Keterangan Karyawan</strong></label><br>
                                                    <img src="upload/<?=$data['sk_karyawan']?>" width="100%">
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label for="last-name"><strong>5. NPWP</strong></label><br>
                                                    <img src="upload/<?=$data['npwp']?>" width="100%">
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="first-name"><strong>6. Rekening Tabungan</strong></label><br>
                                                    <img src="upload/<?=$data['rekening_tabungan']?>" width="100%">
                                                </div>

                                            </div>
                                            <div class="row">
                                                
                                                <div class="form-group col-sm-12 text-right">
                                                    <label for="first-name">&nbsp;</label><br>
                                                    <a href="index.php" class="btn btn-lightred btn-rounded btn-ef btn-ef-4 btn-ef-4c" id="first-name" >Back to List</a>
                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /tile body -->

                </section>
                <!-- /tile -->

            </div>
        </div>





    </div>


</section>