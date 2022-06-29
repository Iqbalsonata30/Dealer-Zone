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
          <div class="col-md-4 mb-2">
            <div class="card shadow-lg rounded-2 ">
              <img src="/img/motorcycle/<?= $DM['gambar']; ?>" class="card-img-top img-fluid img-thumbnail " alt="<?= $DM['merk']; ?>">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h5 class="card-title text-capitalize"><?= $DM['merk']; ?></h5>
                  <h5 class="card-title text-muted text-capitalize"><?= $DM['produk']; ?></h5>
                </div>
                <p class="card-text"><?= $DM['deskripsi']; ?></p>

                <div class="d-flex justify-content-between">
                  <a href="#" class="btn btn-outline-primary"><i class="fa-solid fa-fw fa-cart-shopping"></i>Beli Sekarang</a>
                  <a href="/shop/<?= $DM['slug']; ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-fw fa-person-walking-arrow-right ms-1"></i>Selengkapnya</a>
                </div>
              </div>
              <div class="card-footer text-center">
                <small class="text-muted  fs-5">Rp. <?= format_rupiah($DM['harga']); ?></small>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?= $Pager->links('motorcycle', 'viewPagination'); ?>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>