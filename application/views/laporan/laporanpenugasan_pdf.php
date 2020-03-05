<?php
$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row();

//var_dump($v_laporan->result_array($id = ''));exit;
//var_dump($this->session->userdata());exit;
//var_dump($this->_ci_cached_vars);exit;

?>

<!DOCTYPE html>
<html>

<head>
  <style>
    #brd {
      border: 1px solid black;
      text-align: center;
    }

    #red {
      border: 1px solid red;
      text-align: center;
    }

    #cntr {
      text-align: center;
    }
  </style>

<body>
  <table width="100%">
    <tr>
      <td id='cntr' rowspan=2><img src="assets/images/logofscm.jpg" alt="" style="width:120px;height:64px;"></td>
      <td id='cntr' rowspan=2>
        <h2>PENUGASAN KARYAWAN</h2>
      </td>
      <td id="brd" colspan=2>
        No. Dokumen : F-10.0-11-01
      </td>
    </tr>
    <tr>
      <td id="brd">No. Revisi : 2</td>
      <td id="brd">Tgl :xx-xx-2019</td>
    </tr>
  </table>
  <br>

  <table>
    <?php
    foreach ($v_laporanpenugasan->result() as $baris) {
      ?>
      <tr>
        <td colspan=3>Dalam rangka pelaksanaan tugas Manajemen, maka karyawan dibawah ini:</td>
      </tr>
    <?php } ?>
  </table>

  <table id="brd" width="100%">
    <thead>
      <th id="brd">No</th>
      <th id="brd">Nama</th>
      <th id="brd">NRP</th>
      <th id="brd">Departmen</th>
      <th id="brd">Seksi</th>
    </thead>
    <tr>
      <tbody>
        <?php
        $no = 1;
        foreach ($v_laporanpenugasan->result() as $baris1) {
          ?>
          <td id="brd"><?php echo $no; ?></td>
          <td id="brd"><?php echo $baris1->nm_karyawan; ?></td>
          <td id="brd"><?php echo $baris1->nrp; ?></td>
          <td id="brd"><?php echo $baris1->dep_dulu; ?></td>
          <td id="brd"><?php echo $baris1->seksi_dulu; ?></td>
        <?php
          $no++;
        }
        ?>

      </tbody>
    </tr>

  </table>

  <br>

  <table>
    <?php
    foreach ($v_laporanpenugasan->result() as $baris2) {
      ?>
      <tr>
        <td>Ditugaskan</td>
        <td>: <?php echo $baris2->penugasan; ?></td>
      </tr>

      <tr>
        <td>Department Penugasan</td>
        <td>: <?php echo $baris2->dep_penugasan; ?></td>
      </tr>

      <tr>
        <td>Seksi Penugasan</td>
        <td>: <?php echo $baris2->seksi_penugasan; ?></td>
      </tr>

      <tr>
        <td>Dari</td>
        <td>: <?php if ($baris2->penugasan == "Sementara") {
                  echo date('d F Y', strtotime($baris2->tgl_awal));
                } else {
                  echo '-';
                } ?></td>
      </tr>

      <tr>
        <td>Sampai</td>
        <td>: <?php if ($baris2->penugasan == "Sementara") {
                  echo date('d F Y', strtotime($baris2->tgl_awal));
                } else {
                  echo '-';
                } ?></td>
      </tr>

      <tr>
        <td colspan=3>Demikian penugasan ini disampaikan untuk dilaksanakan sebagaimana mestinya</td>
      </tr>


    <?php } ?>
  </table>
  <br>

  <table>
    <?php
    foreach ($v_laporanpenugasan->result() as $baris) {
      ?>
      <tr>
        <td><?php echo $baris2->kota; ?></td>
        <td>, <?php echo date('d F Y', strtotime($baris2->tgl)); ?></td>
      </tr>
    <?php } ?>
  </table>

  <table id="brd" width="100%">
    <thead>
      <th id="brd">Yang Menugaskan</th>
      <th id="brd">Yang Menerima</th>
      <th id="brd">Mengetahui</th>
    </thead>
    <tr>
      <tbody>
        <?php
        foreach ($v_laporanpenugasan->result() as $baris5) {
          ?>
          <td id="brd"><?php echo $baris5->menugaskan; ?></td>
          <td id="brd"><?php echo $baris5->menerima; ?></td>
          <td id="brd"><?php echo $baris5->mengetahui; ?></td>
        <?php }
        ?>
      </tbody>
    </tr>

  </table>
  <br><br>
  <table>
    <tr>
      <td id="red">
        DOKUMEN INI TELAH DIKETAHUI OLEH DEPARTEMEN YANG MENGAJUKAN
        DAN DISETUJUI OLEH HRD DEPARTMENT SERTA SESUAI DENGAN SOP
      </td>
    </tr>
  </table>
</body>

<head>

</html>