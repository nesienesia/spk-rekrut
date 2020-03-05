<?php
$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row(); ?>
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
            if ($ceks->level == "hrd" || $ceks->level == "admin") { ?>
            Permohonan Training
            <?php
            } ?> (Kolom Realisasi)</h5>
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
          if ($ceks->level == "hrd" || $ceks->level == "admin") { ?>
          <form class="form-horizontal" action="" method="post">
            <div class="col-md-12">
              <div class="col-md-12">

                <div class="form-group">
                  <label class="control-label col-lg-2">Kode Persetujuan *</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="kd_persetujuan" onchange="changeValue(this.value)" autofocus>
                      <option value="">Kode Persetujuan</option>
                      <?php
                        $jsArray = "var dtKamar = new Array();\n";
                        foreach ($v_persetujuan->result() as $baris) {

                          echo '<option value="' . $baris->kd_persetujuan . '" ' . $select . '>' . "$baris->judul_training - $baris->nm_karyawan [$baris->persetujuan]" . '</option>';
                          $jsArray .= "dtKamar['" . $baris->kd_persetujuan . "'] = {
                                        kd_persetujuan:'" . addslashes($baris->kd_persetujuan) . "',
                                        no_permohonan:'" . addslashes($baris->no_permohonan) . "'
                                      };\n";
                        } ?>
                    </select>

                    <script type="text/javascript">
                      <?php echo $jsArray; ?>

                      function changeValue(id) {
                        document.getElementById('no_permohonan').value = dtKamar[id].no_permohonan;
                        document.getElementById('kd_persetujuan').value = dtKamar[id].kd_persetujuan;
                      };
                    </script>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">No Permohonan *</label>
                  <div class="col-lg-10">
                    <input type="text" name="no_permohonan" id="no_permohonan" class="form-control" value="" required maxlength="35" placeholder="No Permohonan" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Mengetahui *</label>
                  <div class="col-lg-10">
                    <input type="text" name="mengetahui" class="form-control" value="" required maxlength="35" placeholder="Mengetahui">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Lembaga Penyelenggara *</label>
                  <div class="col-lg-10">
                    <input type="text" name="lembaga_penyelenggara" id="lembaga_penyelenggara" class="form-control" value="" required maxlength="35" placeholder="Lembaga Penyelenggara">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tanggal Dimulai *</label>
                  <div class="col-lg-10">
                    <input type="date" name="tgl_training" class="form-control" value="" required placeholder="Tanggal Training">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tanggal Berakhir *</label>
                  <div class="col-lg-10">
                    <input type="date" name="tgl_akhir" class="form-control" value="" required placeholder="Tanggal Training">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Keterangan *</label>
                  <div class="col-lg-10">
                    <textarea name="keterangan" rows="8" cols="80" class="form-control" placeholder="Keterangan" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Penanggung Jawab *</label>
                  <div class="col-lg-10">
                    <input type="text" name="penanggung_jawab" class="form-control" value="" required maxlength="35" placeholder="Penanggung Jawab">
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Tanggal Evaluasi *</label>
                    <div class="col-lg-10">
                      <input type="date" name="tgl_evaluasi" class="form-control" value="" required placeholder="Tanggal Evaluasi">
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
              <th width="10">Kode Realisasi</th>
              <th>Persetujuan</th>
              <th>No Permohonan</th>
              <th>Mengetahui</th>
              <th>Lembaga Penyelenggara</th>
              <th>Tanggal Diawali</th>
              <th>Tanggal Berakhir</th>
              <th>Keterangan</th>
              <th>Penanggung Jawab</th>
              <th>Tanggal Evaluasi</th>
              <?php
              if ($ceks->level == "hrd" || $ceks->level == "admin") { ?>
              <th class="text-center" width="100"></th>
              <?php
              } ?>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($v_realisasi->result() as $baris) {
                ?>
              <tr>
                <td><?php echo $baris->kd_realisasi ?></td>
                <td><?php echo $baris->persetujuan; ?></td>
                <td><?php echo $baris->no_permohonan; ?></td>
                <td><?php echo $baris->mengetahui; ?></td>
                <td><?php echo $baris->lembaga_penyelenggara; ?></td>
                <td><?php echo date('d F Y', strtotime($baris->tgl_training)); ?></td>
                <td><?php echo date('d F Y', strtotime($baris->tgl_akhir)); ?></td>
                <td><?php echo $baris->keterangan; ?></td>
                <td><?php echo $baris->penanggung_jawab; ?></td>
                <td><?php echo date('d F Y', strtotime($baris->tgl_evaluasi)); ?></td>
                <?php
                  if ($ceks->level == "hrd" || $ceks->level == "admin") { ?>
                <td>
                  <a href="web/realisasi_edit/<?php echo $baris->kd_realisasi; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                  <a href="web/realisasi_hapus/<?php echo $baris->kd_realisasi; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a> &nbsp;
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