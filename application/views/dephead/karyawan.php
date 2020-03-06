<?php
$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row();

//var_dump($this->session->userdata());exit;
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
          <h5 class="panel-title">
            <?php
            if ($ceks->level == "admin" || $ceks->level == "hrd") { ?>
              SISDM FSCM
            <?php
            } ?> (Data Karyawan)</h5>
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

          <?php
          if ($ceks->level == "admin" || $ceks->level == "hrd" || $ceks->level == "dephead") { ?>
            <h5>(Upload Data Disini)</h5>
            <form class="form-horizontal" action="<?php echo base_url(); ?>web/upload/" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label col-lg-2">Upload File </label>
                    <div class="col-lg-10">
                      <input type="file" name="file">
                    </div>
                  </div>
                </div>

                <input type="submit" value="Import" class="btn btn-primary" style="float:right;">
              </div>
              <hr>
            </form>


            <h5>(Insert Data Disini)</h5>

            <?php
            if ($ceks->level == "admin" || $ceks->level == "hrd") { ?>
              <form class="form-horizontal" action="" method="post">
                <div class="col-md-12">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label col-lg-2">NRP</label>
                      <div class="col-lg-10">
                        <input type="text" name="nrp" class="form-control" value="" required maxlength="5" placeholder="NRP karyawan" autofocus>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">Nama Karyawan</label>
                      <div class="col-lg-10">
                        <input type="text" name="nm_karyawan" class="form-control" value="" required maxlength="35" placeholder="Nama karyawan">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">Departemen *</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="dept" onchange="changeValue(this.value)" autofocus>
                          <option value="">Pilih Departmen</option>
                          <?php
                          $jsArray = "var dtKamar = new Array();\n";
                          foreach ($v_dept->result() as $baris) {
                            echo '<option value="' . $baris->nm_dep . '">' . "$baris->nm_dep" . '</option>';
                            $jsArray .= "dtKamar['" . $baris->nm_dep . "'] = {
                                        nm_dep:'" . addslashes($baris->nm_dep) . "'
                                      };\n";
                          } ?>
                        </select>
                        <script type="text/javascript">
                          <?php echo $jsArray; ?>

                          function changeValue(id) {
                            document.getElementById('nm_dep').value = dtKamar[id].nm_dep;
                          };
                        </script>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">Seksi</label>
                      <div class="col-lg-10">
                        <input type="text" name="seksi" class="form-control" value="" required maxlength="35" placeholder="Seksi">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">Golongan</label>
                      <div class="col-lg-10">
                        <input type="text" name="gol" class="form-control" value="" required maxlength="35" placeholder="Golongan">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2"> Sub-Golongan</label>
                      <div class="col-lg-10">
                        <input type="text" name="subgol" class="form-control" value="" required maxlength="35" placeholder="Sub-Golongan">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">Jabatan</label>
                      <div class="col-lg-10">
                        <input type="text" name="jab" class="form-control" value="" required maxlength="35" placeholder="Jabatan">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-lg-2">Pendidikan *</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="pendidikan" onchange="changeValue(this.value)" autofocus>
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
                      <label class="control-label col-lg-2">Pengalaman *</label>
                      <div class="col-lg-10">
                        <input type="radio" name="pengalaman" value="Fresh Graduate" required> Fresh Graduate<br>
                        <input type="radio" name="pengalaman" value="Pengalaman" required> Pengalaman<br>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-lg-2">Status *</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="status" onchange="changeValue(this.value)" autofocus>
                          <option value="">Pilih Pengalaman</option>
                          <option value="Kontrak">Kontrak</option>
                          <option value="Percobaan">Percobaan</option>
                          <option value="Magang">Magang</option>
                          <option value="PKL">PKL</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-lg-2">Usia *</label>
                      <div class="col-lg-10">
                        <input type="number" min="1" max="100" class="form-control" name="usia" required="required" placeholder="Usia">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-lg-2">Jenis Kelamin *</label>
                      <div class="col-lg-10">
                        <input type="radio" name="jk" value="Pria" />Pria
                        <input type="radio" name="jk" value="Wanita" />Wanita
                      </div>
                    </div>



                  </div>
                </div>

                <br>
                <hr>

                <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Save</button>

              </form>
        </div>
        <br>

        <hr>
      <?php
            } ?>
    <?php
          } ?>


    <div class="table-responsive">
      <table class="table datatable-basic" width="100%">
        <thead>
          <th width="10">No</th>
          <th>NRP</th>
          <th>Nama Karyawan</th>
          <th>Department</th>
          <th>Seksi</th>
          <?php
          if ($ceks->level == "admin" || $ceks->level == "hrd") { ?>
            <th>Golongan</th>
            <th>Sub Golongan</th>
            <th>Jabatan</th>
          <?php
          } ?>
          <?php
          if ($ceks->level == "admin" || $ceks->level == "hrd") { ?>
            <th class="text-center" width="100"></th>
          <?php
          } ?>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($v_karyawan->result() as $baris) {
          ?>
            <tr>
              <td><?php echo $no . '.'; ?></td>
              <td><?php echo $baris->nrp; ?></td>
              <td><?php echo $baris->nm_karyawan; ?></td>
              <td><?php echo $baris->dept; ?></td>
              <td><?php echo $baris->seksi; ?></td>
              <?php
              if ($ceks->level == "admin" || $ceks->level == "hrd") { ?>
                <td><?php echo $baris->gol; ?></td>
                <td><?php echo $baris->subgol; ?></td>
                <td><?php echo $baris->jab; ?></td>

                <td>
                  <a href="web/karyawan_edit/<?php echo $baris->nrp; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                  <a href="web/karyawan_hapus/<?php echo $baris->nrp; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
                </td>
              <?php
              } ?>
            </tr>
          <?php
            $no++;
          } ?>
        </tbody>
      </table>
    </div>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->