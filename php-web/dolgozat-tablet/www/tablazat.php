<table class="table table-responsive table-striped">
  <tr>
    <th>Gyártó</th>
    <th>Kijelző</th>
    <th>Tárhely</th>
    <th>OS</th>
    <th class="text-end">Ár</th>
    </th>

    <?php
    usort($tablets, fn($a, $b) => $a->price - $b->price);
    foreach ($tablets as $tablet):
    ?>
  <tr>
    <td><?= $tablet->manufacturer_name ?></td>
    <td><?= $tablet->screen ?>"</td>
    <td><?= $tablet->storage ?> GB</td>
    <td><?= $tablet->os ?></td>
    <td class="text-end"><?= $tablet->getFormattedPrice() ?></td>
  </tr>
<?php endforeach; ?>
</table>