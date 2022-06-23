<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/style.css">
  <title><?= $Title; ?></title>
</head>

<body>
  <?= $this->include('template/navbar'); ?>
  <?= $this->renderSection('content'); ?>
  <script src="/js/bootstrap.js"></script>
</body>

</html>