<div class="row">
  <?php
  usort($tablets, fn($a, $b) => $b->storage - $a->storage);
  foreach ($tablets as $tablet):
  ?>
    <div class="col-12 col-md-6 col-lg-4">
      <img src="<?= $tablet->getImagePath() ?>" class="img-fluid" alt="<?= $tablet->manufacturer_name ?>">
      <div>
        <h2><?= $tablet->fullname ?></h2>
        <ul>
          <li><b>Gyártó:</b> <?= $tablet->manufacturer_name ?></li>
          <li><b>Kijelző:</b> <?= $tablet->screen ?>"</li>
          <li><b>Tárhely:</b> <?= $tablet->storage ?> GB</li>
          <li><b>OS:</b> <?= $tablet->os ?></li>
          <li><b>Ár:</b> <?= $tablet->getFormattedPrice() ?></li>
        </ul>
      </div>
    </div>
  <?php endforeach; ?>
</div>