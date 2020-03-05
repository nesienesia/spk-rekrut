<?php
$ceks = $user->row()->username; ?>
<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
    <div class="panel panel-flat col-md-6">
        <div class="panel-heading">
          <h5 class="panel-title">
            Feedback</h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>
        </div>
        <hr>
        <div class="panel-body">
            <form class="form-horizontal" action="" method="post">
              <div class="form-group">
                <label class="control-label col-lg-3">Username</label>
                <div class="col-lg-9">
                  <input type="text" name="username" class="form-control" value="<?php echo $ceks; ?>" placeholder="Username" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Penilaian </label>
                <div class="col-lg-9">
                  <input type="radio" name="nilai" value="Sangat Baik" required> Sangat Baik <br>
                  <input type="radio" name="nilai" value="Baik" required> Baik <br>
                  <input type="radio" name="nilai" value="Cukup" required> Cukup <br>
                  <input type="radio" name="nilai" value="Kurang" required> Kurang<br>
                  <input type="radio" name="nilai" value="Sangat Kurang" required> Sangat Kurang<br>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Saran</label>
                <div class="col-lg-9">
                  <textarea name="saran" rows="8" cols="80" class="form-control" placeholder="Saran"></textarea>
                </div>
              </div>

          <div class="col-md-12">
            <button type="submit" name="btnupdate" class="btn btn-primary" style="float:right;">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /dashboard content -->