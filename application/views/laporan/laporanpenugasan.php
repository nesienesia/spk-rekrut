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
                        Penugasan Karyawan
                        (Laporan Penugasan Karyawan Tetap)</h5>
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
                            <a href="web/penugasan_csv/" title="CSV">Cetak Laporan Excel</a>
                        </div>
                    <?php
                    } ?>
                </div>

                <div class="table-responsive">
                    <table class="table datatable-basic" width="100%">
                        <thead>
                            <th width="10">No</th>
                            <th>Nama</th>
                            <th>NRP</th>
                            <th>Departemen</th>
                            <th>Seksi</th>
                            <th>Penugasan</th>
                            <th>Departmen Sebelumnya</th>
                            <th>Seksi Sebelumnya</th>
                            <th>Departmen Penugasan</th>
                            <th>Seksi Penugasan</th>
                            <th>Persetujuan</th>
                            <th>Kota</th>
                            <th>Tanggal Penugasan</th>
                            <th>Yang Menugaskan</th>
                            <th>Yang Menerima</th>
                            <th>Mengetahui</th>

                            <?php
                            if ($ceks->level == "dephead" || $ceks->level == "admin"  || $ceks->level == "hrd") { ?>
                                <th class="text-center" width="100"></th>
                            <?php
                            } ?>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($v_laporanpenugasan->result() as $baris) {
                                ?>
                                <tr>
                                    <td><?php echo $baris->id_penugasan; ?></td>
                                    <td><?php echo $baris->nm_karyawan; ?></td>
                                    <td><?php echo $baris->nrp; ?></td>
                                    <td><?php echo $baris->dept; ?></td>
                                    <td><?php echo $baris->seksi; ?></td>
                                    <td><?php echo $baris->penugasan; ?></td>
                                    <td><?php echo $baris->dep_dulu; ?></td>
                                    <td><?php echo $baris->seksi_dulu; ?></td>
                                    <td><?php echo $baris->dep_penugasan; ?></td>
                                    <td><?php echo $baris->seksi_penugasan; ?></td>
                                    <td><?php echo $baris->persetujuan_pk; ?></td>
                                    <td><?php echo $baris->kota; ?></td>
                                    <td><?php echo date('d F Y', strtotime($baris->tgl)); ?></td>
                                    <td><?php echo $baris->menugaskan; ?></td>
                                    <td><?php echo $baris->menerima; ?></td>
                                    <td><?php echo $baris->mengetahui ?></td>

                                    <td>
                                        <a href="web/laporanpenugasan_pdf/<?php echo $baris->id_penugasan; ?>" title="Print"><span class="icon-printer2"></span></a>
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