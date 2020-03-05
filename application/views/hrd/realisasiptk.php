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
            Permintaan Tenaga Kerja
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
                    <label class="control-label col-lg-2">Permintaan *</label>
                    <div class="col-lg-10">
                      <select class="form-control" name="kd_persetujuanptk" onchange="changeValue(this.value)" autofocus>
                        <option value="">Pilih Permintaan</option>
                        <?php
                          $jsArray = "var dtKamar = new Array();\n";
                          foreach ($v_persetujuan->result() as $baris) {

                            echo '<option value="' . $baris->kd_persetujuanptk . '">' . "$baris->seksi - $baris->jabatan [$baris->persetujuan_ptk]" . '</option>';
                            $jsArray .= "dtKamar['" . $baris->kd_persetujuanptk . "'] = {
                                        kd_persetujuanptk:'" . addslashes($baris->kd_persetujuanptk) . "'
                                      };\n";
                          } ?>
                      </select>
                      <script type="text/javascript">
                        <?php echo $jsArray; ?>

                        function changeValue(id) {
                          document.getElementById('kd_persetujuanptk').value = dtKamar[id].kd_persetujuanptk;
                        };
                      </script>
                    </div>
                  </div>

                <div class="form-group">
                  <label class="control-label col-lg-2">Mengetahui *</label>
                  <div class="col-lg-10">
                    <input type="text" name="mengetahui_ptk" class="form-control" value="" required maxlength="35" placeholder="Mengetahui">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Tenaga Kerja *</label>
                  <div class="col-lg-10">
                    <textarea name="nama_ptk" rows="8" cols="80" class="form-control" placeholder="Nama Tenaga Kerja" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tanggal Realisasi *</label>
                  <div class="col-lg-10">
                    <input type="date" name="tgl_ptk" class="form-control" value="" required placeholder="Tanggal Realisasi">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Jabatan *</label>
                  <div class="col-lg-10">
                  <input type="text" name="ket_ptk" class="form-control" value="" required maxlength="35" placeholder="Jabatan Karyawan Baru">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Penerima *</label>
                  <div class="col-lg-10">
                    <input type="text" name="pj_ptk" class="form-control" value="" required maxlength="35" placeholder="Nama Penerima">
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
              <th width="10">ID Realisasi</th>
              <th>Divisi Permintaan</th>
              <th>Mengetahui</th>
              <th>Nama Tenaga kerja</th>
              <th>Tanggal Permintaan</th>
              <th>Jabatan</th>
              <th>Penanggung Jawab</th>
              <?php
              if ($ceks->level == "hrd" || $ceks->level == "admin") { ?>
              <th class="text-center" width="100"></th>
              <?php
              } ?>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($v_realisasiptk->result() as $baris) {
                ?>
              <tr>
                <td><?php echo $baris->id_realisasiptk ?></td>
                <td><?php echo $baris->divisi; ?></td>
                <td><?php echo $baris->mengetahui_ptk; ?></td>
                <td><?php echo $baris->nama_ptk; ?></td>
                <td><?php echo date('d F Y', strtotime($baris->tgl_ptk)); ?></td>
                <td><?php echo $baris->ket_ptk; ?></td>
                <td><?php echo $baris->pj_ptk; ?></td>
                <?php
                  if ($ceks->level == "hrd" || $ceks->level == "admin") { ?>
                <td>
                  <a href="web/realisasiptk_edit/<?php echo $baris->id_realisasiptk; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                  <a href="web/realisasiptk_hapus/<?php echo $baris->id_realisasiptk; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a> &nbsp;
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