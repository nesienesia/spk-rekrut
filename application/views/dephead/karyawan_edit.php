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
          <h5 class="panel-title">Edit karyawan</h5>
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
                  <label class="control-label col-lg-2">NRP</label>
                  <div class="col-lg-10">
                    <input type="text" name="nrp" class="form-control" value="<?php echo $v_karyawan->nrp; ?>" required maxlength="4" placeholder="NRP" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Karyawan</label>
                  <div class="col-lg-10">
                    <input type="text" name="nm_karyawan" class="form-control" value="<?php echo $v_karyawan->nm_karyawan; ?>" required maxlength="35" placeholder="Nama karyawan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Departemen *</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="dept" onchange="changeValue(this.value)" autofocus>
                      <option value="">Pilih Departemen</option>
                      <?php
                      $jsArray = "var dtKamar = new Array();\n";
                      foreach ($v_dept->result() as $baris) {
                        if ($baris->nm_dep == $v_karyawan->dept) {
                          $select = "selected";
                        } else {
                          $select = "";
                        }
                        echo '<option value="' . $baris->nm_dep . '" ' . $select . '>' . "$baris->nm_dep" . '</option>';
                        $jsArray .= "dtKamar['" . $baris->nm_dep . "'] = {
                          dept:'" . addslashes($baris->nm_dep) . "'
                                      };\n";
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Seksi</label>
                  <div class="col-lg-10">
                    <input type="text" name="seksi" class="form-control" value="<?php echo $v_karyawan->seksi; ?>" required maxlength="35" placeholder="Seksi">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Golongan</label>
                  <div class="col-lg-10">
                    <input type="text" name="gol" class="form-control" value="<?php echo $v_karyawan->gol; ?>" required maxlength="35" placeholder="Golongan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Sub-Golongan</label>
                  <div class="col-lg-10">
                    <input type="text" name="subgol" class="form-control" value="<?php echo $v_karyawan->subgol; ?>" required maxlength="35" placeholder=" Sub-Golongan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Jabatan</label>
                  <div class="col-lg-10">
                    <input type="text" name="jab" class="form-control" value="<?php echo $v_karyawan->jab; ?>" required maxlength="35" placeholder="Jabatan">
                  </div>
                </div>
                
                
                <div class="form-group">
                    <label class="control-label col-lg-2">Pendidikan *</label>
                    <div class="col-lg-10">
                      <select class="form-control" name="pendidikan" onchange="changeValue(this.value)" autofocus>
                      <option value="<?php echo $v_karyawan->pendidikan; ?>" selected><?php echo $v_karyawan->pendidikan; ?></option>
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
                    <label class="control-label col-lg-2">Usia *</label>
                    <div class="col-lg-10">
                  <input type="number" min="1" max="100" class="form-control" name="usia" required="required"  placeholder="Usia" value="<?php echo $v_karyawan->usia; ?>">
                    </div>
                  </div>
                  
              </div>
            </div>

            <br>
            <hr>
            <a href="web/karyawan" class="btn btn-default">Back</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Save</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->