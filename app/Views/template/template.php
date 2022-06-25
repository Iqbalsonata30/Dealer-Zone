<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?= $this->include('template/linkCSS'); ?>
  <title><?= $Title; ?></title>
</head>

<body>
  <?= $this->include('template/navbar'); ?>
  <?= $this->renderSection('content'); ?>
  <?= $this->include('template/linkScript'); ?>
</body>

</html>