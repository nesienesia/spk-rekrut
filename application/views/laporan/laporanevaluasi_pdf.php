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
        <h2>EVALUASI TRAINING</h2>
      </td>
        <td id="brd" colspan=2>
          No. Dokumen : F-10.0-01-03
        </td>
    </tr>
    <tr>
      <td id="brd">No. Revisi : 2</td>
      <td id="brd">Tgl :xx-xx-2019</td>
    </tr>
  </table>
<br><br>

    <table id="brd" width="100%">
        <thead>
            <th id="brd">NRP</th>
            <th id="brd">Nama Peserta</th>
            <th id="brd">Departemen</th>
            <th id="brd">Seksi</th>
            <th id="brd">Judul Training</th>
            <th id="brd">Penyelenggara</th>
            <th id="brd">Tanggal Dimulai</th>
            <th id="brd">Tanggal Berakhir</th>
        </thead>
        <tr>
            <tbody>
                <?php
                foreach ($v_laporanevaluasi->result() as $baris5) {
                    ?>
                    <td id="brd"><?php echo $baris5->nrp; ?></td>
                    <td id="brd"><?php echo $baris5->nm_karyawan; ?></td>
                    <td id="brd"><?php echo $baris5->nm_dep; ?></td>
                    <td id="brd"><?php echo $baris5->seksi; ?></td>
                    <td id="brd"><?php echo $baris5->judul_training; ?></td>
                    <td id="brd"><?php echo $baris5->penyelenggara; ?></td>
                    <td id="brd"><?php echo date('d F Y', strtotime($baris5->waktu)); ?></td>
                    <td id="brd"><?php echo date('d F Y', strtotime($baris5->waktu_akhir)); ?></td>
                <?php }
                ?>
            </tbody>
        </tr>

    </table>



    <table>
        <tr>
            <td>
                <h3>I. Penilaian Department<h3>
            </td>
        </tr>
        <?php
        foreach ($v_laporanevaluasi->result() as $baris) {
            ?>
            <tr>
                <td colspan=2>
                    <H4>Aspek Perilaku</h4>
                </td>
            </tr>
            <tr>
                <td colspan=2>Setelah menigkuti training / pelatihan, apakah peserta training mengalami perubahan perilaku yang positif berkaitan dengan materi training / pelatihan yang Ia terima?</td>
            </tr>
            <tr>
                <td> </td>
                <td id=brd><?php if ($baris->aspek_perilaku == "100") {
                                    echo 'Ya';
                                } else {
                                    echo 'Tidak';
                                } ?>
                </td>
            </tr>


            <tr>
                <td colspan=2>
                    <h4>Aspek Kemampuan & Pengetahuan</h4>
                </td>
            </tr>
            <tr>
                <td colspan=2>a. Peserta menguasai materi training dan mampu menyampaikan pokok-pokok materi pada pihak lain</td>
            </tr>
            <tr>
                <td> </td>
                <td id=brd><?php if ($baris->aspek_a == "100") {
                                    echo 'Baik Sekali';
                                } else if ($baris->aspek_a == "80") {
                                    echo 'Baik';
                                } else if ($baris->aspek_a == "60") {
                                    echo 'Cukup';
                                } else if ($baris->aspek_a == "40") {
                                    echo 'Kurang';
                                } else {
                                    echo 'Kurang Sekali';
                                } ?>
                </td>
            </tr>
            <tr>
                <td colspan=2>b. Kemampuan dalam memberikan contoh / ilustrasi atau peragaan sehingga pihak lain dapat mudah memahami akan materi training yang disampaikan</td>
            </tr>
            <tr>
                <td> </td>
                <td id=brd><?php if ($baris->aspek_b == "100") {
                                    echo 'Baik Sekali';
                                } else if ($baris->aspek_b == "80") {
                                    echo 'Baik';
                                } else if ($baris->aspek_b == "60") {
                                    echo 'Cukup';
                                } else if ($baris->aspek_b == "40") {
                                    echo 'Kurang';
                                } else {
                                    echo 'Kurang Sekali';
                                } ?></td>
            </tr>
            <tr>
                <td colspan=2>c. Kemampuan mengaplikasikan hasil training di tempat kerja</td>
            </tr>
            <tr>
                <td> </td>
                <td id=brd><?php if ($baris->aspek_c == "100") {
                                    echo 'Baik Sekali';
                                } else if ($baris->aspek_c == "80") {
                                    echo 'Baik';
                                } else if ($baris->aspek_c == "60") {
                                    echo 'Cukup';
                                } else if ($baris->aspek_c == "40") {
                                    echo 'Kurang';
                                } else {
                                    echo 'Kurang Sekali';
                                } ?></td>
            </tr>


            <tr>
                <td>Penanggung Jawab Department</td>
                <td>: <?php echo $baris->pj_dephead; ?></td>
            </tr>

            <tr>
                <td>Tanggal Pengisian</td>
                <td>: <?php echo date('d F Y', strtotime($baris->tgl_dephead)); ?></td>
            </tr>

            <tr>
                <td>Catatan</td>
                <td>: <?php echo $baris->catatan; ?></td>
            </tr>

            <tr>
                <td>
                    <h3>II. Penilaian HRD
            </tr>
            </td>
            </h3>

            <tr>
                <td>Perolehan Score</td>
                <td>: <?php echo $baris->score; ?></td>
            </tr>

            <tr>
                <td>Rekomendasi</td>
                <td>: <?php echo $baris->rekomendasi; ?></td>
            </tr>

            <tr>
                <td>Penanggung Jawab HRD</td>
                <td>: <?php echo $baris->pj_hrd; ?></td>
            </tr>


            <tr>
                <td>Tanggal Evaluasi</td>
                <td>: <?php echo date('d F Y', strtotime($baris->tgl_eval)); ?></td>
            </tr>




        <?php } ?>
    </table>





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