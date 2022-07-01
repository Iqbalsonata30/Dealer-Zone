<?php $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
  <div class="row ">
    <div class="col-lg ">
      <div class="card shadow-lg mb-3 WidthCar mx-auto ">
        <div class="row g-0 ">
          <div class="col-md-6">
            <img src="/img/cars/<?= $FullDetail['gambar']; ?>" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h4 class="card-title text-capitalize"><?= $FullDetail['merk']; ?></h4>
                <h4 class="card-title text-capitalize text-muted"><?= $FullDetail['produk']; ?></h4>
              </div>
              <p class="card-text"><?= $FullDetail['deskripsi']; ?></p>
              <h5 class="card-text"><small class="text-muted">Rp.<?= format_rupiah($FullDetail['harga']); ?></small></h5>
              <a href="/cars" class="btn btn-outline-dark float-start">Kembali</a>
              <div class="d-flex justify-content-end">
                <form action="/cars/<?= $FullDetail['id']; ?>" method="POST">
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger me-2">Delete</button>
                </form>
                <a class="btn btn-warning">Edit</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>