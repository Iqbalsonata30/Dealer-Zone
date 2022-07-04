<?php $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card ">
        <div class="card-header">
          <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
              <a class="nav-link disabled">
                <h6>Change Password</h5>
              </a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="row justify-content-center">

            <div class="col-lg-10">
              <?php if (session('Alert')) : ?>
                <?= session('Alert'); ?>
              <?php endif; ?>
              <form action="/profile/update/<?= $UserNavbar['id']; ?>" method="POST">
              <?= csrf_field();?>
                <input type="hidden" name="id" value="<?= $UserNavbar['id']; ?>">
                <div class="mb-3">
                  <label for="password" class="form-label">Password Lama</label>
                  <input type="password" class="form-control" id="password" placeholder="Masukkan Password Lama" name="password">
                </div>
                <div class="mb-3">
                  <label for="passwordbaru" class="form-label">Password Baru</label>
                  <input type="password" class="form-control" id="passwordbaru" placeholder="Masukkan Password Baru" name="passwordbaru">
                </div>
                <div class="mb-3">
                  <label for="konfirpasswordbaru" class="form-label">Konfirmasi Password Baru</label>
                  <input type="password" class="form-control" id="konfirpasswordbaru" placeholder="Masukkan Konfirmasi Password Baru" name="konfirmasipasswordbaru">
                </div>
                <div class="">
                  <button class="btn btn-success float-end" type="submit">Change Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<?= $this->endSection(); ?>