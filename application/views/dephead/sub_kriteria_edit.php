<?php
//var_dump($v_sub_kriteria ->result_array());exit;
//var_dump($this->session->userdata());exit;
//var_dump($this->_ci_cached_vars);exit;
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
          <h5 class="panel-title">Edit Sub Kriteria</h5>
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
                  <label class="control-label col-lg-2">Nama Sub Kriteria *</label>
                  <div class="col-lg-10">
                    <input type="text" name="sub_kriteria" class="form-control" value="<?php echo $v_sub_kriteria->nama_sub_kriteria; ?>" required maxlength="35" placeholder="Nama Sub Kriteria">
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
                        if ($baris->id_kriteria == $v_sub_kriteria->id_kriteria) {
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
                  <label class="control-label col-lg-2">Nilai Sub Kriteria *</label>
                  <div class="col-lg-10">
                  <input type="number" min="1" max="5"  name="nilai_sub_kriteria" class="form-control" value="<?php echo $v_sub_kriteria->nilai_sub_kriteria; ?>" required maxlength="35" placeholder="Nilai (1-5)">
                 </div>
                </div>

                
              </div>
            </div>

            <br>
            <hr>
            <a href="web/sub_kriteria" class="btn btn-default">Back</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Save</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->