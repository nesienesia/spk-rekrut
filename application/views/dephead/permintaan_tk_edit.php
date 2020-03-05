<?php
//$ceks = $this->session->userdata('kamar@2017');
//$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row(); 
//var_dump($v_permohonan->row());exit;
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
                  <label class="control-label col-lg-2">Kebutuhan *</label>
                  <div class="col-lg-10">
                    <input type="text" name="id_uraian" class="form-control" value="<?php echo $v_permintaan->id_uraian; ?>" required maxlength="5" readonly>
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
                  <label class="control-label col-lg-2">Departemen Pemohon *</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="dept_pemohon_ptk" onchange="changeValue(this.value)" autofocus>
                      <option value="">Pilih Departemen</option>
                      <?php
                      $jsArray = "var dtKamar = new Array();\n";
                      foreach ($v_dept->result() as $baris) {
                        if ($baris->nm_dep == $v_permintaan->dept_pemohon_ptk) {
                          $select = "selected";
                        } else {
                          $select = "";
                        }
                        echo '<option value="' . $baris->nm_dep . '" ' . $select . '>' . "$baris->nm_dep" . '</option>';
                        $jsArray .= "dtKamar['" . $baris->nm_dep . "'] = {
                                                  dept_pemohon_ptk:'" . addslashes($baris->nm_dep) . "'
                                      };\n";
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Kota *</label>
                  <div class="col-lg-10">
                    <input type="text" name="kota" class="form-control" value="<?php echo $v_permintaan->kota; ?>" required maxlength="35" placeholder="Kota Pengisian Form">
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