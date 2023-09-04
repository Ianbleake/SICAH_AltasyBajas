<header class="p-3 bg-primary text-white">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <a href="/sicah-web/index.php" class="mb-2 mb-lg-0 text-white text-decoration-none">
        SICAH
      </a>

      <p class="m-0">Bienvenido <span class="text-uppercase"><?php echo $_SESSION['user']['NOMBRE']; ?></span></p>

      <div class="d-flex align-items-center">
        <?php if (isset($volver)): ?>
          <a href='/sicah-web/consulta_personal.php' class='btn btn-outline-light me-2'>Volver</a>
        <?php endif; ?>

        <?php if (isset($logout)): ?>
          <a href="/sicah-web/logout.php" class="btn btn-outline-light me-2">Cerrar sesión</a>
        <?php endif; ?>

        <?php if (!isset($logout)): ?>
          <a href='/sicah-web/index.php' class='btn btn-outline-light me-2'>Menú Principal</a>
        <?php endif; ?>
      </div>
    </div>
</header>