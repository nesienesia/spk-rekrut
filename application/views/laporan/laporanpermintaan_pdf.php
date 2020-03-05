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
        <h2>PERMINTAAN TENAGA KERJA</h2>
      </td>
      <td id="brd" colspan=2>
        No. Dokumen : F-10.0-02-01
      </td>
    </tr>
    <tr>
      <td id="brd">No. Revisi : 5</td>
      <td id="brd">Tgl :xx-xx-2019</td>
    </tr>
  </table>
 
  <h3>I. Kebutuhan Tenaga Kerja<h3>
      <table>
        <tr>
          <td> </td>
        </tr>
        <?php
        foreach ($v_laporanpermintaan->result() as $baris) {
          ?>
          <tr>
            <td>Divisi</td>
            <td>: <?php echo $baris->divisi; ?></td>
          </tr>
 
          <tr>
            <td>Department </td>
            <td>: <?php echo $baris->department; ?></td>
          </tr>
 
          <tr>
            <td>Seksi</td>
            <td>: <?php echo $baris->seksi; ?></td>
          </tr>
 
          <tr>
            <td>Jabatan</td>
            <td>: <?php echo $baris->jabatan; ?></td>
          </tr>
 
          <tr>
            <td>Golongan</td>
            <td>: <?php echo $baris->golongan; ?></td>
          </tr>
 
          <tr>
            <td>Sumber Tenaga</td>
            <td>: <?php echo $baris->sumber_tenaga; ?></td>
          </tr>
 
          <tr>
            <td>Jumlah</td>
            <td>: <?php echo $baris->jumlah; ?> orang</td>
          </tr>
 
          <tr>
            <td>Due Date</td>
            <td>: <?php echo date('d F Y', strtotime($baris->due_date)); ?></td>
          </tr>
 
          <tr>
            <td>Tujuan</td>
            <td>: <?php echo $baris->tujuan; ?></td>
          </tr>
 
          <tr>
            <td>Atas Nama Penggantian</td>
            <td>: <?php if ($baris->an == null) {
                      echo '-';
                    } else {
                      echo $baris->an;
                    } ?></td>
          </tr>
 
          <tr>
            <td>Alasan Penambahan</td>
            <td>: <?php if ($baris->alasan == null) {
                      echo '-';
                    } else {
                      echo $baris->alasan;
                    } ?></td>
          </tr>
 
          <tr>
            <td>
              <h3>II. Kualifikasi
          </tr>
          </td>
    </h3>
 
    <tr>
      <td>Pendidikan</td>
      <td>: <?php echo $baris->pendidikan; ?></td>
    </tr>
 
    <tr>
      <td>Jurusan</td>
      <td>: <?php echo $baris->jurusan; ?></td>
    </tr>
 
    <tr>
      <td>Pengalaman</td>
      <td>: <?php echo $baris->pengalaman; ?></td>
    </tr>
 
    <tr>
      <td>Lama Pengalaman</td>
      <td>: <?php if ($baris->lama_pengalaman == null) {
                echo '-';
              } else {
                echo $baris->lama_pegalaman;
              } ?></td>
    </tr>
 
    <tr>
      <td>Bidang Pengalaman</td>
      <td>: <?php if ($baris->bidang_pengalaman == null) {
                echo '-';
              } else {
                echo $baris->bidang_pengalaman;
              } ?></td>
    </tr>
 
    <tr>
      <td>Status</td>
      <td>: <?php echo $baris->status; ?></td>
    </tr>
 
    <tr>
      <td>Lama Kontrak</td>
      <td>: <?php if ($baris->status_kontrak == null) {
                echo '-';
              } else {
                echo $baris->status_kontrak;
              } ?></td>
    </tr>
 
    <tr>
      <td>Jenis Kelamin</td>
      <td>: <?php echo $baris->jk; ?></td>
    </tr>
 
    <tr>
      <td>Batas Usia</td>
      <td>: <?php echo $baris->batas_usia; ?> </td>
    </tr>
 
    <tr>
      <td>Skill & Knowledge Khusus</td>
 
      <td>: <?php echo $baris->skill; ?></td>
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
  <table>
    <tr>
      <td>
        <h3>III. Uraian Singkat
    </tr>
    </td>
  </h3>
 
  <tr>
    <td>Bertanggung Jawab</td>
    <td>: <?php echo $baris->bertanggungjawab; ?> </td>
  </tr>
  <tr>
    <td>Memiliki Bawahan</td>
    <td>: <?php echo $baris->bawahan; ?> </td>
  </tr>
  <tr>
    <td>Jumlah Bawahan</td>
    <td>: <?php if ($baris->jml_bawahan == null) {
            echo '-';
          } else {
            echo $baris->jml_bawahan;
          } ?></td>
  </tr>
  <tr>
    <td>Tugas Pokok</td>
    <td>: <?php echo $baris->tgs_pokok; ?>
    <td>
  </tr>
 
  <tr>
    <td>
      <h3>IV. Persetujuan<h3>
    </td>
  </tr>
  <?php
  foreach ($v_laporanpermintaan->result() as $baris) {
    ?>
    <tr>
      <td colspan=2>Laporan ini telah <b>disetujui</b>. </td>
    </tr>
 
    <tr>
      <td>Keterangan </td>
      <td>: <?php echo $baris->ket_stj_ptk; ?></td>
    </tr>
 
    <tr>
      <td>PIC Persetujuan</td>
      <td>: <?php echo $baris->pic_ptk; ?></td>
    </tr>
 
  <br>
<tr>
<td>
  <h3>IV. Realisasi</h3>
  </td>
  </tr>
      <tr>
      <td>Nama Tenaga Kerja</td>
      <td>: <?php echo $baris->nama_ptk; ?></td>
    </tr>
    <tr>
      <td>Divisi</td>
      <td>: <?php echo $baris->divisi; ?></td>
    </tr>
    <tr>
      <td>Departemen</td>
      <td>: <?php echo $baris->department; ?></td>
    </tr>
    <tr>
      <td>Seksi</td>
      <td>: <?php echo $baris->seksi; ?></td>
    </tr>
    <?php }
        ?>
  </table>
  
  <table>
    <?php
    foreach ($v_laporanpermintaan->result() as $baris5) {
      ?>
      <tr>
        <td><?php echo $baris5->kota; ?></td>
        <td>, <?php echo date('d F Y', strtotime($baris5->tgl_permintaan)); ?></td>
      </tr>
      <?php }
        ?>
  </table>
  <table id="brd" width="100%">
    <thead>
 
      <th id="brd">Tanggal Masuk</th>
      <th id="brd">Jabatan</th>
      <th id="brd">Mengetahui</th>
      <th id="brd">Yang Menerima</th>
    </thead>
    <tr>
      <tbody>
        <?php
        foreach ($v_laporanpermintaan->result() as $baris5) {
          ?>
 
          <td id="brd"><?php echo date('d F Y', strtotime($baris5->tgl_ptk)); ?></td>
          <td id="brd"><?php echo $baris5->ket_ptk; ?></td>
          <td id="brd"><?php echo $baris5->mengetahui_ptk; ?></td>
          <td id="brd"><?php echo $baris5->pj_ptk; ?></td>
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

