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
          <h5 class="panel-title">Edit Persetujuan Permintaan Tenaga Kerja</h5>
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
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="col-md-12">

                <div class="form-group">
                  <label class="control-label col-lg-2">ID Penugasan</label>
                  <div class="col-lg-10">
                    <input type="text" name="id_penugasan" class="form-control" value="<?php echo $v_persetujuan->id_penugasan; ?>" required maxlength="35" placeholder="ID Training" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Persetujuan</label>
                  <div class="col-lg-10">
                    <input type="radio" name="persetujuan_pks" value="Setuju" <?php if ($v_persetujuan->persetujuan_pks == 'Setuju') {
                                                                            echo 'checked';
                                                                          } ?>> Setuju<br>
                    <input type="radio" name="persetujuan_pks" value="Tidak" <?php if ($v_persetujuan->persetujuan_pks == 'Tidak') {
                                                                            echo 'checked';
                                                                          } ?>> Tidak<br>
                  </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Keterangan</label>
                    <div class="col-lg-10">
                      <textarea name="ket_stj_pks" rows="8" cols="80" class="form-control" placeholder="Keterangan" required> <?php echo $v_persetujuan->ket_stj_pks;?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">PIC Persetujuan *</label>
                    <div class="col-lg-10">
                      <input type="text" name="pic_pks" class="form-control" value="<?php echo $v_persetujuan->pic_pks;?>" required maxlength="35" placeholder="PIC Persetujuan">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Menerima *</label>
                    <div class="col-lg-10">
                      <input type="text" name="menerima" class="form-control" value="<?php echo $v_persetujuan->menerima;?>" required maxlength="35" placeholder="Nama Yang Menerima (Dep.Head)">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Mengetahui *</label>
                    <div class="col-lg-10">
                      <input type="text" name="mengetahui" class="form-control" value="<?php echo $v_persetujuan->mengetahui;?>" required maxlength="35" placeholder="Nama Yang Mengetahui (HRD.Dep.Head)">
                    </div>
                  </div>

              </div>
            </div>

            <br>
            <hr>
            <a href="web/persetujuanpks" class="btn btn-default">Back</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Save</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->