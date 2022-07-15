<?= $this->extend('templateAuth/template'); ?>
<?= $this->section('Auth'); ?>

<div class="container-lg ">
  <div class="row d-flex flex-column justify-content-center align-items-center vertical-flex">
    <div class=" col-lg-6 align-self-center ">
      <div class=" card shadow rounded-4 p-3 animate__animated animate__fadeInUp">
        <div class="card-body">
          <h3 class="fw-bolder mb-2 jetBrains">Sign In Dealer-Zone</h3>
          <form action="/auth/verifyUser" method=" POST">
            <?= csrf_field(); ?>
            <div class="row">
              <div class="col-lg">
                <?php if (session()->getFlashdata('Alert')) : ?>
                  <?= session()->getFlashdata('Alert'); ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-floating my-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
              <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
              <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-info fw-semibold btn-lg">Log In</button>
            </div>
          </form>
        </div>
        <div class="card-footer fs-6 text-muted text-center">
          Doesn't have account ?<a href="/auth/register" class="text-decoration-none"> Register Now !</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>