<?php $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('Alert')) : ?>
  <?= session()->getFlashdata('Alert'); ?>
<?php endif; ?>
<div class="container mt-3">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Merk</th>
            <th scope="col">Harga</th>
            <th scope="col">Tanggal Pembelian</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($History as $h) : ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td class="text-capitalize"><?= $h['merk']; ?></td>
              <td>Rp.<?= format_rupiah($h['harga']); ?></td>
              <td><?= $h['created_at']; ?></td>
              <td>
                <?= (date('d', strtotime($h['created_at'])) + 3 == date('d')) ? '<span class="badge rounded-pill text-bg-success">Barang Sudah Diproses</span>' : '<span class="badge rounded-pill text-bg-warning">Barang Sedang Diproses</span>'; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php if (!$History) : ?>
        <div class="alert alert-primary text-center" role="alert">
          Riwayat belanja masih kosong !
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>