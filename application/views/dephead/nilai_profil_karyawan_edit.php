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
          <h5 class="panel-title">Edit Nilai Profil Karyawan</h5>
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
                  <label class="control-label col-lg-2">NRP *</label>
                  <div class="col-lg-10">
                    <input type="text" name="nrp" class="form-control" value="<?php echo $v_nilai_profil_karyawan->nrp; ?>" required maxlength="5" placeholder="NRP">
                  </div>
                </div>

              <div class="form-group">
                  <label class="control-label col-lg-2">Kriteria *</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="id_kriteria" onchange="changeValue(this.value)" autofocus>
                      <option value="">Pilih Kriteria</option>
                      <?php
                      $jsArray = "var dtKamar = new Array();\n";
                      foreach ($v_kriteria->result() as $baris) {
                        if ($baris->id_kriteria == $v_nilai_profil_karyawan->id_kriteria) {
                          $select = "selected";
                        } else {
                          $select = "";
                        }
                        echo '<option value="' . $baris->id_kriteria . '"' . $select . '>' . "$baris->nama_kriteria" . '</option>';
                          $jsArray .= "dtKamar['" . $baris->id_kriteria . "'] = {
                                        id_kriteria:'" . addslashes($baris->id_kriteria) . "'
                                      };\n";
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Sub Kriteria *</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="id_sub_kriteria" onchange="changeValue(this.value)" autofocus>
                      <option value="">Pilih Sub Kriteria</option>
                      <?php
                      $jsArray = "var dtKamar = new Array();\n";
                      foreach ($v_sub_kriteria->result() as $baris) {
                        if ($baris->id_sub_kriteria == $v_nilai_profil_karyawan->id_sub_kriteria) {
                          $select = "selected";
                        } else {
                          $select = "";
                        }
                        echo '<option value="' . $baris->id_sub_kriteria . '"' . $select . '>' . "$baris->nama_kriteria [$baris->nama_sub_kriteria]" . '</option>';
                          $jsArray .= "dtKamar['" . $baris->id_sub_kriteria . "'] = {
                                        id_sub_kriteria:'" . addslashes($baris->id_sub_kriteria) . "'
                                      };\n";
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Nilai Profil Karyawan *</label>
                  <div class="col-lg-10">
                  <input type="number" min="1" max="5" name="nilai_profil_karyawan" class="form-control" value="<?php echo $v_nilai_profil_karyawan->nilai_profil_karyawan; ?>" required maxlength="35" placeholder="Nilai (1-5)">
                 </div>
                </div>

                
              </div>
            </div>

            <br>
            <hr>
            <a href="web/nilai_profil_karyawan" class="btn btn-default">Back</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Save</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->