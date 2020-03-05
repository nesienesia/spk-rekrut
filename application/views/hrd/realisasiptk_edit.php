<?php
//$ceks = $this->session->userdata('kamar@2017');
//$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row(); 
//var_dump($v_realisasiptk->result_array());exit;
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
                  <label class="control-label col-lg-2">Permintaan *</label>
                  <div class="col-lg-10">
                    <input type="text" name="kd_persetujuanptk"  class="form-control" value="<?php echo $v_realisasiptk->kd_persetujuanptk;?>" placeholder="No Permohonan" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Mengetahui *</label>
                  <div class="col-lg-10">
                    <input type="text" name="mengetahui_ptk" class="form-control" value="<?php echo $v_realisasiptk->mengetahui_ptk;?>" required maxlength="35" placeholder="Mengetahui">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Tenaga Kerja *</label>
                  <div class="col-lg-10">
                    <textarea name="nama_ptk" rows="8" cols="80" class="form-control" placeholder="Nama Tenaga Kerja" required><?php echo $v_realisasiptk->nama_ptk; ?></textarea>
                
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tanggal Training *</label>
                  <div class="col-lg-10">
                    <input type="date" name="tgl_ptk" class="form-control" value="<?php echo $v_realisasiptk->tgl_ptk; ?>" required placeholder="Tanggal Training">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Jabatan *</label>
                  <div class="col-lg-10">
                  <input type="text" name="ket_ptk" class="form-control" value="<?php echo $v_realisasiptk->ket_ptk; ?>" required maxlength="35" placeholder="Jabatan Karyawan Baru">
                   </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Penerima *</label>
                  <div class="col-lg-10">
                    <input type="text" name="pj_ptk" class="form-control" value="<?php echo $v_realisasiptk->pj_ptk; ?>" required maxlength="35" placeholder="Nama Penerima">
                  </div>
                </div>
              </div>
            </div>


            <br>
            <hr>
            <a href="web/realisasiptk" class="btn btn-default">Back</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Save</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->