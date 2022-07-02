<?php $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
          <form action="/cars/update/<?= $detailCar['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $detailCar['id']; ?>" />
            <input type="hidden" name="gambarLama" value="<?= $detailCar['gambar']; ?>" />
            <div class="form-floating mb-3">
              <input type="text" class="form-control <?= ($validation->hasError('merk')) ? 'is-invalid' : ''; ?>" id="merkInput" placeholder="name@example.com" name="merk" value="<?= esc($detailCar['merk']); ?>" />
              <label for=" merkInput">
                <h5>Merk Mobil</h5>
              </label>
              <div class="invalid-feedback text-capitalize">
                <?= $validation->getError('merk'); ?>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control <?= ($validation->hasError('produk')) ? 'is-invalid' : ''; ?>" id="produkInput" placeholder="name@example.com" name="produk" value="<?= esc($detailCar['produk']); ?>" />
              <label for="produkInput">
                <h5>Asal Produk</h5>
              </label>
              <div class="invalid-feedback text-capitalize">
                <?= $validation->getError('produk'); ?>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control  <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="hargaInput" name="harga" placeholder="name@example.com" value="<?= esc($detailCar['harga']); ?>">
              <label for=" hargaInput">
                <h5>Harga</h5>
              </label>
              <div class="invalid-feedback text-capitalize">
                <?= $validation->getError('harga'); ?>
              </div>
            </div>
            <div class="mb-3 ">
              <label for="gambar" class="form-label ms-1">
                <h5>Gambar</h5>
              </label>
              <div class="d-flex justify-content-evenly">
                <div class="col-lg-2">
                  <img src="/img/cars/<?= $detailCar['gambar']; ?>" class="img-thumbnail img-preview">
                </div>
                <div class="col-lg-8">
                  <input class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambar" name="gambar" onchange="previewImage()">
                  <div class="invalid-feedback text-capitalize">
                    <?= $validation->getError('gambar'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control  <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" placeholder="Leave a comment here" id="deskripsiInput" name="deskripsi" style="height: 100px"><?= esc($detailCar['deskripsi']); ?></textarea>
              <label for="deskripsiInput">
                <h5>Deksripsi</h5>
              </label>
              <div class="invalid-feedback text-capitalize">
                <?= $validation->getError('deskripsi'); ?>
              </div>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-warning p-2">Edit Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>