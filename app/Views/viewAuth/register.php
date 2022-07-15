<?php $this->extend('templateAuth/template'); ?>
<?= $this->section('Auth'); ?>
<div class="container-lg my-3">
  <div class="row h-100 d-flex flex-column align-items-center align-content-center   ">
    <div class="col-lg-6  align-self-center ">
      <div class="card shadow rounded-4 p-3  animate__animated animate__fadeInLeft">
        <div class="card-body">
          <h1 class="fw-bolder mb-2">Sign Up For Free</h1>
          <form action="/auth/create" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-floating my-3">
              <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="floatingNamaLengkap" name="fullname" placeholder="Fullname">
              <label for="floatingNamaLengkap">Nama Lengkap</label>
              <div class="invalid-feedback">
                <?= $validation->getError('fullname'); ?>
              </div>
            </div>
            <div class="form-floating my-3">
              <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="floatingUsername" name="username" placeholder="Username">
              <label for="floatingUsername">Username</label>
              <div class="invalid-feedback">
                <?= $validation->getError('username'); ?>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="floatingPassword" name="password" placeholder="Password">
              <label for="floatingPassword">Password</label>
              <div class="invalid-feedback">
                <?= $validation->getError('password'); ?>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control <?= ($validation->hasError('password_confir')) ? 'is-invalid' : ''; ?>" id="floatingKonfirmasiPassword" name="password_confir" placeholder="Confirmtion Password">
              <label for="floatingKonfirmasiPassword">Konfirmasi Password</label>
              <div class="invalid-feedback">
                <?= $validation->getError('password_confir'); ?>
              </div>
            </div>
            <div class="mb-3">
              <label for="profile" class="form-label ">Gambar Profile</label>
              <div class="row d-flex align-items-center">
                <div class="col-md-2">
                  <img src="/img/profile/default.jpg" class="shadow  rounded-5 img-fluid showcaseProfile responsive">
                </div>
                <div class="col-md-10">
                  <input class="form-control <?= ($validation->hasError('profile')) ? 'is-invalid' : ''; ?> " type="file" id="profile" name="profile" onchange="previewProfilePicture()">
                  <div class="invalid-feedback">
                    <?= $validation->getError('profile'); ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-success fw-semibold btn-lg">Log In</button>
            </div>
          </form>
        </div>
        <div class="card-footer fs-6 text-muted text-center">
          have account ?<a href="/auth" class="text-decoration-none"> Log in </a>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>