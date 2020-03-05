<?php
$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row();

//var_dump($v_permintaan->result_array());exit;
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
                        if ($ceks->level == "dephead" || $ceks->level == "admin" || $ceks->level == "hrd") { ?>
                            Permintaan Tenaga Kerja
                        <?php
                        } ?> (Data Permintaan Tenaga Kerja)</h5>
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
                    if ($ceks->level == "dephead" || $ceks->level == "admin"  || $ceks->level == "hrd") { ?>
                        <form class="form-horizontal" action="" method="post">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Kebutuhan *</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" name="id_uraian" onchange="changeValue(this.value)" autofocus>
                                                <option value="">Pilih Kebutuhan</option>
                                                <?php
                                                    $jsArray = "var dtKamar = new Array();\n";
                                                    foreach ($v_uraian->result() as $baris) {

                                                        echo '<option value="' . $baris->id_uraian . '">' . "$baris->seksi [$baris->jabatan]" . '</option>';
                                                        $jsArray .= "dtKamar['" . $baris->id_uraian . "'] = {
                                        id_kualifikasi:'" . addslashes($baris->id_kualifikasi) . "', 
                                        id_kebutuhan:'" . addslashes($baris->id_kebutuhan) . "'
                                      };\n";
                                                    } ?>
                                            </select>
                                            <script type="text/javascript">
                                                <?php echo $jsArray; ?>

                                                function changeValue(id) {
                                                    document.getElementById('id_kualifikasi').value = dtKamar[id].id_kualifikasi;
                                                    document.getElementById('id_kebutuhan').value = dtKamar[id].id_kebutuhan;
                                                };
                                            </script>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">NRP Pemohon *</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="nrp_pemohon_ptk" class="form-control" value="" required maxlength="5" placeholder="NRP Pemohon">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Nama Pemohon *</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="pemohon_ptk" class="form-control" value="" required maxlength="35" placeholder="Nama Pemohon">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Departemen Pemohon *</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" name="dept_pemohon_ptk" onchange="changeValue(this.value)" autofocus>
                                                <option value="">Pilih Deparetmen</option>
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
                                        <label class="control-label col-lg-2">Kota *</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="kota" class="form-control" value="" required maxlength="35" placeholder="Kota Pengisian Form">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Tanggal Permintaan *</label>
                                        <div class="col-lg-10">
                                            <input type="date" name="tgl_permintaan" class="form-control" value="" required placeholder="Tanggal permintaan">
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
                        foreach ($v_permintaan->result() as $baris) {
                            ?>
                            <tr>
                                <td><?php echo $baris->id_permintaan; ?></td>
                                <td><?php echo $baris->divisi; ?></td>
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
                                        <a href="web/permintaan_tk_edit/<?php echo $baris->id_permintaan; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                                        <a href="web/permintaan_tk_hapus/<?php echo $baris->id_permintaan; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a> &nbsp;
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