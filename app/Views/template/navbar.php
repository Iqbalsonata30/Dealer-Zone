<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
  <div class="container">
    <a class="navbar-brand jetBrains fs-4 " href="/home">Dealer-Zone</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle dropdown-toggle-split pointer" data-bs-toggle="dropdown" aria-expanded="false">
            Daftar Kendaraan <span class="visually-hidden"></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark animate__animated animate__zoomIn animate__faster ">
            <li>
              <a class="dropdown-item" href="/shop/motorcycle">Kendaraan Roda 2</a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item" href="/cars">Kendaraan Roda 4</a>
            </li>
          </ul>
        </li>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <div class="d-block align-middle float-start">
            <img class="rounded-3  img-fluid profile-picture me-2" src="/img/profile/<?= $UserNavbar['profile']; ?>" alt="">
          </div>
          <a class=" nav-link dropdown-toggle text-capitalize" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hi,<?= $UserNavbar['fullname']; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark animate__animated animate__zoomIn animate__faster" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="/profile/change">Ganti Password</a></li>
            <li class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/auth/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>