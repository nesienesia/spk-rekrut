<?php
//$ceks = $this->session->userdata('kamar@2017');
//$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row(); 
//var_dump($v_permohonan->row());exit;
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
                    <h5 class="panel-title">Edit Evaluasi Training</h5>
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
                    <form class="form-horizontal" action="" method="post">
                        <div class="col-md-12">
                            <div class="col-md-12">
                            <div class="form-group">
                                        <label class="control-label col-lg-2"><b>NRP *</b></label>
                                        <div class="col-lg-10">
                                            <input type="text" name="nrp" class="form-control" value="<?php echo $v_penilaian->nrp; ?>" required maxlength="35" placeholder="NRP">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-10"><b>1. Kualitas dan Kuantitas Kerja *</b></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kualitas</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="kualitas" class="form-control" value="<?php echo $v_penilaian->kualitas; ?>" required maxlength="35" placeholder="Score (1-100)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kuantitas</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="kuantitas" class="form-control" value="<?php echo $v_penilaian->kuantitas; ?>" required maxlength="35" placeholder="Score (1-100)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-10"><b>2. Kerjasama dan Kepemimpinan *</b></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kerjasama</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="kerjasama" class="form-control" value="<?php echo $v_penilaian->kerjasama; ?>" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kepemimpinan</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="kepemimpinan" class="form-control" value="<?php echo $v_penilaian->kepemimpinan; ?>" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-10"><b>3. Inisiatif dan Kreatifitas *</b></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kemandirian</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="kemandirian" class="form-control" value="<?php echo $v_penilaian->kemandirian; ?>" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">QCC</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="qcc" class="form-control" value="<?php echo $v_penilaian->qcc; ?>" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Sumbang Saran</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="sumbang_saran" class="form-control" value="<?php echo $v_penilaian->sumbang_saran; ?>" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-10"><b>4. Keandalan dan Tanggung Jawab *</b></label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="tanggung_jawab" class="form-control" value="<?php echo $v_penilaian->tanggung_jawab; ?>" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-10"><b>5. Kedisiplinan *</b></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Absensi</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="absensi" class="form-control" value="<?php echo $v_penilaian->absensi; ?>" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Penggunaan Waktu Kerja</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="waktu_kerja" class="form-control" value="<?php echo $v_penilaian->waktu_kerja; ?>" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Pelaksanaan Peraturan Perusanaan</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="pelaksanaan_peraturan" class="form-control" value="<?php echo $v_penilaian->pelaksanaan_peraturan; ?>" required maxlength="35" placeholder="Score (40-90)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kehadiran</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="40" max="90" name="kehadiran" class="form-control" value="<?php echo $v_penilaian->kehadiran; ?>" required placeholder="Score (40-90)">
                                        </div>
                                    </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Penanggung Jawab *</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="pj_dephead" class="form-control" value="<?php echo $v_penilaian->pj_dephead; ?>" required maxlength="35" placeholder="Penanggung Jawab">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Departemen *</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="dept" onchange="changeValue(this.value)" autofocus>
                                            <option value="">Pilih Departemen</option>
                                            <?php
                                            $jsArray = "var dtKamar = new Array();\n";
                                            foreach ($v_dept->result() as $baris) {
                                                if ($baris->nm_dep == $v_penilaian->dept) {
                                                    $select = "selected";
                                                } else {
                                                    $select = "";
                                                }
                                                echo '<option value="' . $baris->nm_dep . '" ' . $select . '>' . "$baris->nm_dep" . '</option>';
                                                $jsArray .= "dtKamar['" . $baris->nm_dep . "'] = {
                                                    dept:'" . addslashes($baris->nm_dep) . "'
                                      };\n";
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tanggal Pengisian *</label>
                                    <div class="col-lg-10">
                                        <input type="date" name="tgl_pengisian" class="form-control" value="<?php echo $v_penilaian->tgl_pengisian; ?>" required placeholder="Tanggal Pengisian">
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label col-lg-2">Catatan</label>
                                        <div class="col-lg-10">
                                            <textarea name="catatan" rows="8" cols="80" class="form-control" placeholder="Catatan "><?php echo $v_penilaian->catatan; ?></textarea>
                                        </div>
                                    </div>

                            </div>
                        </div>

                        <br>
                        <hr>
                        <hr>
                        <a href="web/penilaian" class="btn btn-default">Back</a>

                        <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Save</button>

                    </form>
                </div>
                <br>

            </div>
            <!-- /basic datatable -->
        </div>
        <!-- /dashboard content -->