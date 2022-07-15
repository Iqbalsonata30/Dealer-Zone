<?php $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3 vertical-flex">
  <h3 class="fs-3 p-3">Checkout</h3>

  <div class="checkout ">
    <div class="row px-3 ">
      <div class="col-lg-10">
        <h4 class="fs-6">Alamat Pengiriman</h4>
        <hr>
        <div class="d-flex flex-column ">
          <span class="text-capitalize fw-semibold "><?= $UserNavbar['fullname']; ?></span>
          <span class="fw-normal"><?= $UserNavbar['username']; ?></span>
          <?php if ($Costumer == null || $Costumer['alamat'] ==  null) : ?>
            <div id="alamat"></div>
          <?php elseif ($Costumer['alamat']) : ?>
            <p class="text-muted"><?= $Costumer['kota'] . ',' . ' Kec. ' . $Costumer['kecamatan'] . ',' . $Costumer['alamat']; ?></p>
          <?php endif; ?>
        </div>
        <hr>
      </div>
      <div class="col-lg-10 mb-4">
        <div class="text-muted mb-3 ms-2 text-capitalize"><?= $Motorcycle['produk']; ?></div>
        <div class="clearfix">
          <img src="/img/motorcycle/<?= $Motorcycle['gambar']; ?>" class="col-md-2 float-md-start mb-3 me-md-3 img-thumbnail checkout-img" alt="...">
          <h4 class="fw-normal">
            <?= $Motorcycle['merk']; ?>
          </h4>
          <p><?= $Motorcycle['deskripsi']; ?></p>
          <h5 class="text-center"> Rp.<?= format_rupiah($Motorcycle['harga']); ?></h5>
        </div>
      </div>
    </div>
    <div class="row justify-content-start mb-4">
      <div class="col-lg-2">
        <form action="/customers/buy" method="POST">
          <input type="hidden" name="username" value="<?= $UserNavbar['username']; ?>" />
          <input type="hidden" name="fullname" value="<?= $UserNavbar['fullname']; ?>" />
          <input type="hidden" name="merk" value="<?= $Motorcycle['merk']; ?>" />
          <input type="hidden" name="harga" value="<?= $Motorcycle['harga']; ?>" />
          <div class="card" style="width: 22rem;">
            <div class="card-body">
              <h5 class="card-title">Ringkasan Belanja</h5>
              <div class="d-flex justify-content-between">
                <p class="card-text">Total Harga (<?= $Motorcycle['merk']; ?>)</p>
                <h6>Rp<?= format_rupiah($Motorcycle['harga']); ?></h6>
              </div>
              <hr>
              <div class="d-flex justify-content-between">
                <p class="card-text">Total Tagihan</p>
                <h6>Rp<?= format_rupiah($Motorcycle['harga']); ?></h6>
              </div>
              <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit" >Beli</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<?= $this->endSection(); ?>