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
                                    <label class="control-label col-lg-2">ID Evaluasi Dephead *</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="id_evaluasidephead" class="form-control" value="<?php echo $v_evaluasi->id_evaluasidephead; ?>" required maxlength="35" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Score *</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="score" class="form-control" value="<?php echo $v_evaluasi->score; ?>" required maxlength="35" placeholder="Score" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                        <label class="control-label col-lg-2">Rekomendasi *</label>
                                        <div class="col-lg-10">
                                        <input type="text" name="rekomendasi" class="form-control" value="<?php echo $v_evaluasi->rekomendasi; ?>" required maxlength="35" placeholder="Rekomendasi" readonly >
                                       </div>
                                    </div>



                                <div class="form-group">
                                    <label class="control-label col-lg-2">Penanggung Jawab *</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="pj_hrd" class="form-control" value="<?php echo $v_evaluasi->pj_hrd; ?>" required maxlength="35" placeholder="Penanggung Jawab">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tanggal Pengisian *</label>
                                    <div class="col-lg-10">
                                        <input type="date" name="tgl_eval" class="form-control" value="<?php echo $v_evaluasi->tgl_eval; ?>" required placeholder="Tanggal Pengisian">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <br>
                        <hr>
                        <a href="web/evaluasi" class="btn btn-default">Back</a>

                        <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Save</button>

                    </form>
                </div>
                <br>

            </div>
            <!-- /basic datatable -->
        </div>
        <!-- /dashboard content -->