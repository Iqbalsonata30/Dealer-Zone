<?php $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
  <div class="row justify-content-start">
    <div class="col-lg-4 align-middle align-items-center">
      <div class="text-center">
        <img class=" img-thumbnail shadow-lg img-fluid profile" src="/img/profile/<?= $profile['profile']; ?>" alt="<?= $profile['fullname']; ?>">
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card hiddenBorder">
        <div class="card-body">
          <h5 class="card-title text-capitalize"><?= strtolower($profile['fullname']); ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?= $profile['username']; ?></h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
        <div class="card-footer bg-body text-muted text-center">
          Terdaftar sejak : <?= $profile['created_at']; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>