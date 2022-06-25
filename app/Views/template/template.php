<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/bootstrap.css" />
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="/fontawesome-free/css/all.css" />
  <link rel="stylesheet" href="/sweetalert2/dist/sweetalert2.min.css"/>
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
  <title><?= $Title; ?></title>
</head>

<body>
  <?= $this->include('template/navbar'); ?>
  <?= $this->renderSection('content'); ?>
  <script src="/js/bootstrap.bundle.js"></script>
  <script src="/fontawesome-free/js/all.js"></script>
  <script src="/sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <script src="/js/script.js"></script>
</body>

</html>