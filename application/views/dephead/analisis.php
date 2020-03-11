<?php
$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row();
//var_dump($v_kriteria->result_array());exit;
//var_dump($v_sub_kriteria->result_array());exit;
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
                            Analisis SPK Profile Matching
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
                    if ($ceks->level == "hrd" || $ceks->level == "admin") { ?>
                        <?php
                        if ($this->input->post('button') == '') {
                        ?>
                            <form class="form-horizontal" action="" method="post">
                                <div class="col-md-12">
                                    <div class="col-md-12">

                                        <?php
                                        foreach ($v_kriteria as $baris) {
                                        ?>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3"><?php echo $baris->nama_kriteria; ?></label>
                                                <div class="col-lg-9">
                                                    <select name="nilai_profil<?php echo $baris->id_kriteria; ?>" id="nilai_profil<?php echo $baris->id_kriteria; ?>" class="form-control" onchange="changeValue(this.value)" autofocus required>
                                                        <option value="">Pilih Nilai Sub Kriteria</option>
                                                        <?php
                                                        foreach ($v_sub_kriteria[$baris->id_kriteria] as $baris2) {
                                                        ?>
                                                            <option value="<?php echo $baris2->nilai_sub_kriteria; ?>"><?php echo $baris2->nama_sub_kriteria; ?> (<?php echo $baris2->nilai_sub_kriteria; ?>)</option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php
                                        } ?>

                                    </div>
                                </div>
                                <br>
                                <hr>
                                <input type="submit" name="button" value="Proses" class="btn btn-primary" style="float:right;" />
                            </form>
                </div>
                <br>
            <?php
                        } else {
            ?>
                <div id="perhitungan" style="display:none;">
                    <br />
                    <?php
                            echo $html;
                    ?>
                    <br />
                </div>
                <br />
                
                <br />
                <br />
                <h6>Hasil Analisa Menggunakan Sistem Pendukung Keputusan (SPK) Metode Profile Matching</h6><br />
                <br />
                <div class="table-responsive">
                    <table class="table datatable-basic" width="100%">
                        <thead>
                            <td>Rangking</td>
                            <td>Nama Individu</td>
                            <td>Nilai Profile Matching</td>
                        </thead>
                        <?php
                            for ($i = 0; $i < count($nm_karyawan_rangking); $i++) {
                        ?>
                            <tbody>
                                <td><?php echo ($i + 1); ?></td>
                                <td><?php echo $nm_karyawan_rangking[$i]; ?></td>
                                <td><?php echo $total_nilai_rangking[$i]; ?></td>
                            </tbody>
                        <?php
                            }
                        ?>
                    </table>
                </div>
                Hasil Kecocokan Terbesar Didapatkan oleh Karyawan  <strong> <?php echo $nm_karyawan_rangking[0]; ?> </strong> dengan Nilai Profile Matching Terbesar = <?php echo $total_nilai_rangking[0]; ?>
                <br />
                
                <input type="button" value="Perhitungan" onclick="document.getElementById('perhitungan').style.display='block';" class="btn btn-primary" style="float:right;" />

            <?php
                        }
            ?>
            <br />
            <hr>
        <?php
                    } ?>

            </div>
            <!-- /basic datatable -->
        </div>
        <!-- /dashboard content -->