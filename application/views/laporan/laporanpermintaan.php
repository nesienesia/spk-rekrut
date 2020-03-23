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
                        Permintaan Tenaga Kerja
                        (Laporan Permintaan Tenaga Kerja)</h5>
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
                            <a href="web/permintaan_tk_csv/" title="CSV">Cetak Laporan Excel</a>
                        </div>
                    <?php
                    } ?>
                </div>

                <div class="table-responsive">
                    <table class="table datatable-basic" width="100%">
                        <thead>
                        <th width="10">No</th>
                        <th>Divisi</th>
                        <th>Jumlah</th>
                        <th>Sumber Tenaga</th>
                        <th>Due Date</th>
                        <th>Tujuan</th>
                        <th>Atas Nama Penggantian</th>
                        <th>Alasan Penambahan</th>

                        <th>Pendidikan</th>
                        <th>Pengalaman</th>
                        <th>Status</th>
                        <th>Jenis Kelamin</th>

                        <th>Bertanggung Jawab</th>
                        <th>Bawahan</th>
                        <th>Jumlah Bawahan</th>
                        <th>Tugas Pokok</th>

                        <th>NRP Pemohon</th>
                        <th>Nama Pemohon</th>
                        <th>Department Pemohon</th>
                        <th>Kota</th>
                        <th>Tanggal Permintaan</th>
                        <?php
                        if ($ceks->level == "dephead" || $ceks->level == "admin"  || $ceks->level == "hrd") { ?>
                            <th class="text-center" width="100"></th>
                        <?php
                        } ?>
                    </thead>
                            
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($v_laporanpermintaan->result() as $baris) {
                                ?>
                                <tr>
                                <td><?php echo $baris->id_permintaan; ?></td>
                                <td><?php echo $baris->jumlah; ?></td>
                                <td><?php echo $baris->sumber_tenaga; ?></td>
                                <td><?php echo date('d F Y', strtotime($baris->due_date)); ?></td>
                                <td><?php echo $baris->tujuan; ?></td>
                                <td><?php echo $baris->an; ?></td>
                                <td><?php echo $baris->alasan; ?></td>

                                <td><?php echo $baris->pendidikan; ?></td>
                                <td><?php echo $baris->pengalaman; ?></td>
                                <td><?php echo $baris->status; ?></td>
                                <td><?php echo $baris->jk; ?></td>

                                <td><?php echo $baris->bertanggungjawab; ?></td>
                                <td><?php echo $baris->bawahan; ?></td>
                                <td><?php echo $baris->jml_bawahan; ?></td>
                                <td><?php echo $baris->tgs_pokok; ?></td>

                                <td><?php echo $baris->nrp_pemohon_ptk; ?></td>
                                <td><?php echo $baris->pemohon_ptk; ?></td>
                                <td><?php echo $baris->dept_pemohon_ptk; ?></td>
                                <td><?php echo $baris->kota; ?></td>
                                <td><?php echo date('d F Y', strtotime($baris->tgl_permintaan)); ?></td>
                                    <?php
                                        if ($ceks->level == "dephead" || $ceks->level == "admin") { ?>
                                        <td>
                                            <a href="web/laporanpermintaan_pdf/<?php echo $baris->id_permintaan; ?>" title="Print"><span class="icon-printer2"></span></a>
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