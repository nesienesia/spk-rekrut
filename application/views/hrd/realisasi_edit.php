<?php
//$ceks = $this->session->userdata('kamar@2017');
//$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row(); 
//var_dump($v_realisasi->result_array());exit;
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
          <h5 class="panel-title">Edit Kolom Realisasi</h5>
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
                  <label class="control-label col-lg-2">Kode Persetujuan *</label>
                  <div class="col-lg-10">
                    <input type="text" name="kd_persetujuan" id="kd_persetujuan" class="form-control" value="<?php echo $v_realisasi->kd_persetujuan;?>"  placeholder="No Permohonan" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">No Permohonan *</label>
                  <div class="col-lg-10">
                    <input type="text" name="no_permohonan" id="no_permohonan" class="form-control" value="<?php echo $v_realisasi->no_permohonan;?>" placeholder="No Permohonan" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Mengetahui *</label>
                  <div class="col-lg-10">
                    <input type="text" name="mengetahui" class="form-control" value="<?php echo $v_realisasi->mengetahui;?>" required maxlength="35" placeholder="Mengetahui">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Lembaga Penyelenggara *</label>
                  <div class="col-lg-10">
                    <input type="text" name="lembaga_penyelenggara" class="form-control" value="<?php echo $v_realisasi->lembaga_penyelenggara; ?>" required maxlength="35" placeholder="Lembaga Penyelenggara">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tanggal Diawali *</label>
                  <div class="col-lg-10">
                    <input type="date" name="tgl_training" class="form-control" value="<?php echo $v_realisasi->tgl_training; ?>" required placeholder="Tanggal Diawali">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tanggal Berakhir *</label>
                  <div class="col-lg-10">
                    <input type="date" name="tgl_akhir" class="form-control" value="<?php echo $v_realisasi->tgl_akhir; ?>" required placeholder="Tanggal Berakhir">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Keterangan *</label>
                  <div class="col-lg-10">
                    <textarea name="keterangan" rows="8" cols="80" class="form-control" placeholder="Keterangan" required> <?php echo $v_realisasi->keterangan; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Penanggung Jawab *</label>
                  <div class="col-lg-10">
                    <input type="text" name="penanggung_jawab" class="form-control" value="<?php echo $v_realisasi->penanggung_jawab; ?>" required maxlength="35" placeholder="Penanggung Jawab">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tanggal Evaluasi *</label>
                  <div class="col-lg-10">
                    <input type="date" name="tgl_evaluasi" class="form-control" value="<?php echo $v_realisasi->tgl_evaluasi; ?>" required placeholder="Tanggal Evaluasi">
                  </div>
                </div>
              </div>
            </div>


            <br>
            <hr>
            <a href="web/realisasi" class="btn btn-default">Back</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Save</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->