<?php
$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row();

//var_dump($v_laporan->result_array());exit;
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
            Permohonan Training
            (Laporan Permohonan Training)</h5>
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
          <div class="cols-md-12">
            <a href="web/permohonan_training_csv/" title="CSV">Cetak Laporan Excel</a>
          </div>
          <?php
          } ?>
        </div>

        <div class="table-responsive">
          <table class="table datatable-basic" width="100%">
            <thead>
              <th width="10">No</th>
              <th>No Permohonan</th>
              <th>Nama Karyawan</th>
              <th>Departmen</th>

              <th>Judul Training</th>
              <th>Penyelenggara</th>
              <th>Tanggal Permohonan</th>

              <th>Persetujuan</th>
              <th>Keterangan Persetujuan</th>

              <th>Mengetahui</th>
              <th>Lembaga Penyelenggara</th>
              <th>Tanggal Dimulai</th>
              <th>Tanggal Berakhir</th>
              <th>Keterangan</th>
              <th>Penanggung Jawab</th>
              <th>Tanggal Evaluasi</th>
              <th>Cetak</th>

            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($v_laporan->result() as $baris) {
                ?>
              <tr>
                <td><?php echo $no . '.'; ?></td>
                <td><?php echo $baris->no_permohonan; ?></td>
                <td><?php echo $baris->nm_karyawan; ?></td>
                <td><?php echo $baris->dept; ?></td>

                <td><?php echo $baris->judul_training; ?></td>
                <td><?php echo $baris->penyelenggara; ?></td>
                <td><?php echo date('d F Y', strtotime($baris->tgl_permohonan)); ?></td>

                <td><?php echo $baris->persetujuan; ?></td>
                <td><?php echo $baris->keteranganstj; ?></td>

                <td><?php echo $baris->mengetahui; ?></td>
                <td><?php echo $baris->lembaga_penyelenggara; ?></td>
                <td><?php echo date('d F Y', strtotime($baris->tgl_training)); ?></td>
                <td><?php echo date('d F Y', strtotime($baris->tgl_akhir)); ?></td>
                <td><?php echo $baris->keterangan; ?></td>
                <td><?php echo $baris->penanggung_jawab; ?></td>
                <td><?php echo date('d F Y', strtotime($baris->tgl_evaluasi)); ?></td>

                <td>
                  <a href="web/laporan_pdf/<?php echo $baris->no_permohonan; ?>" title="Print"><span class="icon-printer2"></span></a>
                </td>

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