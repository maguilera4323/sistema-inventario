<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

  <div id="sidemenu" class="menu-collapsed">
    <div id="header">
      <div id="menu-btn">
        <div class="btn-hamburger"></div>
        <div class="btn-hamburger"></div>
        <div class="btn-hamburger"></div>
      </div>
    </div>

    <div id="profile">
      <div id="photo"><img src="<?php echo $_SESSION['foto_login']; ?>" width="100" height="100" alt=""></div>
      <div id="name"><span><?php echo $_SESSION['usuario_login']?></span></div>
      <div id="user"><?php echo $_SESSION['nombre_usuario']?></div>
      <div id="user"><?php echo $_SESSION['rol']?></div>
    </div> 

    <div id="menu-items">
      <div class="item">
        <a href="<?php echo SERVERURL?>home/">
          <div class="icon"><i class="fas fa-home"></i></div>
          <div class="title">Inicio</div>
        </a>

        <a href="<?php echo SERVERURL?>proveedores/">
          <div class="icon"><i class="fas fa-boxes"></i></div>
          <div class="title">Proveedores</div>
        </a>

        <a href="<?php echo SERVERURL?>insumos/">
          <div class="icon"><i class="fas fa-box-open"></i></div>
          <div class="title">Insumos</div>
        </a>

        <a href="<?php echo SERVERURL?>compras/">
          <div class="icon"><i class="fas fa-shopping-cart"></i></div>
          <div class="title">Compras</div>
        </a>

        <a href="<?php echo SERVERURL?>inventario/">
          <div class="icon"><i class="fas fa-warehouse"></i></div>
          <div class="title">Inventario</div>
        </a>

        <a href="<?php echo SERVERURL?>config/">
          <div class="icon"><i class="fas fa-wrench"></i></div>
          <div class="title">Configuración</div>
        </a>
      </div>
    </div>

  </div>
