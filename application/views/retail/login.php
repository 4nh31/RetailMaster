<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retail Master - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="<?= base_url('assets/sales.css'); ?>" rel="stylesheet">
</head>
<body>


<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error') ?>
    </div>
<?php endif; ?>

<div class="formulario">
    <img src="<?= base_url('assets/imagenes/LOGORETAIL.png'); ?>" class="logo">
    
    <!-- Mensaje de error si las credenciales son incorrectas -->
    <?php if ($this->session->flashdata('error')): ?>
        <p style="color:red;"><?= $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <form method="post" action="<?= base_url('retailmaster/autenticar'); ?>">
        <div class="username">
            <input type="text" name="username" required>
            <label for="username">
                <i class="bi bi-person-square"></i>USUARIO 
            </label>
        </div>
        <div class="username">
            <input type="password" name="password" required>
            <label>
                <i class="bi bi-lock-fill"></i>CONTRASEÑA</label>
        </div>
        <div class="recordar">
            <a href="<?php echo site_url('retailmaster/forgot_password'); ?>">¿OLVIDÓ SU CONTRASEÑA?</a>
        </div>

        <input type="submit" value="Iniciar sesión">
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
