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
            Permohonan Training
            <?php
            } ?> (Persetujuan Director)</h5>
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
                  <label class="control-label col-lg-2">No Permohonan *</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="no_permohonan" onchange="changeValue(this.value)" autofocus>
                      <option value="">Pilih Permohonan Training</option>
                      <?php
                        $jsArray = "var dtKamar = new Array();\n";
                        foreach ($v_permohonan->result() as $baris) {

                          echo '<option value="' . $baris->no_permohonan . '">' . "$baris->judul_training [$baris->nm_karyawan]" . '</option>';
                          $jsArray .= "dtKamar['" . $baris->no_permohonan . "'] = {
                                        id_training:'" . addslashes($baris->id_training) . "', 
                                        nrp:'" . addslashes($baris->nrp) . "'
                                      };\n";
                        } ?>
                    </select>
                    <script type="text/javascript">
                      <?php echo $jsArray; ?>

                      function changeValue(id) {
                        document.getElementById('id_training').value = dtKamar[id].id_training;
                        document.getElementById('nrp').value = dtKamar[id].nrp;
                      };
                    </script>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">ID Training *</label>
                  <div class="col-lg-10">
                    <input type="text" name="id_training" id="id_training" class="form-control" value="" required maxlength="35" placeholder="ID Training" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">NRP Peserta *</label>
                  <div class="col-lg-10">
                    <input type="text" name="nrp" id="nrp" class="form-control" value="" required maxlength="5" placeholder="NRP Peserta" readonly>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-lg-2">Persetujuan *</label>
                  <div class="col-lg-10">
                    <input type="radio" name="persetujuan" value="Setuju" required> Setuju<br>
                    <input type="radio" name="persetujuan" value="Tidak" required> Tidak Setuju<br>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Keterangan</label>
                  <div class="col-lg-10">
                    <textarea name="keteranganstj" rows="8" cols="80" class="form-control" placeholder="Keterangan" required></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">PIC Persetujuan *</label>
                  <div class="col-lg-10">
                    <input type="text" name="pic" id="pic" class="form-control" value="" required maxlength="35" placeholder="PIC Persetujuan">
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
              <th>No Permohonan</th>

              <th>Judul Training</th>
              <th>Penyelenggara</th>
              <th>Tempat</th>
              <th>Waktu</th>
              <th>Biaya</th>
              <th>Tujuan</th>


              <th>NRP</th>
              <th>Nama Karyawan</th>


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
                <td><?php echo $baris->kd_persetujuan; ?></td>
                <td><?php echo $baris->no_permohonan; ?></td>

                <td><?php echo $baris->judul_training; ?></td>
                <td><?php echo $baris->penyelenggara; ?></td>
                <td><?php echo $baris->tempat; ?></td>
                <td><?php echo date('d F Y', strtotime($baris->waktu)); ?></td>
                <td><?php echo $baris->biaya; ?></td>
                <td><?php echo $baris->tujuan; ?></td>

                <td><?php echo $baris->nrp; ?></td>
                <td><?php echo $baris->nm_karyawan; ?></td>

                <td><?php echo $baris->persetujuan; ?></td>
                <td><?php echo $baris->keteranganstj; ?></td>
                <td><?php echo $baris->pic; ?></td>
                <?php
                  if ($ceks->level == "director"|| $ceks->level == "admin" || $ceks->level == "hrd") { ?>
                <td>
                  <a href="web/persetujuan_edit/<?php echo $baris->kd_persetujuan; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                  <a href="web/persetujuan_hapus/<?php echo $baris->kd_persetujuan; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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