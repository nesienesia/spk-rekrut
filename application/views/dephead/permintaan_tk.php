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
                                        <label class="control-label col-lg-2">Departemen *</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" name="departemen" onchange="changeValue(this.value)" autofocus>
                                                <option value="">Pilih Deparetemen</option>
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
                                        <label class="control-label col-lg-2">Seksi *</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="seksi" class="form-control" value="" required maxlength="35" placeholder="Seksi">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Jabatan *</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="jabatan" class="form-control" value="" required maxlength="35" placeholder="Jabatan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Golongan *</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="golongan" class="form-control" value="" required maxlength="5" placeholder="Golongan">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Jumlah *</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="1" max="100" name="jumlah" class="form-control" value="" required placeholder="Jumlah Orang">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Sumber Tenaga *</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="sumber_tenaga" class="form-control" value="Internal" required maxlength="5" placeholder="Sumber Tenaga" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Due Date *</label>
                                        <div class="col-lg-10">
                                            <input type="date" name="due_date" class="form-control" value="" required placeholder="Due Date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Tujuan *</label>
                                        <div class="col-lg-10">
                                            <input type="radio" name="tujuan" value="Penggantian" required> Penggantian<br>
                                            <input type="radio" name="tujuan" value="Penambahan" required> Penambahan<br>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Atas Nama Penggantian </label>
                                        <div class="col-lg-10">
                                            <textarea name="an" rows="8" cols="80" class="form-control" placeholder="Atas Nama Penggantian"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Alasan Penambahan </label>
                                        <div class="col-lg-10">
                                            <textarea name="alasan" rows="8" cols="80" class="form-control" placeholder="Alasan Penambahan"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Pendidikan *</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" name="pendidikan" onchange="changeValue(this.value)" autofocus>
                                                <option value="">Pilih Pendidikan</option>
                                                <option value="S2">S2</option>
                                                <option value="S1">S1</option>
                                                <option value="D4">D4</option>
                                                <option value="D3">D3</option>
                                                <option value="SLTA">SLTA</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Jurusan *</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="jurusan" class="form-control" value="" maxlength="35" placeholder="Jurusan">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Pengalaman *</label>
                                        <div class="col-lg-10">
                                            <input type="radio" name="pengalaman" value="Fresh Graduate" required> Fresh Graduate<br>
                                            <input type="radio" name="pengalaman" value="Pengalaman" required> Pengalaman<br>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Bidang Pengalaman</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="bidang_pengalaman" class="form-control" value="" maxlength="35" placeholder="Kosongkan jika Fresh Graduate">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Lama Pengalaman</label>
                                        <div class="col-lg-10">
                                        <input type="text" name="lama_pengalaman" class="form-control" value="" maxlength="35" placeholder="Kosongkan jika Fresh Graduate">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Status *</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" name="status" onchange="changeValue(this.value)" autofocus>
                                                <option value="">Pilih Pengalaman</option>
                                                <option value="Kontrak">Kontrak</option>
                                                <option value="Percobaan">Percobaan</option>
                                                <option value="Magang">Magang</option>
                                                <option value="PKL">PKL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Lama Kontrak</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="status_kontrak" class="form-control" value="" maxlength="35" placeholder="Lama Kontrak">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Batas Usia *</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="1" max="80" class="form-control" name="usia" required="required" placeholder="Usia">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Jenis Kelamin *</label>
                                        <div class="col-lg-10">
                                            <input type="radio" name="jk" value="L" required> Laki-laki<br>
                                            <input type="radio" name="jk" value="P" required> Perempuan<br>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Skill & Knowledge Khusus </label>
                                        <div class="col-lg-10">
                                            <textarea name="skill" rows="8" cols="80" class="form-control" placeholder="Skill & Knowledge Khusus"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Bertanggungjawab *</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="bertanggungjawab" class="form-control" value="" required maxlength="35" placeholder="Bertanggungjawab">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Jumlah Bawahan *</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="0" max="100" class="form-control" name="jml_bawahan" required="required" placeholder="0 jika tidak ada">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Tugas Pokok </label>
                                        <div class="col-lg-10">
                                            <textarea name="tgs_pokok" rows="8" cols="80" class="form-control" placeholder="Tugas Pokok"></textarea>
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
                        <th>Departemen</th>
                        <th>Seksi</th>
                        <th>Jabatan</th>
                        <th>Golongan</th>
                        <th>Jumlah</th>
                        <th>Sumber Tenaga</th>
                        <th>Due Date</th>
                        <th>Tujuan</th>
                        <th>Atas Nama Penggantian</th>
                        <th>Alasan Penambahan</th>

                        <th>Pendidikan</th>
                        <th>Pengalaman</th>
                        <th>Lama Pengalaman</th>

                        <th>Status</th>
                        <th>Lama Kontrak</th>
                        <th>Jenis Kelamin</th>
                        <th>Batas Usia</th>

                        <th>Bertanggung Jawab</th>
                        <th>Jumlah Bawahan</th>
                        <th>Tugas Pokok</th>

                        <th>NRP Pemohon</th>
                        <th>Nama Pemohon</th>

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
                                <td><?php echo $baris->departemen; ?></td>
                                <td><?php echo $baris->seksi; ?></td>
                                <td><?php echo $baris->jabatan; ?></td>
                                <td><?php echo $baris->golongan; ?></td>
                                <td><?php echo $baris->jumlah; ?></td>
                                <td><?php echo $baris->sumber_tenaga; ?></td>
                                <td><?php echo date('d F Y', strtotime($baris->due_date)); ?></td>
                                <td><?php echo $baris->tujuan; ?></td>
                                <td><?php echo $baris->an; ?></td>
                                <td><?php echo $baris->alasan; ?></td>

                                <td><?php echo $baris->pendidikan; ?></td>
                                <td><?php echo $baris->pengalaman; ?></td>
                                <td><?php echo $baris->lama_pengalaman; ?></td>
                                <td><?php echo $baris->status; ?></td>
                                <td><?php echo $baris->status_kontrak; ?></td>
                                <td><?php echo $baris->usia; ?></td>
                                <td><?php echo $baris->jk; ?></td>

                                <td><?php echo $baris->bertanggungjawab; ?></td>
                                <td><?php echo $baris->jml_bawahan; ?></td>
                                <td><?php echo $baris->tgs_pokok; ?></td>

                                <td><?php echo $baris->nrp_pemohon_ptk; ?></td>
                                <td><?php echo $baris->pemohon_ptk; ?></td>
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