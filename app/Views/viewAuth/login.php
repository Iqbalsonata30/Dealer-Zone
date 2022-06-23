<?= $this->extend('templateAuth/template'); ?>
<?= $this->section('Auth'); ?>
<div class="container ">
  <div class="row justify-content-center align-items-center mt-5">
    <div class="col-lg-6">
      <div class="card shadow-lg p-1 rounded text-center align-middle">
        <div class="card-header">
          <h2>Login</h2>
        </div>
        <div class="card-body">
          <form>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="card-footer text-muted">
          2 days ago
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>