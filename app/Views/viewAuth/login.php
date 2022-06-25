<?= $this->extend('templateAuth/template'); ?>
<?= $this->section('Auth'); ?>
<div class="container-lg ">
  <div class="row  justify-content-center align-items-center ">
    <div class="col-lg-6 ">
      <div class="card shadow-lg rounded ">
        <div class="card-header text-center">
          <h2>Login</h2>
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="mb-3">
              <label for="inputUsername" class="form-label">Username :</label>
              <input type="text" class="form-control" id="inputUsername" aria-describedby="emailHelp" name="username" autofocus>
            </div>
            <div class="mb-3">
              <label for="inputPassword" class="form-label">Password : </label>
              <input type="password" class="form-control" id="inputPassword" name="password">
            </div>
            <button type="submit" class="btn btn-info float-end">Log In</button>
          </form>
        </div>
        <div class="card-footer fs-6 text-muted text-center">
          Doesn't have account ?<a href="#" class="text-decoration-none"> Register Now !</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>