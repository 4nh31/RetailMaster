<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Recuperación de Contraseña</h2>
        <form action="<?= site_url('auth/forgot_password') ?>" method="post" onsubmit="showModal(event)">
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Recuperar Contraseña</button>
        </form>
        <?php if (isset($error)): ?>
            <p style="color: red"><?= $error ?></p>
        <?php endif; ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Correo Enviado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    Hemos enviado un enlace de recuperación de contraseña al correo: <strong id="userEmail"></strong>. 
                    Por favor, revisa tu bandeja de entrada o tu carpeta de spam.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showModal(event) {
            event.preventDefault(); // Evita que el formulario se envíe inmediatamente

            // Obtiene el correo electrónico ingresado
            var email = document.getElementById('email').value;
            document.getElementById('userEmail').innerText = email;

            // Muestra el modal
            var modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            modal.show();

            // Envía el formulario después de mostrar el modal
            setTimeout(() => {
                event.target.submit();
            }, 3000); // Espera 3 segundos antes de enviar
        }
    </script>
</body>
</html>
