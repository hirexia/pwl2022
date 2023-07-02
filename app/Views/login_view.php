<?= $this->extend('components/layout_clear') ?>
<?= $this->section('content') ?>
<?php
$username = [
    'name' => 'username',
    'id' => 'username',
    'class' => 'form-control'
];

$password = [
    'name' => 'password',
    'id' => 'password',
    'class' => 'form-control'
];

?>
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                        <img src="<?php echo base_url() ?>public/NiceAdmin/assets/img/logo.png" alt="">
                        <span class="d-none d-lg-block">Erganamu</span>
                    </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                            <p class="text-center small">Enter your username & password to login</p>
                        </div>

                        <?php
                        if (session()->getFlashData('failed')) {
                        ?>
                            <div class="col-12 alert alert-danger" role="alert">
                                <p class="mb-0">Gagal</p>
                                <hr>
                                <p class="mb-0">
                                    <?= session()->getFlashData('failed') ?>
                                </p>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if (session()->getFlashData('success')) {
                        ?>
                        <div class="col-12 alert alert-info" role="alert">
                            <p class="mb-0">Berhasil</p>    
                            <hr>
                            <p class="mb-0">
                                <?= session()->getFlashData('success') ?>
                            </p>
                        </div>
                        <?php
                        }
                        ?>
                        <?= form_open('login', 'class = "row g-3 needs-validation"') ?>
                        <div class="col-12">
                            <label for="yourUsername" class="form-label">Username</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <?= form_input($username) ?>
                                <div class="invalid-feedback">Please enter your username.</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Password</label>
                            <?= form_password($password) ?>
                            <div class="invalid-feedback">Please enter your password!</div>
                        </div>
                        <div class="col-12">
                            <?= form_submit('submit', 'Login', ['class' => 'btn btn-primary w-100']) ?>
                        </div>
                        <?= form_close() ?>
                        <div class="">
                            
                        </div>
                    </div>
                </div>

                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                    <!-- Designed by <a href=".">WarungKU</a> -->
                    <small class="text-muted">Don't have an account? <a href="register" data-bs-toggle="modal" data-bs-target="#addModal">Sign up now</a></small>
                </div>

            </div>
        </div>
    </div>

<div class="modal fade" id="addModal" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Sign Up</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<form action="<?= base_url('login') ?>" method="post" enctype="multipart/form-data">
			<?= csrf_field(); ?>

				<div class="modal-body">
					<div class="form-group mb-3">
						<label for="name">Username</label>
						<input type="text" name="uname" class="form-control" id="uname" placeholder="Username" required>
					</div>

					<div class="form-group mb-3">
						<label for="name">Password</label>
						<input type="password" name="passw" class="form-control" id="passw" placeholder="Password" required>
					</div>

					<div class="form-group mb-3">
						<label for="name">Confirm Password</label>
						<input type="password" name="cpass" class="form-control" id="cpass" placeholder="Confirm Password" required>
					</div>
				</div>

				<div class="modal-footer align-items-center">
					<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
					<button type="submit" class="btn btn-primary">Register</button>
				</div>

			</form>
		</div>
	</div>
</div>

</section>
<?= $this->endSection() ?>