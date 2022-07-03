<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-md">
  <div class="row justify-content-center align-items-center mt-4">
    <div class="col-lg">
      <div class="swiper mySwiper shadow  animate__animated animate__zoomIn">
        <div class="swiper-wrapper ">
          <?php foreach ($DataMotorcycle as $DM) : ?>
            <div class="swiper-slide ">
              <img src="/img/motorcycle/<?= $DM['gambar']; ?>" class="img-fluid" />
            </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-scrollbar"></div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center align-items-center mt-4">
    <div class="col-md-4">
      <div class="card shadow-card1 border-light text-bg-dark mb-3 ">
        <div class="card-header text-center">
          <h4>Jumlah Motor</h4>
        </div>
        <div class="card-body " style="height:125px;">
          <div class="d-flex justify-content-center align-items-center align-middle">
            <span class="fs-1 me-2"><i class="fa-solid fa-fw fa-motorcycle"></i></span>
            <h4 class="card-title text-center "><?= $totalMotorcycles; ?> Unit</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-card1 border-light text-bg-info mb-3 ">
        <div class="card-header text-center">
          <h4>Jumlah Mobil</h4>
        </div>
        <div class="card-body " style="height:125px;">
          <div class="d-flex justify-content-center align-items-center align-middle">
            <span class="fs-1 me-2"><i class="fa-solid fa-fw fa-car-side"></i></span>
            <h4 class="card-title text-center "><?= $totalCars; ?> Unit</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-card1 border-light text-bg-primary mb-3 ">
        <div class="card-header text-center">
          <h4>Jumlah User</h4>
        </div>
        <div class="card-body " style="height:125px;">
          <div class="d-flex justify-content-center align-items-center align-middle">
            <span class="fs-1 me-2"><i class="fa-solid fa-fw fa-user"></i></span>
            <h4 class="card-title text-center "><?= $totalUsers; ?> User</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>