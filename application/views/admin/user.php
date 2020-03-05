<?php
$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row();

//var_dump($this->session->userdata());exit;
//var_dump($v_user->result());exit;

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
            Aplikasi HRD (Data User)</h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>
        </div>
        <hr>
       
        <div class="table">
          <table class="table datatable-basic" width="100%">
            <thead>
              <th width="10">No</th>
              <th>Username</th>
              <th>Level</th>
              <th>Role</th>
              <th class="text-center" width="100"></th>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($v_user->result() as $baris) {
                ?>
                <tr>
                  <td><?php echo $baris->kd_login; ?></td>
                  <td><?php echo $baris->username; ?></td>
                  <td><?php echo $baris->level; ?></td>
                  <td><?php echo $baris->nm_dep; ?></td>
                  <td>
                    <a href="web/user_edit/<?php echo $baris->username; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                    <a href="web/user_hapus/<?php echo $baris->username; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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