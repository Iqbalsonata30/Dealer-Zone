<?php $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-7">
      <div class="card mt-3">
        <h5 class="card-header text-center">Alamat Pengiriman </h5>
        <div class="card-body">
          <form action="/customers/save" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="username" value="<?= $UserNavbar['username']; ?>">
            <div class=" mb-3 row">
              <label for="kota" class="col-sm-2 col-form-label ">Kota / Kabupaten </label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('kota')) ? 'is-invalid' : ''; ?>" id="kota" name="kota" value="<?= old('kota'); ?>">
                <div class="invalid-feedback text-capitalize">
                  <?= $validation->getError('kota'); ?>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan </label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('kecamatan')) ? 'is-invalid' : ''; ?>" id="kecamatan" name="kecamatan" value="<?= old('kecamatan'); ?>">
                <div class="invalid-feedback text-capitalize">
                  <?= $validation->getError('kecamatan'); ?>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="inputAlamat" class="form-label">Alamat</label>
              <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="inputAlamat" rows="3" name="alamat"></textarea>
              <div class="invalid-feedback text-capitalize">
                <?= $validation->getError('alamat'); ?>
              </div>
            </div>
            <div class="d-grid grap-2">
              <button type="submit" class="btn btn-success btn-md"><i class="fa-solid fa-fw fa-plus"></i>Tambah Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>