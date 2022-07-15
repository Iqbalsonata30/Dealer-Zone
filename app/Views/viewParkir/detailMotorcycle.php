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
        <div class="d-flex justify-content-between">
          <form class="d-flex col-md-4 me-2" role="search" action="" method="POST">
            <input class="form-control me-2 lg" name="keyword" type="search" placeholder="Masukkan Keyword Pencarian!" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <?php if ($UserNavbar['role_id'] == 1) : ?>
            <a href="/shop/add" class="btn btn-dark"><i class="fa-solid fa-fw fa-circle-plus"></i>Tambah Data Motor</a>
          <?php endif; ?>
        </div>
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
                  <a href="/costumers/<?= $DM['slug']; ?>" class="btn btn-outline-primary"><i class="fa-solid fa-fw fa-cart-shopping"></i>Beli Sekarang</a>
                  <a href="/shop/<?= $DM['slug']; ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-fw fa-person-walking-arrow-right ms-1"></i>Selengkapnya</a>
                </div>
              </div>
              <div class="card-footer text-center">
                <small class="text-muted  fs-5">Rp. <?= format_rupiah($DM['harga']); ?></small>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <?php if (empty($DataMotorcycle)) : ?>
          <div id="kosong">
          </div>
        <?php endif; ?>
      </div>
      <?= $Pager->links('motorcycle', 'viewPagination'); ?>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>