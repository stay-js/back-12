<nav class="navbar navbar-expand-lg" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      Tabletek
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link<?= $megjelenes == "fooldal" ? " active" : "" ?>" <?= $megjelenes == "fooldal" ? 'aria-current="page"' : "" ?> href="index.php">
            Főoldal
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?= $megjelenes == "tablazat" ? " active" : "" ?>" <?= $megjelenes == "tablazat" ? 'aria-current="page"' : "" ?> href="index.php?megjelenes=tablazat">
            Táblázat
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?= $megjelenes == "racs" ? " active" : "" ?>" <?= $megjelenes == "racs" ? 'aria-current="page"' : "" ?> href="index.php?megjelenes=racs">
            Rács
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>