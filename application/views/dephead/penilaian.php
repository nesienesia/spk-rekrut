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
                                        <input  type="number" min="1" max="100" name="kualitas" class="form-control" value="" required maxlength="35" placeholder="Score (1-100)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kuantitas</label>
                                        <div class="col-lg-10">
                                        <input  type="number" min="1" max="100" name="kuantitas" class="form-control" value="" required maxlength="35" placeholder="Score (1-100)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-10"><b>2. Kerjasama dan Kepemimpinan *</b></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kerjasama</label>
                                        <div class="col-lg-10">
                                            <input  type="number" min="1" max="100" name="kerjasama" class="form-control" value="" required maxlength="35" placeholder="Score (0-100)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kepemimpinan</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="1" max="100"  name="kepemimpinan" class="form-control" value="" required maxlength="35" placeholder="Score (0-100)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-10"><b>3. Inisiatif dan Kreatifitas *</b></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kemandirian</label>
                                        <div class="col-lg-10">
                                            <input  type="number" min="1" max="100" name="kemandirian" class="form-control" value="" required maxlength="35" placeholder="Score (0-100)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">QCC</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="1" max="100"  name="qcc" class="form-control" value="" required maxlength="35" placeholder="Score (0-100)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Sumbang Saran</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="1" max="100"  name="sumbang_saran" class="form-control" value="" required maxlength="35" placeholder="Score (0-100)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-10"><b>4. Keandalan dan Tanggung Jawab *</b></label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            <input  type="number" min="1" max="100" name="tanggung_jawab" class="form-control" value="" required maxlength="35" placeholder="Score (0-100)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-10"><b>5. Kedisiplinan *</b></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Absensi</label>
                                        <div class="col-lg-10">
                                            <input  type="number" min="1" max="100" name="absensi" class="form-control" value="" required maxlength="35" placeholder="Score (0-100)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Penggunaan Waktu Kerja</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="1" max="100" name="waktu_kerja" class="form-control" value="" required maxlength="35" placeholder="Score (0-100)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Pelaksanaan Peraturan Perusanaan</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="1" max="100" name="pelaksanaan_peraturan" class="form-control" value="" required maxlength="35" placeholder="Score (0-100)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kehadiran</label>    
                                        <div class="col-lg-10">
                                        <input type="number" min="1" max="100" name="kehadiran" class="form-control" value="" required  placeholder="Score (0-100)">
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

                                <td><?php echo $baris->kualitas; ?></td>
                                <td><?php echo $baris->kuantitas; ?></td>
                                <td><?php echo $baris->kerjasama; ?></td>
                                <td><?php echo $baris->kepemimpinan; ?></td>
                                <td><?php echo $baris->kemandirian; ?></td>
                                <td><?php echo $baris->qcc; ?></td>
                                <td><?php echo $baris->sumbang_saran; ?></td>
                                <td><?php echo $baris->tanggung_jawab; ?></td>
                                <td><?php echo $baris->absensi; ?></td>
                                <td><?php echo $baris->waktu_kerja; ?></td>
                                <td><?php echo $baris->pelaksanaan_peraturan; ?></td>
                                <td><?php echo $baris->kehadiran; ?></td>

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