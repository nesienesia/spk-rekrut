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
                                    <label class="control-label col-lg-2">Kode Realisasi *</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="kd_realisasi" class="form-control" value="<?php echo $v_evaluasidephead->kd_realisasi; ?>" required maxlength="35" placeholder="Kode Realisasi" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2"><b>1. Aspek Perilaku *</b></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-14">Setelah menigkuti training / pelatihan, apakah peserta training mengalami perubahan perilaku yang positif berkaitan dengan materi training / pelatihan yang Ia terima?</label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2"> </label>
                                    <div class="col-lg-10">
                                        <input type="radio" name="aspek_perilaku" value="100" <?php if ($v_evaluasidephead->aspek_perilaku == 100) {
                                                                                                    echo 'checked';
                                                                                                } ?>> Ya<br>
                                        <input type="radio" name="aspek_perilaku" value="0" <?php if ($v_evaluasidephead->aspek_perilaku == 0) {
                                                                                                echo 'checked';
                                                                                            } ?>> Tidak<br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-10"><b>2. Aspek Kemampuan dan Pengetahuan *</b></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-10">a.Peserta menguasai materi training dan mampu menyampaikan pokok-pokok materi pada pihak lain</label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2"> </label>
                                    <div class="col-lg-10">
                                        <input type="text" name="aspek_a" class="form-control" value="<?php echo $v_evaluasidephead->aspek_a; ?>" required maxlength="35" placeholder="Score">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-12">b.Kemampuan dalam memberikan contoh / ilustrasi atau peragaan sehingga pihak lain dapat mudah memahami akan materi training yang disampaikan</label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2"></label>
                                    <div class="col-lg-10">
                                        <input type="text" name="aspek_b" class="form-control" value="<?php echo $v_evaluasidephead->aspek_b; ?>" required maxlength="35" placeholder="Score">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-10">c.Kemampuan mengaplikasikan hasil training di tempat kerja</label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2"></label>
                                    <div class="col-lg-10">
                                        <input type="text" name="aspek_c" class="form-control" value="<?php echo $v_evaluasidephead->aspek_c; ?>" required maxlength="35" placeholder="Score">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Penanggung Jawab *</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="pj_dephead" class="form-control" value="<?php echo $v_evaluasidephead->pj_dephead; ?>" required maxlength="35" placeholder="Penanggung Jawab">
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
                                                if ($baris->nm_dep == $v_evaluasidephead->dept) {
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
                                        <input type="date" name="tgl_dephead" class="form-control" value="<?php echo $v_evaluasidephead->tgl_dephead; ?>" required placeholder="Tanggal Pengisian">
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label col-lg-2">Catatan</label>
                                        <div class="col-lg-10">
                                            <textarea name="catatan" rows="8" cols="80" class="form-control" placeholder="Catatan "><?php echo $v_evaluasidephead->catatan; ?></textarea>
                                        </div>
                                    </div>

                            </div>
                        </div>

                        <br>
                        <hr>
                        <hr>
                        <a href="web/evaluasidephead" class="btn btn-default">Back</a>

                        <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Save</button>

                    </form>
                </div>
                <br>

            </div>
            <!-- /basic datatable -->
        </div>
        <!-- /dashboard content -->