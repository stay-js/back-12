<div class="container my-4">
  <h1><?= $title ?></h1>

  <div class="row row-gap-4 my-4">
    <?php foreach ($games as $game) : ?>
      <div class="col-12 col-sm-6 col-md-3">
        <img class="img-fluid img-thumbnail" src="<?= $game->image ?>" alt="<?= $game->title ?>">

        <h2 class="fs-5 my-2"><?= $game->title ?></h2>

        <p class="p-0 m-0">Ár: <?= number_format($game->price, 0, ",", " ") ?> Ft
          <span class="badge rounded-pill <?= $game->getPillColor() ?>">
            <?= $game->platform ?>
          </span>
        </p>
      </div>
    <?php endforeach; ?>
  </div>
</div>