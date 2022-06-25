<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
  <div class="col-lg-6">
  <div class="swiper">
      <div class="swiper-wrapper">
        <?php foreach ($DataMotorcycle as $DM) : ?>
          <div class="swiper-slide">
            <img src="/img/motorcycle/<?= $DM['gambar']; ?>" class="img-thumbnail" />
          </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-scrollbar"></div>
    </div>
  </div>
  </div>
</div>
<?= $this->endSection(); ?>