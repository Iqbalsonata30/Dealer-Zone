<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('Alert')) : ?>
  <?= session()->getFlashdata('Alert'); ?>
<?php endif; ?>
<div class="container">
  <div class="card mt-3">
    <h5 class="card-header text-center">Daftar Kendaraan Roda 2</h5>
    <div class="card-body">
      <div class="mb-3">
        <a href="/shop/add" class="btn btn-dark"><i class="fa-solid fa-fw fa-circle-plus"></i>Tambah Data Motor</a>
      </div>
      <div class="row">
        <?php foreach ($DataMotorcycle as $DM) : ?>
          <div class="col-md-4">
            <div class="card shadow-lg rounded-2">
              <img src="/img/motorcycle/<?= $DM['gambar']; ?>" class="card-img-top img-fluid img-thumbnail " alt="<?= $DM['merk']; ?>">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h5 class="card-title text-capitalize"><?= $DM['merk']; ?></h5>
                  <h5 class="card-title text-muted text-capitalize"><?= $DM['produk']; ?></h5>
                </div>
                <p class="card-text"><?= $DM['deskripsi']; ?></p>
                <a href="#" class="btn btn-info"><i class="fa-solid fa-fw fa-cart-shopping"></i>Beli Sekarang</a>
              </div>
              <div class="card-footer text-center">
                <small class="text-muted  fs-5">Rp. <?= format_rupiah($DM['harga']); ?></small>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>