<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row justify-content-center mt-3">
    <div class="col-lg-6">
      <div class="card rounded-3 border-light shadow">
        <img src=" /img/motorcycle/<?= $dataMotorcycle['gambar']; ?>" class="card-img-top border-light img-thumbnail  image-detail" alt="...">
        <div class="card-body">
          <h5 class="card-title text-capitalize"><?= $dataMotorcycle['merk']; ?></h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-dark fw-bolder text-capitalize">Produk : <?= $dataMotorcycle['produk']; ?></li>
          <li class="list-group-item text-muted fw-bolder">Harga : Rp.<?= format_rupiah($dataMotorcycle['harga']); ?></li>
        </ul>
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <a href="/shop/motorcycle" class="btn btn-dark float-start"><i class="fa-solid fa-fw fa-left-long me-1"></i><span>Kembali</span></a>
            <a href="/shop/edit/<?= $dataMotorcycle['slug']; ?>" class="btn btn-warning mx-2 float-end"><i class="fa-solid fa-fw fa-pen-fancy ms-1"></i>Edit Data</a>
            <form action="/shop/<?= $dataMotorcycle['id']; ?>"method="POST">
              <?= csrf_field(); ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger"><i class="fa-solid fa-fw fa-trash ms-1"></i>Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>