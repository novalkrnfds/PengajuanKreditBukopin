<div class="page-content page-wizard">
  <div class="header">
    <h2>Apply <strong>Credit</strong></h2>
    <div class="breadcrumb-wrapper">
      <ol class="breadcrumb">
        <li><a href="index.php">Home</a>
        </li>
        <li class="active">Apply Credit</li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel">
        <div class="panel-content">
          <p class="m-t-10 m-b-20 f-16">Lengkapi semua data anda untuk dapat di tinjau dengan tim kami.</p>
          <div class="tabs tabs-linetriangle">
            <div class="tab-content">
              <div class="tab-pane active" id="validation">
                <form class="wizard wizard-validation" data-style="sea" method="post" role="form">
                  <fieldset>
                    <legend>Data Nasabah</legend>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="nama">Nama Lengkap <font color="red">*</font></label>
                          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required data-parsley-group="block0">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Tempat Lahir <font color="red">*</font></label>
                          <input type="text" class="form-control" id="date" name="tmp_lahir" placeholder="Tempat Lahir" required data-parsley-group="block0">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">No. Identitas <font color="red">*</font></label>
                          <input type="number" class="form-control" id="no_identitas" min="0" maxlength="16" name="no_identitas" placeholder="No. Identitas" required data-parsley-group="block0" >
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="email">Agama <font color="red">*</font></label>
                        	<select class="form-control" title="" name="agama" required data-parsley-group="block0">
                        		<option value="">--- Pilih ---</option>
                        		<option value="Islam">Islam</option>
                        		<option value="Khatolik">Khatolik</option>
                        		<option value="Protestan">Protestan</option>
                        		<option value="Hindu">Hindu</option>
                        		<option value="Budha">Hindu</option>
                        		<option value="Lainnya">Lainnya</option>
                        	</select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Tanggal Lahir <font color="red">*</font></label>
                          <div class="prepend-icon">
                            <input type="text" name="tgl_lahir" class="b-datepicker form-control" placeholder="Select a date..." required data-parsley-group="block0">
                            <i class="icon-calendar"></i>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">No. NPWP</label>
                          <input type="number" class="form-control" min="0" maxlength="16" id="npwp" name="npwp" placeholder="No. NPWP" required data-parsley-group="block0">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="email">Alamat Saat ini</label>
                          <textarea name="alamat" style="resize: none;" rows="3" placeholder="Alamat saat ini" class="form-control" title="" required data-parsley-group="block0"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="nama">No. Telepon <font color="red">*</font></label>
                          <input type="text" class="form-control" id="notelp" name="notelp" placeholder="No. Telepon" required data-parsley-group="block0">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Status <font color="red">*</font></label>
                          <select class="form-control" title="" name="status" required data-parsley-group="block0">
                        		<option value="">--- Pilih ---</option>
                        		<option value="Menikah">Menikah</option>
                        		<option value="Belum Menikah">Belum Menikah</option>
                        		<option value="Janda/Duda">Janda/Duda</option>
                        	</select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Nama Ibu Kandung <font color="red">*</font></label>
                          <input type="text" class="form-control" id="nm_ibu" name="nm_ibu" placeholder="Nama Ibu Kandung" required data-parsley-group="block0" >
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="email">HP <font color="red">*</font></label>
                          <input type="text" class="form-control" id="hp" name="hp" placeholder="HP" required data-parsley-group="block0">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Pendidikan Terakhir <font color="red">*</font></label>
                          <select class="form-control" title="" name="pendidikan" required data-parsley-group="block0">
                        		<option value="">--- Pilih ---</option>
                        		<option value="SD">SD</option>
                        		<option value="SLTP">SLTP</option>
                        		<option value="SLTA">SLTA</option>
                        		<option value="S1">S1</option>
                        		<option value="S2">S2</option>
                        	</select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Jumlah Tunggangan</label>
                          <input type="number" class="form-control" min="0" maxlength="16" id="jml_tunggangan" name="jml_tunggangan" placeholder="Jumlah Tunggangan" required data-parsley-group="block0">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="email">Alamat Korespodensi</label>
                          <textarea name="alamat_korespodensi" style="resize: none;" rows="3" placeholder="Alamat Korespodensi" class="form-control" title="" required data-parsley-group="block0"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Kepemilikan Rumah <font color="red">*</font></label>
                          <select class="form-control" title="" name="kepemilikan_rumah" required data-parsley-group="block0">
                        		<option value="">--- Pilih ---</option>
                        		<option value="Sendiri">Sendiri</option>
                        		<option value="Sewa/Kontrak">Sewa/Kontrak</option>
                        		<option value="Orang tua">Orang tua</option>
                        		<option value="Dinas">Dinas</option>
                        		<option value="Lainnya">Lainnya</option>
                        	</select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Lama Menetap</label>
                          <input type="text" class="form-control" id="lama_menetap" name="lama_menetap" placeholder="Lama Menetap" required data-parsley-group="block0">
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <fieldset>
                    <legend>Data Pekerjaan</legend>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="nama">Nama Perusahaan <font color="red">*</font></label>
                          <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan" required data-parsley-group="block1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">No. Fax <font color="red">*</font></label>
                          <input type="text" class="form-control" id="no_fax" name="no_fax" placeholder="No. Fax" required data-parsley-group="block1">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="email">No. Telepon Kantor <font color="red">*</font></label>
                          <input type="text" class="form-control" id="telp_kantor" name="telp_kantor" placeholder="No. Telepon Kantor" required data-parsley-group="block1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Jenis Usaha</label>
                          <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" placeholder="Jenis Usaha" required data-parsley-group="block1">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="email">Alamat Kantor</label>
                          <textarea name="alamat_kantor" style="resize: none;" rows="3" placeholder="Alamat Kantor" class="form-control" title="" required data-parsley-group="block1"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="nama">Jabatan/pangkat <font color="red">*</font></label>
                          <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan" required data-parsley-group="block1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Masa Kerja <font color="red">*</font></label>
                          <input type="text" class="form-control" id="masa_kerja" name="masa_kerja" placeholder="Masa Kerja" required data-parsley-group="block1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Nama Atasan Langsung <font color="red">*</font></label>
                          <input type="text" class="form-control" id="nm_atasan" name="masa_kerja" placeholder="Nama Atasan Langsung" required data-parsley-group="block1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Nama Kepala Personalia <font color="red">*</font></label>
                          <input type="text" class="form-control" id="nm_personalia" name="nm_personalia" placeholder="Nama Kepala Personalia" required data-parsley-group="block1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Nama Perusahaan Sebelumnya <font color="red">*</font></label>
                          <input type="text" class="form-control" id="nm_kantor_before" name="nm_kantor_before" placeholder="Nama Perusahaan Sebelumnya" required data-parsley-group="block1">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="email">Bidang Pekerjaan <font color="red">*</font></label>
                        	<select class="form-control" title="" name="bdg_pekerjaan" required data-parsley-group="block1">
                            <option value="">--- Pilih ---</option>
                        		<option value="Humas">Humas</option>
                        		<option value="Keuangan">Keuangan</option>
                        		<option value="Pemasaran">Pemasaran</option>
                        		<option value="Lainnya">Lainnya</option>
                        	</select>
                        </div>
                        <div class="form-group">
                          <label for="email">Status Bekerja <font color="red">*</font></label>
                        	<select class="form-control" title="" name="status_bekerja" required data-parsley-group="block1">
                        		<option value="">--- Pilih ---</option>
                        		<option value="Karyawan Tetap">Karyawan Tetap</option>
                        		<option value="Kontrak">Kontrak</option>
                        	</select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">No. Telepon Atasan <font color="red">*</font></label>
                          <input type="text" class="form-control" id="telp_atasan" name="telp_atasan" placeholder="No. Telepon Atasan" required data-parsley-group="block1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">No. Telepon Personalia <font color="red">*</font></label>
                          <input type="text" class="form-control" id="telp_personalia" name="telp_personalia" placeholder="No. Telepon Personalia" required data-parsley-group="block1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Masa Kerja Di Perusahaan Sebelumnya <font color="red">*</font></label>
                          <input type="text" class="form-control" id="masa_kerja_before" name="masa_kerja_before" placeholder="Masa Kerja Di Perusahaan Sebelumnya" required data-parsley-group="block1">
                        </div>
                      </div>
                    </div>
                    <div id="condition-error"></div>
                  </fieldset>
                  <fieldset>
                    <legend>Data Penghasilan</legend>
                    <label class="control-label">Penghasilan</label>
                    <hr>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="nama">Pendapatan Pokok <font color="red">*</font></label>
                          <input type="number" min="0" class="form-control" id="pendapatan_pokok" name="pendapatan_pokok" placeholder="Pendapatan Pokok" required data-parsley-group="block2">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Penghasilan Suami / Istri <font color="red">*</font></label>
                          <input type="number" min="0" class="form-control" id="penghasilan_suami" name="penghasilan_suami" placeholder="Penghasilan Suami / Istri" required data-parsley-group="block2">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="email">Tunjangan / Pendapatan Lain <font color="red">*</font></label>
                          <input type="number" min="0" class="form-control" id="tunjangan" name="tunjangan" placeholder="Tunjangan / Pendapatan Lain" required data-parsley-group="block2">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Total Pendapatan</label>
                          <input type="number" min="0" class="form-control" id="total_pendapatan" name="total_pendapatan" placeholder="Total Pendapatan" required data-parsley-group="block2">
                        </div>
                      </div>
                    </div>
                    <br>
                    <label class="control-label">Pengeluaran</label>
                    <hr>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="nama">Biaya Rutin Pengeluaran <font color="red">*</font></label>
                          <input type="number" min="0" class="form-control" id="rutin_pengeluaran" name="rutin_pengeluaran" placeholder="Biaya Rutin Pengeluaran" required data-parsley-group="block2">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Biaya Lain-lain <font color="red">*</font></label>
                          <input type="number" min="0" class="form-control" id="lain_pengeluaran" name="lain_pengeluaran" placeholder="Biaya Lain-lain" required data-parsley-group="block2">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="email">Angsuran Lain <font color="red">*</font></label>
                          <input type="number" min="0" class="form-control" id="angsuran_lain" name="angsuran_lain" placeholder="Angsuran Lain" required data-parsley-group="block2">
                        </div>
                        <div class="form-group">
                          <label for="">Total Pengeluaran</label>
                          <input type="number" min="0" class="form-control" id="total_pengeluaran" name="total_pengeluaran" placeholder="Total Pengeluaran" required data-parsley-group="block2">
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <fieldset>
                    <legend>Pengajuan Kredit</legend>
                    <label class="control-label">Bunga Saat Ini</label>
                    <hr>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="number" min="0" class="form-control" id="bunga" name="bunga" placeholder="Bunga Saat Ini" readonly data-parsley-group="block3">
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                          <label class="" for="exampleInputName1">Permohonan Kredit Sebesar</label>
                          <input type="number" min="0" class="form-control" id="" placeholder="Permohonan Kredit Sebesar" name="kredit_sebesat" data-parsley-group="block3" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="" for="exampleInputCat1">Jangka Waktu</label>
                          <input type="text" class="form-control" id="" name="jangka_waktu" placeholder="Jangka Waktu" data-parsley-group="block3" required>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
