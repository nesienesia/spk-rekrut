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
            Kriteria</h5>
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
                    <label class="control-label col-lg-2"><b>Nama Kriteria *</b></label>
                    <div class="col-lg-10">
                      <input type="text" name="nama_kriteria" class="form-control" value="" required maxlength="35" placeholder="Nama Kriteria">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Jenis Kriteria *</label>
                    <div class="col-lg-10">
                      <input type="radio" name="jenis_kriteria" value="Core Factor" />Core Factor </br>
                      <input type="radio" name="jenis_kriteria" value="Secondary Factor" />Secondary Factor
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
            <th>No</th>
            <th>Nama Kriteria</th>
            <th>Jenis Kriteria</th>
            
            <?php
            if ($ceks->level == "hrd" || $ceks->level == "admin") { ?>
              <th class="text-center" width="100"></th>
            <?php
            } ?>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($v_kriteria->result() as $baris) {
            ?>
              <tr>
                <td><?php echo $baris->id_kriteria; ?></td>
                <td><?php echo $baris->nama_kriteria; ?></td>
                <td><?php echo $baris->jenis_kriteria; ?></td>
                

                <?php
                if ($ceks->level == "hrd" || $ceks->level == "admin") { ?>
                  <td>
                    <a href="web/kriteria_edit/<?php echo $baris->id_kriteria; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                    <a href="web/kriteria_hapus/<?php echo $baris->id_kriteria; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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