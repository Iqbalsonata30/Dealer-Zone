<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?= $this->include('templateAuth/authCSS'); ?>
  <title><?= $Title; ?></title>
</head>

<body class="bg-secondary">
  <?= $this->renderSection('Auth'); ?>
  <?= $this->include('templateAuth/authJS'); ?>
</body>

</html>