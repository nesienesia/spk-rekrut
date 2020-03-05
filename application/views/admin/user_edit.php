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
          <h5 class="panel-title">Reset Username and Password</h5>
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
          <form class="form-horizontal" action="" method="post">
            <div class="col-md-12">
              <div class="col-md-12">
              <div class="form-group">
                  <label class="control-label col-lg-2">Username</label>
                  <div class="col-lg-10">
                    <input type="text" name="username" class="form-control" value="<?php echo $v_user->username;?>" required maxlength="35" placeholder="Username" autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Password</label>
                  <div class="col-lg-10">
                    <input type="password" name="password" class="form-control" value="" required maxlength="35" placeholder="Password">
                  </div>
                </div>
    
            <br>
            <hr>
            <a href="web/user" class="btn btn-default">Back</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Save</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
