<?php
$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row();

//var_dump($v_nilai_profil_karyawan->result_array());exit;
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
          <h5 class="panel-title">
           Sub Kriteria</h5>
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
          if ($ceks->level == "director" || $ceks->level == "admin" || $ceks->level == "hrd" ) { ?>
          <form class="form-horizontal" action="" method="post">
            <div class="col-md-12">
              <div class="col-md-12">

              <div class="form-group">
                  <label class="control-label col-lg-2">NRP *</label>
                  <div class="col-lg-10">
                    <input type="text" name="nrp" class="form-control" value="" required maxlength="5" placeholder="NRP">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Kriteria *</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="id_kriteria" onchange="changeValue(this.value)" autofocus>
                      <option value="">Pilih Kriteria</option>
                      <?php
                        $jsArray = "var dtKamar = new Array();\n";
                        foreach ($v_kriteria->result() as $baris) {

                          echo '<option value="' . $baris->id_kriteria . '">' . "$baris->nama_kriteria" . '</option>';
                          $jsArray .= "dtKamar['" . $baris->id_kriteria . "'] = {
                                        id_kriteria:'" . addslashes($baris->id_kriteria) . "'
                                      };\n";
                        } ?>
                    </select>
                    <script type="text/javascript">
                      <?php echo $jsArray; ?>

                      function changeValue(id) {
                        document.getElementById('id_kriteria').value = dtKamar[id].id_kriteria;
                      };
                    </script>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Sub Kriteria *</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="id_kriteria" onchange="changeValue(this.value)" autofocus>
                      <option value="">Pilih Sub Kriteria</option>
                      <?php
                        $jsArray = "var dtKamar = new Array();\n";
                        foreach ($v_sub_kriteria->result() as $baris) {

                          echo '<option value="' . $baris->id_sub_kriteria . '">' . "$baris->nama_sub_kriteria" . '</option>';
                          $jsArray .= "dtKamar['" . $baris->id_sub_kriteria . "'] = {
                                        id_sub_kriteria:'" . addslashes($baris->id_sub_kriteria) . "'
                                      };\n";
                        } ?>
                    </select>
                    <script type="text/javascript">
                      <?php echo $jsArray; ?>

                      function changeValue(id) {
                        document.getElementById('id_sub_kriteria').value = dtKamar[id].id_sub_kriteria;
                      };
                    </script>
                  </div>
                </div>

               
                <div class="form-group">
                  <label class="control-label col-lg-2">Nilai Profil Karyawan *</label>
                  <div class="col-lg-10">
                  <input type="number" min="1" max="5"  name="nilai_profil_karyawan" class="form-control" value="" required maxlength="35" placeholder="Nilai (1-5)">
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


        <div class="table-responsive">
          <table class="table datatable-basic" width="100%">
            <thead>
              <th width="10">No</th>
              <th>Nama Karyawan</th>
              <th>Nama Kriteria</th>
              <th>Nama Sub Kriteria</th>
              <th>Nilai Sub Kriteria</th>
              
              <?php
              if ($ceks->level == "director" || $ceks->level == "admin" || $ceks->level == "hrd") { ?>
              <th class="text-center" width="100"></th>
              <?php
              } ?>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($v_nilai_profil_karyawan->result() as $baris) {
                ?>
              <tr>
                <td><?php echo $baris->id_nilai_profil_karyawan; ?></td>
                <td><?php echo $baris->nm_karyawan; ?></td>
                <td><?php echo $baris->nama_kriteria; ?></td>
                <td><?php echo $baris->nama_sub_kriteria; ?></td>
                <td><?php echo $baris->nilai_profil_karyawan; ?></td>
               
                <?php
                  if ($ceks->level == "director"|| $ceks->level == "admin" || $ceks->level == "hrd") { ?>
                <td>
                  <a href="web/nilai_profil_karyawan_edit/<?php echo $baris->id_nilai_profil_karyawan; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                  <a href="web/nilai_profil_karyawan_hapus/<?php echo $baris->id_nilai_profil_karyawan; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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