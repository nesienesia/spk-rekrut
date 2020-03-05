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
        <h2>PERMOHONAN TRAINING </h2>
      </td>
      <td id="brd" colspan=2>
        No. Dokumen : F-10.0-01-01
      </td>
    </tr>
    <tr>
      <td id="brd">No. Revisi : 2</td>
      <td id="brd">Tgl :xx-xx-2019</td>
    </tr>
  </table>



  <table>
    <tr>
      <td colspan=2>
        <h3>I. Data Calon Peserta<h3>
      </td>
    </tr>
    <?php
    foreach ($v_laporan->result() as $baris) {
      ?>
      <tr>
        <td>Nama Peserta</td>
        <td>: <?php echo $baris->nm_karyawan; ?></td>
      </tr>

      <tr>
        <td>NRP Peserta</td>
        <td>: <?php echo $baris->nrp; ?></td>
      </tr>

      <tr>
        <td>Departmen Peserta</td>
        <td>: <?php echo $baris->dept; ?></td>
      </tr>

      <tr>
        <td>Seksi Peserta</td>
        <td>: <?php echo $baris->seksi; ?></td>
      </tr>

      <tr>
        <td>Golongan Peserta</td>
        <td>: <?php echo $baris->gol; ?></td>
      </tr>

      <tr>
        <td>Jabatan Peserta</td>
        <td>: <?php echo $baris->jab; ?></td>
      </tr>


      <tr>
        <td>
          <h3>II. Jenis Training
      </tr>
      </td>
      </h3>



      <tr>
        <td>Judul Training</td>
        <td>: <?php echo $baris->judul_training; ?></td>
      </tr>

      <tr>
        <td>Penyelenggara</td>
        <td>: <?php echo $baris->penyelenggara; ?></td>
      </tr>

      <tr>
        <td>Tempat Training</td>
        <td>: <?php echo $baris->tempat; ?></td>
      </tr>

      <tr>
        <td>Waktu Training</td>
        <td>: <?php echo date('d F Y', strtotime($baris->waktu)); ?></td>
      </tr>

      <tr>
        <td>Biaya Training</td>
        <td>: <?php echo $baris->biaya; ?></td>

      <tr>
        <td>
          <h3>III. Permohonan
      </tr>
      </td>
      </h3>


      <tr>
        <td>Tujuan Permohonan</td>
        <td>: <?php echo $baris->tujuan; ?></td>
      </tr>
      <tr>
        <td>NRP Pemohon</td>
        <td>: <?php echo $baris->nrp_pemohon; ?></td>
      </tr>
      <tr>
        <td>Nama Pemohon</td>
        <td>: <?php echo $baris->pemohon; ?></td>
      </tr>
      <tr>
        <td>Department Pemohon</td>
        <td>: <?php echo $baris->dept_pemohon; ?></td>
      </tr>
      <tr>
        <td>Tanggal Permohonan</td>
        <td>: <?php echo date('d F Y', strtotime($baris->tgl_permohonan)); ?></td>
      </tr>
    <?php } ?>
  </table>

  <table>
    <?php
    foreach ($v_laporan->result() as $baris4) {
      ?>
      <tr>
        <td>
          <h3>IV. Persetujuan
      </tr>
      </td>
      </h3>


      <tr>
        <td>Permohonan ini telah <b>disetujui</b>.</td>
      </tr>

      <tr>
        <td>Keterangan : <?php echo $baris4->keteranganstj; ?></td>
      </tr>

    <?php } ?>
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
  <br><br><br><br><br><br>


  <h3>V. Realisasi</h3>
  <table id="brd" width="100%">

    <thead>
      <th id="brd">Mengetahui</th>
      <th id="brd">Lembaga Penyelenggara</th>
      <th id="brd">Tanggal Training</th>
      <th id="brd">Keterangan</th>
      <th id="brd">Penanggung Jawab</th>
    </thead>
    <tr>
      <tbody>
        <?php
        foreach ($v_laporan->result() as $baris5) {
          ?>
          <td id="brd"><?php echo $baris5->mengetahui; ?></td>
          <td id="brd"><?php echo $baris5->lembaga_penyelenggara; ?></td>
          <td id="brd"><?php echo date('d F Y', strtotime($baris5->tgl_training)); ?></td>
          <td id="brd"><?php echo $baris5->keterangan; ?></td>
          <td id="brd"><?php echo $baris5->penanggung_jawab; ?></td>
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
  <br><br>




</body>

<head>

</html>