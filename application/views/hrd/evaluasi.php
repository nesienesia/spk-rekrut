<?php
$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row();

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
                        <?php
                        if ($ceks->level == "hrd" || $ceks->level == "admin") { ?>
                            Evaluasi Training
                        <?php
                        } ?> (HRD)</h5>
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
                                        <label class="control-label col-lg-2">ID Evaluasi Dephead *</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" name="id_evaluasidephead" onchange="changeValue(this.value)" autofocus>
                                                <option value="">Pilih ID Evaluasi Dephead</option>
                                                <?php
                                                    $jsArray = "var dtKamar = new Array();\n";
                                                    foreach ($v_evaluasidephead->result() as $baris) {

                                                        echo '<option value="' . $baris->id_evaluasidephead . '">' . "$baris->judul_training [$baris->nm_karyawan]" . '</option>';

                                                        $jsArray .= "dtKamar['" . $baris->id_evaluasidephead . "'] = {
                                                            
                                                            score:'" . addslashes($baris->score) . "',
                                                            rekomendasi:'" . addslashes($baris->rekomendasi) . "'
                                      };\n";
                                                    } ?>
                                            </select>

                                            <script type="text/javascript">
                                                <?php echo $jsArray; ?>

                                                function changeValue(id) {
                                                     document.getElementById('score').value = dtKamar[id].score;
                                                     document.getElementById('rekomendasi').value = dtKamar[id].rekomendasi;
                                                };
                                            </script>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Score *</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="score" id="score" class="form-control" value="" required maxlength="35" placeholder="Score" readonly >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Rekomendasi *</label>
                                        <div class="col-lg-10">
                                        <input type="text" name="rekomendasi" id="rekomendasi" class="form-control" value="" required maxlength="35" placeholder="Rekomendasi" readonly >
                                       </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Penanggung Jawab *</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="pj_hrd" class="form-control" value="" required maxlength="35" placeholder="Penanggung Jawab">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Tanggal Pengisian *</label>
                                        <div class="col-lg-10">
                                            <input type="date" name="tgl_eval" class="form-control" value="" required placeholder="Tanggal Pengisian">
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
                        <th width="10">ID Evaluasi</th>
                        <th>Lembaga Penyelenggara</th>
                        <th>Nama Karyawan</th>
                        <th>Score</th>
                        <th>Rekomendasi</th>
                        <th>Penanggung Jawab</th>
                        <th>Tanggal Evaluasi</th>

                        <?php
                        if ($ceks->level == "hrd" || $ceks->level == "admin") { ?>
                            <th class="text-center" width="100"></th>
                        <?php
                        } ?>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($v_evaluasi->result() as $baris) {
                            ?>
                            <tr>
                                <td><?php echo $baris->id_evaluasi; ?></td>
                                <td><?php echo $baris->lembaga_penyelenggara; ?></td>
                                <td><?php echo $baris->nm_karyawan; ?></td>
                                <td><?php echo $baris->score; ?></td>
                                <td><?php echo $baris->rekomendasi; ?></td>
                                <td><?php echo $baris->pj_hrd; ?></td>
                                <td><?php echo date('d F Y', strtotime($baris->tgl_eval)); ?></td>
                                <?php
                                    if ($ceks->level == "hrd" || $ceks->level == "admin") { ?>
                                    <td>
                                        <a href="web/evaluasi_edit/<?php echo $baris->id_evaluasi; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                                        <a href="web/evaluasi_hapus/<?php echo $baris->id_evaluasi; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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