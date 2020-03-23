<?php
//$ceks = $this->session->userdata('kamar@2017');
//$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row(); 
//var_dump($v_permintaan->row());exit;
?>

<!-- Main content -->
<div class="content-wrapper">
  <br><br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title">Edit Permintaan Tenaga Kerja</h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>
        </div>
        <hr>
        <div class="panel-body">
          <?php
          echo $this->session->flashdata('msg');
          ?>
          <form class="form-horizontal" action="" method="post">
            <div class="col-md-12">
              <div class="col-md-12">

              <div class="form-group">
                  <label class="control-label col-lg-2">Departemen *</label>
                  <div class="col-lg-10">
                    <input type="text" name="departemen" class="form-control" value="<?php echo $v_permintaan->departemen; ?>" required maxlength="35" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Seksi *</label>
                  <div class="col-lg-10">
                    <input type="text" name="seksi" class="form-control" value="<?php echo $v_permintaan->seksi; ?>" required maxlength="35" placeholder="Seksi">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Golongan *</label>
                  <div class="col-lg-10">
                    <input type="text" name="golongan" class="form-control" value="<?php echo $v_permintaan->golongan; ?>" required maxlength="35" placeholder="Golongan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Jabatan *</label>
                  <div class="col-lg-10">
                    <input type="text" name="jabatan" class="form-control" value="<?php echo $v_permintaan->jabatan; ?>" required maxlength="35" placeholder="Jabatan">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Jumlah *</label>
                  <div class="col-lg-10">
                    <input type="text" name="jumlah" class="form-control" value="<?php echo $v_permintaan->jumlah; ?>" required maxlength="35" placeholder="Jumlah Orang">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Sumber Tenaga *</label>
                  <div class="col-lg-10">
                    <input type="text" name="sumber_tenaga" class="form-control" value="Internal" required maxlength="35" placeholder="Sumber Tenaga" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Due Date *</label>
                  <div class="col-lg-10">
                    <input type="date" name="due_date" class="form-control" value="<?php echo $v_permintaan->due_date; ?>" required placeholder="Due Date">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tujuan *</label>
                  <div class="col-lg-10">
                    <input type="radio" name="tujuan" value="Penggantian" <?php if ($v_permintaan->tujuan == 'Penggantian') {
                                                                            echo 'checked';
                                                                          } ?>> Penggantian<br>
                    <input type="radio" name="tujuan" value="Penambahan" <?php if ($v_permintaan->tujuan == 'Penambahan') {
                                                                            echo 'checked';
                                                                          } ?>> Penambahan<br>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Atas Nama Penggantian</label>
                  <div class="col-lg-10">
                    <textarea name="an" rows="8" cols="80" class="form-control" placeholder="-"><?php echo $v_permintaan->an; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Alasan Penambahan</label>
                  <div class="col-lg-10">
                    <textarea name="alasan" rows="8" cols="80" class="form-control" placeholder="-"><?php echo $v_permintaan->alasan; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Pendidikan *</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="pendidikan" onchange="changeValue(this.value)" autofocus>
                      <option value="<?php echo $v_permintaan->pendidikan; ?>" selected><?php echo $v_permintaan->pendidikan; ?></option>
                      <option value="">Pilih Pendidikan</option>
                      <option value="S2">S2</option>
                      <option value="S1">S1</option>
                      <option value="D4">D4</option>
                      <option value="D3">D3</option>
                      <option value="SLTA">SLTA</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Jurusan *</label>
                  <div class="col-lg-10">
                    <input type="text" name="jurusan" class="form-control" value="<?php echo $v_permintaan->jurusan; ?>" maxlength="35" placeholder="Jurusan">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Pengalaman *</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="pengalaman" onchange="changeValue(this.value)" autofocus>
                      <option value="<?php echo $v_permintaan->pengalaman; ?>" selected><?php echo $v_permintaan->pengalaman; ?></option>
                      <option value="">Pilih Pengalaman</option>
                      <option value="Fresh Graduate">Fresh Graduate</option>
                      <option value="Berpengalaman">Berpengalaman</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Lama Pengalaman</label>
                  <div class="col-lg-10">
                    <input type="text" name="lama_pengalaman" class="form-control" value="<?php echo $v_permintaan->lama_pengalaman; ?>" maxlength="35" placeholder="-">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Bidang Pengalaman</label>
                  <div class="col-lg-10">
                    <input type="text" name="bidang_pengalaman" class="form-control" value="<?php echo $v_permintaan->bidang_pengalaman; ?>" maxlength="35" placeholder="-">
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-lg-2">Status *</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="status" onchange="changeValue(this.value)" autofocus>
                      <option value="<?php echo $v_permintaan->status; ?>" selected><?php echo $v_permintaan->status; ?></option>
                      <option value="">Pilih Status</option>
                      <option value="Kontrak">Kontrak</option>
                      <option value="Percobaan">Percobaan</option>
                      <option value="Magang">Magang</option>
                      <option value="PKL">PKL</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                                        <label class="control-label col-lg-2">Lama Kontrak</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="status_kontrak" class="form-control" value="<?php echo $v_permintaan->status_kontrak; ?>" maxlength="35" placeholder="Lama Kontrak">
                                        </div>
                                    </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Batas Usia *</label>
                  <div class="col-lg-10">
                    <input type="text" name="usia" class="form-control" value="<?php echo $v_permintaan->usia; ?>" maxlength="35" placeholder="Batas Usia">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Jenis Kelamin *</label>
                  <div class="col-lg-10">

                    <input type="radio" name="jk" value="L" <?php if ($v_permintaan->jk == 'L') {
                                                              echo 'checked';
                                                            } ?>> Laki-laki<br>
                    <input type="radio" name="jk" value="P" <?php if ($v_permintaan->jk == 'P') {
                                                              echo 'checked';
                                                            } ?>> Perempuan<br>

                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Skill & Knowledge Khusus </label>
                  <div class="col-lg-10">
                    <textarea name="skill" rows="8" cols="80" class="form-control" placeholder="Skill & Knowledge Khusus"><?php echo $v_permintaan->skill; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Bertanggungjawab *</label>
                  <div class="col-lg-10">
                    <input type="text" name="bertanggungjawab" class="form-control" value="<?php echo $v_permintaan->bertanggungjawab; ?>" required maxlength="35" placeholder="Bertanggungjawab">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Jumlah Bawahan *</label>
                  <div class="col-lg-10">
                    <input type="number" min="0" max="100" class="form-control" value="<?php echo $v_permintaan->jml_bawahan; ?>" name="jml_bawahan" required="required" placeholder="0 jika tidak ada">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Tugas Pokok </label>
                  <div class="col-lg-10">
                    <textarea name="tgs_pokok" rows="8" cols="80" class="form-control" placeholder="Tugas Pokok"><?php echo $v_permintaan->tgs_pokok; ?></textarea>
                  </div>
                </div>



                <div class="form-group">
                  <label class="control-label col-lg-2">NRP Pemohon *</label>
                  <div class="col-lg-10">
                    <input type="text" name="nrp_pemohon_ptk" class="form-control" value="<?php echo $v_permintaan->nrp_pemohon_ptk; ?>" required maxlength="35" placeholder="NRP Pemohon">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Pemohon *</label>
                  <div class="col-lg-10">
                    <input type="text" name="pemohon_ptk" class="form-control" value="<?php echo $v_permintaan->pemohon_ptk; ?>" required maxlength="35" placeholder="Nama Pemohon">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-lg-2">Tanggal Permintaan *</label>
                  <div class="col-lg-10">
                    <input type="date" name="tgl_permintaan" class="form-control" value="<?php echo $v_permintaan->tgl_permintaan; ?>" required placeholder="Tanggal permintaan">
                  </div>
                </div>

              </div>
            </div>

            <br>
            <hr>
            <a href="web/permintaan_tk" class="btn btn-default">Back</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Save</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->