<?php
$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row();

//var_dump($v_laporan->result_array());exit;
//var_dump($this->session->userdata());exit;
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
                        Evaluasi Training
                        (Laporan Evaluasi Training)</h5>
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
                        <div class="cols-md-12">
                            <a href="web/evaluasi_csv/" title="CSV">Cetak Laporan Excel</a>
                        </div>
                    <?php
                    } ?>
                </div>

                <div class="table-responsive">
                    <table class="table datatable-basic" width="100%">
                        <thead>
                            <th width="10">ID Evaluasi</th>
                            <th>Nama Karyawan</th>
                            <th>Department</th>
                            <th>Seksi</th>
                            <th>Judul Training</th>
                            <th>Penyelenggara</th>
                            <th>NRP</th>
                            <th>Tanggal Training</th>

                            <th>Aspek Perilaku</th>
                            <th>Aspek A</th>
                            <th>Aspek B</th>
                            <th>Aspek C</th>
                            <th>Penanggung Jawab Dephead</th>
                            <th>Tanggal Pengisian</th>
                            <th>Catatan</th>

                            <th>Score</th>
                            <th>Rekomendasi</th>
                            <th>Penanggung Jawab HRD</th>
                            <th>Tanggal Evaluasi</th>
                            

                            
                            <?php
                            if ($ceks->level == "dephead" || $ceks->level == "admin"  || $ceks->level == "hrd") { ?>
                                <th class="text-center" width="100"></th>
                            <?php
                            } ?>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($v_laporanevaluasi->result() as $baris) {
                                ?>
                                <tr>
                                    <td><?php echo $baris->id_evaluasi; ?></td>
                                    <td><?php echo $baris->nm_karyawan; ?></td>
                                    <td><?php echo $baris->nm_dep; ?></td>
                                    <td><?php echo $baris->seksi; ?></td>
                                    
                                    <td><?php echo $baris->judul_training; ?></td>
                                    <td><?php echo $baris->penyelenggara; ?></td>
                                    <td><?php echo $baris->nrp; ?></td>
                                    <td><?php echo date('d F Y', strtotime($baris->tgl_training)); ?></td>
                                   

                                    <td><?php echo $baris->aspek_perilaku; ?></td>
                                    <td><?php echo $baris->aspek_a; ?></td>
                                    <td><?php echo $baris->aspek_b; ?></td>
                                    <td><?php echo $baris->aspek_c; ?></td>
                                    <td><?php echo $baris->pj_dephead; ?></td>
                                    <td><?php echo date('d F Y', strtotime($baris->tgl_dephead)); ?></td>
                                    <td><?php echo $baris->catatan; ?></td>


                                    <td><?php echo $baris->score; ?></td>
                                    <td><?php echo $baris->rekomendasi; ?></td>
                                    <td><?php echo $baris->pj_hrd; ?></td>
                                    <td><?php echo date('d F Y', strtotime($baris->tgl_eval)); ?></td>
                                    

                                    <td>
                                        <a href="web/laporanevaluasi_pdf/<?php echo $baris->id_evaluasi; ?>" title="Print"><span class="icon-printer2"></span></a>
                                    </td>

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