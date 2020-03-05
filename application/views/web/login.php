<?php
//var_dump($this->session->userdata());exit;
?>

<!-- Simple login form -->
<form action="" method="post">
	<div class="panel panel-body login-form">
		<div class="text-center">
			<img src="assets/images/logofscm.jpg" style="width:120px;height:64px;" />
			<h5 class="content-group">Login <small class="display-block">Please Insert Your Username and Password<br>
			</small></h5>
			<?php
			echo $this->session->flashdata('msg');
			?>
		</div>

		<div class="form-group has-feedback has-feedback-left">
			<input type="text" class="form-control" name="username" placeholder="Username" required>
			<div class="form-control-feedback">
				<i class="icon-user text-muted"></i>
			</div>
		</div>

		<div class="form-group has-feedback has-feedback-left">
			<input type="password" class="form-control" name="password" placeholder="Password" required>
			<div class="form-control-feedback">
				<i class="icon-lock2 text-muted"></i>
			</div>
		</div>


		<div class="form-group">
			<button type="submit" name="btnlogin" class="btn btn-primary btn-block" style="background-color:blue;border:1px solid #f1f1f1;">Login <i class="icon-circle-right2 position-right"></i></button>
		</div>
		<!-- /simple login form 
							<div class="text-center">
								<a href="web/lupa_password">Lupa Password??</a>
							</div>
-->
	</div>
</form>
<!-- /simple login form -->
<center>
	<pre>
	Sistem Informasi Sumber Daya Manusia ini dapat melakukan Proses Permohonan Training, Evaluasi Training, Permintaan Tenaga Kerja dan Penugasan Karyawan.
	             Dalam prosesnya terdapat SOP yang mendukung penggunaan Sistem Informasi Sumber Daya Manusia ini.
	</pre>
</center>