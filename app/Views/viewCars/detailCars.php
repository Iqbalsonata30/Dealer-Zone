<?php $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('Alert')) : ?>
  <?= session()->getFlashdata('Alert'); ?>
<?php endif; ?>
<div class="container mt-3">
  <div class="row justify-content-between mb-2">
    <?php if ($UserNavbar['role_id']  == 1) : ?>
      <div class="col-lg-4 my-2 ">
        <a href="/cars/add" class="btn btn-dark ">Tambah Data</a>
      </div>
    <?php endif; ?>
    <div class="col-lg-4">
      <form class="d-flex" role="search" action="" method="POST">
        <input class="form-control me-2" type="search" placeholder="Masukkan Keyword Pencarian!" aria-label="Search" name="search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
  <div class="row justify-content-center ">
    <?php if (empty($CarsData)) : ?>
      <div id="kosong"></div>
    <?php endif; ?>
    <?php if (!$search) : ?>
      <div class="col-lg mb-3">
        <div class="swiper shadow CarsSwiper">
          <div class="swiper-wrapper">
            <?php foreach ($slider as $C) : ?>
              <div class="swiper-slide">
                <img src="/img/cars/<?= $C['gambar']; ?>" alt="<?= $C['merk']; ?>" />
              </div>
            <?php endforeach; ?>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-scrollbar"></div>
        </div>
      </div>
    <?php endif; ?>
    <?php foreach ($CarsData as $C) : ?>
      <div class="col-lg-6">
        <div class="card shadow mb-3">
          <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center">
              <img src="/img/cars/<?= $C['gambar']; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h5 class="card-title text-capitalize"><?= $C['merk']; ?></h5>
                  <h5 class="card-title text-muted text-capitalize"><?= $C['produk']; ?></h5>
                </div>
                <p class="card-text "><?= $C['deskripsi']; ?></p>
                <div class="d-flex justify-content-between">
                  <a href="/customers/checkout/<?= $C['slug']; ?>" class="btn btn-outline-primary">Beli Sekarang</a>
                  <a href="/cars/<?= $C['slug']; ?>" class="btn btn-outline-secondary">Selengkapnya</a>
                </div>
              </div>
              <div class="card-footer text-center text-muted fs-4 fw-semibold border-light">
                Rp <?= format_rupiah($C['harga']); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <?= $Pager->links('cars', 'viewPagination'); ?>
  </div>
</div>
<?= $this->endSection(); ?>