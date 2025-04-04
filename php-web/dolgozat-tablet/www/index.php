<?php

require __DIR__ . "/vendor/autoload.php";

require "data.php";

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

ob_start();

$title = "Tabletek";
$megjelenes = "fooldal";

if (!empty($_GET["megjelenes"])) {
  if (in_array($_GET["megjelenes"], ["tablazat", "racs"])) {
    $megjelenes = $_GET["megjelenes"];
  } else {
    $megjelenes = 404;
    $title = 404;
    header("HTTP/1.1 404 Not Found");
  }
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><? $title ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/tablet.css">
</head>

<body>
  <?php require "menu.php" ?>

  <main class="container">
    <h1><?= $title ?></h1>
    <?php require $megjelenes . ".php"; ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

<?php
ob_end_flush();
