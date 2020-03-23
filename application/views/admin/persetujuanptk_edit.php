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
          <h5 class="panel-title">Edit Persetujuan</h5>
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
                  <label class="control-label col-lg-2">Permintaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="id_permintaan" id="id_permintaan" class="form-control" value="<?php echo $v_persetujuan->id_permintaan; ?>" required maxlength="35" placeholder="ID Training" readonly>
                  </div>
                </div>

          
                <div class="form-group">
                  <label class="control-label col-lg-2">Persetujuan</label>
                  <div class="col-lg-10">
                    <input type="radio" name="persetujuan_ptk" value="Setuju" <?php if ($v_persetujuan->persetujuan_ptk == 'Setuju') {
                                                                            echo 'checked';
                                                                          } ?>> Setuju<br>
                    <input type="radio" name="persetujuan_ptk" value="Tidak" <?php if ($v_persetujuan->persetujuan_ptk == 'Tidak') {
                                                                            echo 'checked';
                                                                          } ?>> Tidak<br>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Keterangan</label>
                  <div class="col-lg-10">
                    <textarea name="ket_stj_ptk" rows="8" cols="80" class="form-control" placeholder="Keterangan" required><?php echo $v_persetujuan->ket_stj_ptk; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">PIC Persetujuan</label>
                  <div class="col-lg-10">
                    <input type="text" name="pic_ptk" class="form-control" value="<?php echo $v_persetujuan->pic_ptk; ?>" required maxlength="35" placeholder="Personal In Charge">
                  </div>
                </div>

              </div>
            </div>

            <br>
            <hr>
            <a href="web/persetujuanptk" class="btn btn-default">Back</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Save</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->