<?php $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('Alert')) : ?>
  <?= session()->getFlashdata('Alert'); ?>
<?php endif; ?>
<div class="container mt-3">
  <div class="row justify-content-start">
    <div class="col-lg-4 my-2 ">
      <a href="/cars/add" class="btn btn-dark ">Tambah Data</a>
    </div>
  </div>
  <div class="row justify-content-center ">
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
                  <button type="button" class="btn btn-outline-primary">Beli Sekarang</button>
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