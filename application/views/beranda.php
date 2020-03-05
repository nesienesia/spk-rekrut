<?php
//$ceks = $this->session->userdata('kamar@2017');

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
      <div class="col-lg-12">

        <!-- Quick stats boxes -->
        <div class="row">
          <div class="col-lg-4">

            <!-- Current server load -->
            <div class="panel bg-orange-400">
              <div class="panel-body">

                <h3 class="no-margin"><?php echo $users->num_rows(); ?></h3>
                Jumlah User
              </div>

              <div id="server-load"></div>
            </div>
            <!-- /current server load -->

          </div>

         

         

          <div class="col-lg-4">

            <!-- Today's revenue -->
            <div class="panel bg-blue-400">
              <div class="panel-body">

                <h3 class="no-margin"><?php echo $v_permintaan->num_rows(); ?></h3>
                Jumlah Permintaan Tenaga Kerja
              </div>

              <div id="today-revenue"></div>
            </div>
            <!-- /today's revenue -->

          </div>



        </div>
        <!-- /quick stats boxes -->

      </div>


    </div>
    <!-- /dashboard content -->