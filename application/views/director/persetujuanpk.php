<?php
$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row();

//var_dump($v_penugasan->result_array());exit;
//var_dump($this->session->userdata());exit;
//var_dump($this->_ci_cached_vars);exit;
//var_dump($v_penugasan->row());exit;
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
              Penugasan Karyawan
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
                    <label class="control-label col-lg-2">ID Penugasan *</label>
                    <div class="col-lg-10">
                      <select class="form-control" name="id_penugasan" onchange="changeValue(this.value)" autofocus>
                        <option value="">Pilih Penugasan Karyawan</option>
                        <?php
                          $jsArray = "var dtKamar = new Array();\n";
                          foreach ($v_penugasan->result() as $baris) {

                            echo '<option value="' . $baris->id_penugasan . '">' . "$baris->dept - $baris->nm_karyawan  [$baris->penugasan]" . '</option>';
                            $jsArray .= "dtKamar['" . $baris->id_penugasan . "'] = {
                              nrp:'" . addslashes($baris->nrp) . "',
                                        dep_penugasan:'" . addslashes($baris->dep_penugasan) . "',
                                        seksi_penugasan:'" . addslashes($baris->seksi_penugasan) . "'
                                      };\n";
                          } ?>
                      </select>


                      <script type="text/javascript">
                        <?php echo $jsArray; ?>

                        function changeValue(id) {
                          document.getElementById('nrp').value = dtKamar[id].nrp;
                          document.getElementById('dep_penugasan').value = dtKamar[id].dep_penugasan;
                          document.getElementById('seksi_penugasan').value = dtKamar[id].seksi_penugasan;
                        };
                      </script>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">NRP *</label>
                    <div class="col-lg-10">
                      <input type="text" name="nrp" id="nrp" class="form-control" value="" required maxlength="5" placeholder="NRP" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Departemen Penugasan*</label>
                    <div class="col-lg-10">
                      <input type="text" name="dep_penugasan" id="dep_penugasan" class="form-control" value="" required maxlength="35" placeholder="Departemen Penugasan" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Seksi Penugasan *</label>
                    <div class="col-lg-10">
                      <input type="text" name="seksi_penugasan" id="seksi_penugasan" class="form-control" value="" required maxlength="35" placeholder="Seksi Penugasan" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Persetujuan *</label>
                    <div class="col-lg-10">
                      <input type="radio" name="persetujuan_pk" value="Setuju" required> Setuju<br>
                      <input type="radio" name="persetujuan_pk" value="Tidak" required> Tidak Setuju<br>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Keterangan</label>
                    <div class="col-lg-10">
                      <textarea name="ket_stj_pk" rows="8" cols="80" class="form-control" placeholder="Keterangan" required></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">PIC Persetujuan *</label>
                    <div class="col-lg-10">
                      <input type="text" name="pic_pk" class="form-control" value="" required maxlength="35" placeholder="PIC Persetujuan">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Menerima *</label>
                    <div class="col-lg-10">
                      <input type="text" name="menerima" class="form-control" value="" required maxlength="35" placeholder="Nama Yang Menerima (Dep.Head)">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Mengetahui *</label>
                    <div class="col-lg-10">
                      <input type="text" name="mengetahui" class="form-control" value="" required maxlength="35" placeholder="Nama Yang Mengetahui (HRD.Dep.Head)">
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
            <th>ID Penugasan</th>
            <th>Penugasan</th>
            <th>Departemen Penugasan</th>
            <th>Seksi Penugasan</th>
            <th>Tanggal Penugasan</th>
            <th>Nama Yang Menugaskan (Dephead)</th>

            <th>NRP</th>
            <th>Nama Karyawan</th>
            <th>Departemen Semula</th>

            <th>Persetujuan</th>
            <th>Keterangan</th>
            <th>PIC Persetujuan </th>
            <th>Nama Yang Menerima (Dephead)</th>
            <th>Mengetahui</th>


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
                <td><?php echo $baris->kd_persetujuanpk; ?></td>
                <td><?php echo $baris->id_penugasan; ?></td>
                <td><?php echo $baris->penugasan; ?></td>
                <td><?php echo $baris->dep_penugasan; ?></td>
                <td><?php echo $baris->seksi_penugasan; ?></td>
                <td><?php echo $baris->tgl; ?></td>
                <td><?php echo $baris->menugaskan; ?></td>

                <td><?php echo $baris->nrp; ?></td>
                <td><?php echo $baris->nm_karyawan; ?></td>
                <td><?php echo $baris->dept; ?></td>


                <td><?php echo $baris->persetujuan_pk; ?></td>
                <td><?php echo $baris->ket_stj_pk; ?></td>
                <td><?php echo $baris->pic_pk; ?></td>
                <td><?php echo $baris->menerima; ?></td>
                <td><?php echo $baris->mengetahui; ?></td>
                <?php
                  if ($ceks->level == "director" || $ceks->level == "admin" || $ceks->level == "hrd") { ?>
                  <td>
                    <a href="web/persetujuanpk_edit/<?php echo $baris->kd_persetujuanpk; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                    <a href="web/persetujuanpk_hapus/<?php echo $baris->kd_persetujuanpk; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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