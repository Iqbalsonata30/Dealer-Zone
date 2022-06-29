<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card mt-3">
        <h5 class="card-header">Form Edit Data </h5>
        <div class="card-body">
          <form action="/shop/update/<?= $dataMotorcycle['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="mb-3 row">
              <input type="hidden" name="id" value="<?= $dataMotorcycle['id']; ?>">
              <input type="hidden" name="gambarLama" value="<?= $dataMotorcycle['gambar']; ?>">
              <label for="merk" class="col-sm-2 col-form-label ">Merk </label>
              <div class="col-sm-10">
                <input type="text" class="form-control  <?= ($validation->hasError('merk')) ? 'is-invalid' : ''; ?>" id="merk" name="merk" value="<?= $dataMotorcycle['merk']; ?>">
                <div class="invalid-feedback text-capitalize">
                  <?= $validation->getError('merk'); ?>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="produk" class="col-sm-2 col-form-label">Produk </label>
              <div class="col-sm-10">
                <input type="text" class="form-control  <?= ($validation->hasError('produk')) ? 'is-invalid' : ''; ?>" id="produk" name="produk" value="<?= $dataMotorcycle['produk']; ?>">
                <div class="invalid-feedback text-capitalize">
                  <?= $validation->getError('produk'); ?>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="harga" class="col-sm-2 col-form-label">Harga </label>
              <div class="col-sm-10">
                <input type="number" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= $dataMotorcycle['harga']; ?>">
                <div class="invalid-feedback text-capitalize">
                  <?= $validation->getError('harga'); ?>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="gambar" class="col-sm-2 col-form-label ">Gambar </label>
              <div class="col-sm-2">
                <img src="/img/motorcycle/<?= $dataMotorcycle['gambar']; ?>" class="img-thumbnail img-preview">
              </div>
              <div class="col-sm-8">
                <div class="mb-3">
                  <div class="input-group">
                    <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImage()">
                    <div class="invalid-feedback text-capitalize">
                      <?= $validation->getError('gambar'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="inputDeskripsi" class="form-label">Deskripsi</label>
              <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="inputDeskripsi" rows="3" name="deskripsi"><?= $dataMotorcycle['deskripsi']; ?></textarea>
              <div class="invalid-feedback text-capitalize">
                <?= $validation->getError('deskripsi'); ?>
              </div>
            </div>
            <div class="d-grid grap-2">
              <button type="submit" class="btn btn-warning btn-md"><i class="fa-solid fa-fw fa-pen-fancy ms-1"></i>Edit Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>