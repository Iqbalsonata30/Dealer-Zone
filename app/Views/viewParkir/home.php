<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
  <div class="row justify-content-center align-items-center mt-4">
    <div class="col-lg-">
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
</div>
<?= $this->endSection(); ?>