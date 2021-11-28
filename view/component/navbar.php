<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid px-4">
    <a class="navbar-brand h1" href="#">Tiki JNE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?=$navItems['Home']?>" href="<?=BASEURL?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=$navItems['Pegawai']?>" href="<?=BASEURL?>/pegawai.php">Pegawai</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link <?=$navItems['Admin']?>" href="<?=BASEURL?>/admin/pengiriman.php">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
