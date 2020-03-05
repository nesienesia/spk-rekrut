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
          <h5 class="panel-title">Edit kriteria</h5>
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
                  <label class="control-label col-lg-2">Nama Kriteria *</label>
                  <div class="col-lg-10">
                    <input type="text" name="nama_kriteria" class="form-control" value="<?php echo $v_kriteria->nama_kriteria; ?>" required maxlength="35" placeholder="Nama kriteria">
                  </div>
                </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Jenis Kriteria *</label>
                    <div class="col-lg-10">
                    <input type="radio" name="jenis_kriteria" value="Core Factor" <?php if ($v_kriteria->jenis_kriteria =='Core Factor') {echo 'checked';} ?>
                    >Core Factor
                    <input type="radio" name="jenis_kriteria" value="Secondary Factor" <?php if ($v_kriteria->jenis_kriteria =='Secondary Factor') {echo 'checked';} ?>
                    >Secondary Factor
                    </div>
                  </div>



              </div>
            </div>

            <br>
            <hr>
            <a href="web/kriteria" class="btn btn-default">Back</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Save</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->