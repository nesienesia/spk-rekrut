<?php
$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row();

//var_dump($v_persetujuan->result_array());exit;
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
            <?php
            if ($ceks->level == "director" || $ceks->level == "admin" || $ceks->level == "hrd") { ?>
              Permintaan Tenaga Kerja
            <?php
            } ?> (Persetujuan)</h5>
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
          if ($ceks->level == "director" || $ceks->level == "admin" || $ceks->level == "hrd") { ?>
            <form class="form-horizontal" action="" method="post">
              <div class="col-md-12">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label col-lg-2">Permintaan*</label>
                    <div class="col-lg-10">
                      <select class="form-control" name="id_permintaan" onchange="changeValue(this.value)" autofocus>
                        <option value="">Pilih Permintaan</option>
                        <?php
                          $jsArray = "var dtKamar = new Array();\n";
                          foreach ($v_permintaan->result() as $baris) {

                            echo '<option value="' . $baris->id_permintaan . '">' . "$baris->seksi [$baris->jabatan]" . '</option>';
                            $jsArray .= "dtKamar['" . $baris->id_permintaan . "'] = {
                                        id_permintaan:'" . addslashes($baris->id_permintaan) . "'
                                      };\n";
                          } ?>
                      </select>
                      <script type="text/javascript">
                        <?php echo $jsArray; ?>

                        function changeValue(id) {
                          document.getElementById('id_permintaan').value = dtKamar[id].id_permintaan;
                        };
                      </script>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Persetujuan *</label>
                    <div class="col-lg-10">
                      <input type="radio" name="persetujuan_ptk" value="Setuju" required> Setuju<br>
                      <input type="radio" name="persetujuan_ptk" value="Tidak" required> Tidak Setuju<br>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Keterangan</label>
                    <div class="col-lg-10">
                      <textarea name="ket_stj_ptk" rows="8" cols="80" class="form-control" placeholder="Keterangan" required></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">PIC Persetujuan *</label>
                    <div class="col-lg-10">
                      <input type="text" name="pic_ptk" class="form-control" value="" required maxlength="35" placeholder="PIC Persetujuan">
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
            <th width="10">Kode Persetujuan</th>
            <th>Seksi</th>
            <th>Jabatan</th>
            <th>Persetujuan</th>
            <th>Keterangan</th>
            <th>PIC Persetujuan </th>
            <?php
            if ($ceks->level == "director" || $ceks->level == "admin" || $ceks->level == "hrd") { ?>
              <th class="text-center" width="100"></th>
            <?php
            } ?>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($v_persetujuan->result() as $baris) {
              ?>
              <tr>
                <td><?php echo $baris->kd_persetujuanptk; ?></td>
                <td><?php echo $baris->seksi; ?></td>
                <td><?php echo $baris->jabatan; ?></td>
                <td><?php echo $baris->persetujuan_ptk; ?></td>
                <td><?php echo $baris->ket_stj_ptk; ?></td>
                <td><?php echo $baris->pic_ptk; ?></td>
                <?php
                  if ($ceks->level == "director" || $ceks->level == "admin" || $ceks->level == "hrd") { ?>
                  <td>
                    <a href="web/persetujuanptk_edit/<?php echo $baris->kd_persetujuanptk; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                    <a href="web/persetujuanptk_hapus/<?php echo $baris->kd_persetujuanptk; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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