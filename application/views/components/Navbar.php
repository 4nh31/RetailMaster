<div class="navbar">
   <img class="logo" alt="Retail Master Logo" src="<?= base_url('assets/imagenes/LOGORETAIL.png'); ?>" />

   <div class="nav-links">
    <a href="<?php echo site_url('retailmaster/dashboard_ventas'); ?>">
     Ventas
    </a>
    <a href="<?php echo site_url('inventario'); ?>">
      Inventario
    </a>
    <a href="#">
     Reporte
    </a>
   
   <!-- Dropdown en el icono de perfil -->
   <div class="dropdown">
            <img class="perfil" src="<?= base_url('assets/imagenes/user.png'); ?>" alt="Perfil" data-bs-toggle="dropdown" aria-expanded="false">
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Mi perfil</a></li>
                <li><a class="dropdown-item" href="#">Configuraciones</a></li>
                <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
            </ul>
        </div>
   </div>

  </div>

