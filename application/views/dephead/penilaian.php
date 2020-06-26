<?php
$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row();

//var_dump($this->_ci_cached_vars);exit;
//var_dump($v_realisasi->row());exit;
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
                        if ($ceks->level == "dephead" || $ceks->level == "admin") { ?>
                            Penilaian Karaywan
                        <?php
                        } ?> </h5>
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
                    if ($ceks->level == "dephead" || $ceks->level == "admin") { ?>
                        <form class="form-horizontal" action="" method="post">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><b>NRP *</b></label>
                                        <div class="col-lg-10">
                                            <input type="text" name="nrp" class="form-control" value="" required maxlength="35" placeholder="NRP">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-10"><b>1. Kualitas dan Kuantitas Kerja *</b></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kualitas</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="kualitas" class="form-control" value="" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kuantitas</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="kuantitas" class="form-control" value="" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-10"><b>2. Kerjasama dan Kepemimpinan *</b></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kerjasama</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="kerjasama" class="form-control" value="" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kepemimpinan</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="kepemimpinan" class="form-control" value="" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-10"><b>3. Inisiatif dan Kreatifitas *</b></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kemandirian</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="kemandirian" class="form-control" value="" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">QCC</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="qcc" class="form-control" value="" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Sumbang Saran</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="sumbang_saran" class="form-control" value="" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-10"><b>4. Keandalan dan Tanggung Jawab *</b></label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="tanggung_jawab" class="form-control" value="" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-10"><b>5. Kedisiplinan *</b></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Absensi</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="absensi" class="form-control" value="" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Penggunaan Waktu Kerja</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="waktu_kerja" class="form-control" value="" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Pelaksanaan Peraturan Perusanaan</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="pelaksanaan_peraturan" class="form-control" value="" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kehadiran</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="kehadiran" class="form-control" value="" required placeholder="Score (40-90)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><b>Penanggung Jawab *</b></label>
                                        <div class="col-lg-10">
                                            <input type="text" name="pj_dephead" class="form-control" value="" required maxlength="35" placeholder="Penanggung Jawab">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><b>Departemen *</b></label>
                                        <div class="col-lg-10">
                                            <select class="form-control" name="dept" onchange="changeValue(this.value)" autofocus>
                                                <option value="">Pilih Departemen</option>
                                                <?php
                                                $jsArray = "var dtKamar = new Array();\n";
                                                foreach ($v_dept->result() as $baris) {
                                                    echo '<option value="' . $baris->nm_dep . '">' . "$baris->nm_dep" . '</option>';
                                                    $jsArray .= "dtKamar['" . $baris->nm_dep . "'] = {
                                        nm_dep:'" . addslashes($baris->nm_dep) . "'
                                      };\n";
                                                } ?>
                                            </select>
                                            <script type="text/javascript">
                                                <?php echo $jsArray; ?>

                                                function changeValue(id) {
                                                    document.getElementById('nm_dep').value = dtKamar[id].nm_dep;
                                                };
                                            </script>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><b>Tanggal Pengisian *</b></label>
                                        <div class="col-lg-10">
                                            <input type="date" name="tgl_pengisian" class="form-control" value="" required placeholder="Tanggal Pengisian">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><b>Catatan</b></label>
                                        <div class="col-lg-10">
                                            <textarea name="catatan" rows="8" cols="80" class="form-control" placeholder="Catatan "></textarea>
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
                        <th>NRP</th>
                        <th>Nama Karyawan</th>
                        <th>Kualitas</th>
                        <th>Kuantitas</th>
                        <th>Kerjasama</th>
                        <th>Kepemimpinan</th>
                        <th>Kemandirian</th>
                        <th>QCC</th>
                        <th>Sumbang Saran</th>
                        <th>Tanggung Jawab</th>
                        <th>Absensi</th>
                        <th>Penggunaan Waktu Kerja</th>
                        <th>Pelaksanaan Peraturan Perusanaan</th>
                        <th>Kehadiran</th>
                        <th>Nilai Mutu</th>
                        <th>Penanggung Jawab</th>
                        <th>Departemen</th>
                        <th>Tanggal Pengisian</th>
                        <th>Catatan</th>
                        <?php
                        if ($ceks->level == "dephead" || $ceks->level == "admin") { ?>
                            <th class="text-center" width="100"></th>
                        <?php
                        } ?>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($v_penilaian->result() as $baris) {
                        ?>
                            <tr>
                                <td><?php echo $baris->nrp; ?></td>
                                <td><?php echo $baris->nm_karyawan; ?></td>

                                <td> <?php if ($baris->kualitas >= "80") {
                                            echo 'Sangat Baik';
                                        } elseif ($baris->kualitas >= "70") {
                                            echo 'Baik';
                                        } elseif ($baris->kualitas >= "60") {
                                            echo 'Cukup';
                                        } elseif ($baris->kualitas >= "50") {
                                            echo 'Kurang';
                                        } elseif ($baris->kualitas >= "40") {
                                            echo 'Sangat Kurang';
                                        }
                                        ?></td>

                                <td> <?php if ($baris->kuantitas >= "80") {
                                            echo 'Sangat Baik';
                                        } elseif ($baris->kuantitas >= "70") {
                                            echo 'Baik';
                                        } elseif ($baris->kuantitas >= "60") {
                                            echo 'Cukup';
                                        } elseif ($baris->kuantitas >= "50") {
                                            echo 'Kurang';
                                        } elseif ($baris->kuantitas >= "40") {
                                            echo 'Sangat Kurang';
                                        }
                                        ?></td>

                                <td> <?php if ($baris->kerjasama >= "80") {
                                            echo 'Sangat Baik';
                                        } elseif ($baris->kerjasama >= "70") {
                                            echo 'Baik';
                                        } elseif ($baris->kerjasama >= "60") {
                                            echo 'Cukup';
                                        } elseif ($baris->kerjasama >= "50") {
                                            echo 'Kurang';
                                        } elseif ($baris->kerjasama >= "40") {
                                            echo 'Sangat Kurang';
                                        }
                                        ?></td>

                                <td> <?php if ($baris->kepemimpinan >= "80") {
                                            echo 'Sangat Baik';
                                        } elseif ($baris->kepemimpinan >= "70") {
                                            echo 'Baik';
                                        } elseif ($baris->kepemimpinan >= "60") {
                                            echo 'Cukup';
                                        } elseif ($baris->kepemimpinan >= "50") {
                                            echo 'Kurang';
                                        } elseif ($baris->kepemimpinan >= "40") {
                                            echo 'Sangat Kurang';
                                        }
                                        ?></td>

                                <td> <?php if ($baris->kemandirian >= "80") {
                                            echo 'Sangat Baik';
                                        } elseif ($baris->kemandirian >= "70") {
                                            echo 'Baik';
                                        } elseif ($baris->kemandirian >= "60") {
                                            echo 'Cukup';
                                        } elseif ($baris->kemandirian >= "50") {
                                            echo 'Kurang';
                                        } elseif ($baris->kemandirian >= "40") {
                                            echo 'Sangat Kurang';
                                        }
                                        ?></td>

                                <td> <?php if ($baris->qcc >= "80") {
                                            echo 'Sangat Baik';
                                        } elseif ($baris->qcc >= "70") {
                                            echo 'Baik';
                                        } elseif ($baris->qcc >= "60") {
                                            echo 'Cukup';
                                        } elseif ($baris->qcc >= "50") {
                                            echo 'Kurang';
                                        } elseif ($baris->qcc >= "40") {
                                            echo 'Sangat Kurang';
                                        }
                                        ?></td>

                                <td> <?php if ($baris->sumbang_saran >= "80") {
                                            echo 'Sangat Baik';
                                        } elseif ($baris->sumbang_saran >= "70") {
                                            echo 'Baik';
                                        } elseif ($baris->sumbang_saran >= "60") {
                                            echo 'Cukup';
                                        } elseif ($baris->sumbang_saran >= "50") {
                                            echo 'Kurang';
                                        } elseif ($baris->sumbang_saran >= "40") {
                                            echo 'Sangat Kurang';
                                        }
                                        ?></td>

                                <td> <?php if ($baris->tanggung_jawab >= "80") {
                                            echo 'Sangat Baik';
                                        } elseif ($baris->tanggung_jawab >= "70") {
                                            echo 'Baik';
                                        } elseif ($baris->tanggung_jawab >= "60") {
                                            echo 'Cukup';
                                        } elseif ($baris->tanggung_jawab >= "50") {
                                            echo 'Kurang';
                                        } elseif ($baris->tanggung_jawab >= "40"){
                                            echo 'Sangat Kurang';
                                        }
                                        ?></td>

                                <td> <?php if ($baris->absensi >= "80") {
                                            echo 'Sangat Baik';
                                        } elseif ($baris->absensi >= "70") {
                                            echo 'Baik';
                                        } elseif ($baris->absensi >= "60") {
                                            echo 'Cukup';
                                        } elseif ($baris->absensi >= "50") {
                                            echo 'Kurang';
                                        } elseif ($baris->absensi >= "40"){
                                            echo 'Sangat Kurang';
                                        }
                                        ?></td>

                                <td> <?php if ($baris->waktu_kerja >= "80") {
                                            echo 'Sangat Baik';
                                        } elseif ($baris->waktu_kerja >= "70") {
                                            echo 'Baik';
                                        } elseif ($baris->waktu_kerja >= "60") {
                                            echo 'Cukup';
                                        } elseif ($baris->waktu_kerja >= "50") {
                                            echo 'Kurang';
                                        } elseif ($baris->waktu_kerja >= "40"){
                                            echo 'Sangat Kurang';
                                        }
                                        ?></td>

                                <td> <?php if ($baris->pelaksanaan_peraturan >= "80") {
                                            echo 'Sangat Baik';
                                        } elseif ($baris->pelaksanaan_peraturan >= "70") {
                                            echo 'Baik';
                                        } elseif ($baris->pelaksanaan_peraturan >= "60") {
                                            echo 'Cukup';
                                        } elseif ($baris->pelaksanaan_peraturan >= "50") {
                                            echo 'Kurang';
                                        } elseif ($baris->pelaksanaan_peraturan >= "40"){
                                            echo 'Sangat Kurang';
                                        }
                                        ?></td>

                                <td> <?php if ($baris->kehadiran >= "80") {
                                            echo 'Sangat Baik';
                                        } elseif ($baris->kehadiran >= "70") {
                                            echo 'Baik';
                                        } elseif ($baris->kehadiran >= "60") {
                                            echo 'Cukup';
                                        } elseif ($baris->kehadiran >= "50") {
                                            echo 'Kurang';
                                        } elseif ($baris->kehadiran >= "40"){
                                            echo 'Sangat Kurang';
                                        }
                                        ?></td>
                                <td><?php echo $baris->rekomendasi; ?></td>
                                <td><?php echo $baris->pj_dephead; ?></td>
                                <td><?php echo $baris->nm_dep; ?></td>
                                <td><?php echo date('d F Y', strtotime($baris->tgl_pengisian)); ?></td>
                                <td><?php echo $baris->catatan; ?></td>

                                <?php
                                if ($ceks->level == "dephead" || $ceks->level == "admin") { ?>
                                    <td>
                                        <a href="web/penilaian_edit/<?php echo $baris->id_penilaian; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                                        <a href="web/penilaian_hapus/<?php echo $baris->id_penilaian; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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