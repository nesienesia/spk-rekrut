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
            if ($ceks->level == "dephead" || $ceks->level == "admin") { ?>
            <?php
            } ?> Info Training</h5>
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
          if ($ceks->level == "admin") { ?>
          <form class="form-horizontal" action="" method="post">
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Judul Training *</label>
                  <div class="col-lg-10">
                    <input type="text" name="judul" class="form-control" value="" maxlength="35" placeholder="Judul Training">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Penyelenggara *</label>
                  <div class="col-lg-10">
                    <input type="text" name="info_penyelenggara" class="form-control" value=""  maxlength="35" placeholder="Penyelenggara">
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
              <th>Judul Training</th>
              <th>Penyelenggara</th>
              <?php
              if ($ceks->level == "dephead" || $ceks->level == "admin") { ?>
              <th class="text-center" width="100"></th>
              <?php
              } ?>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($v_info->result() as $baris) {
                ?>
              <tr>
                <td><?php echo $baris->judul; ?></td>
                <td><?php echo $baris->info_penyelenggara; ?></td>
                <?php
                  if ($ceks->level == "admin") { ?>
                <td>
                 <!--  <a href="web/info_edit/<?//php echo $baris->id_info; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp; -->
                  <a href="web/info_hapus/<?php echo $baris->id_info; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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