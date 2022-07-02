<?php $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <h5 class="card-header ">Featured</h5>
        <div class="card-body">
          <form action="/cars/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-floating mb-3">
              <input type="text" class="form-control <?= ($validation->hasError('merk')) ? 'is-invalid' : ''; ?>" id="merkInput" placeholder="name@example.com" name="merk" value="<?= old('merk'); ?>" />
              <label for=" merkInput">Merk Mobil</label>
              <div class="invalid-feedback text-capitalize">
                <?= $validation->getError('merk'); ?>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control <?= ($validation->hasError('produk')) ? 'is-invalid' : ''; ?>" id="produkInput" placeholder="name@example.com" name="produk" value="<?= old('produk'); ?>" />
              <label for="produkInput">Asal Produk</label>
              <div class="invalid-feedback text-capitalize">
                <?= $validation->getError('produk'); ?>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control  <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="hargaInput" name="harga" placeholder="name@example.com" value="<?= old('harga'); ?>">
              <label for=" hargaInput">Harga</label>
              <div class="invalid-feedback text-capitalize">
                <?= $validation->getError('harga'); ?>
              </div>
            </div>
            <div class="mb-3 ">
              <label for="gambar" class="form-label ms-1">Gambar</label>

              <div class="d-flex justify-content-evenly">
                <div class="col-lg-2">
                  <img src="" class="img-thumbnail img-preview">
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
              <textarea class="form-control  <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" placeholder="Leave a comment here" id="deskripsiInput" name="deskripsi" style="height: 100px"><?= old('deskripsi'); ?></textarea>
              <label for="deskripsiInput">Deksripsi</label>
              <div class="invalid-feedback text-capitalize">
                <?= $validation->getError('deskripsi'); ?>
              </div>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-success p-2">Tambah Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>