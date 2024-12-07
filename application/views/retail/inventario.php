<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link href="<?= base_url('assets/CSS/inventariox.css'); ?>" rel="stylesheet">
</head>
<body>
    <h1>Inventario</h1>
    <div class="search-bar">
        <input type="text" placeholder="Código de producto o nombre de producto">
        <button>Buscar</button>
    </div>
   
    <?php if (!empty($productos)): ?>
    <table>
        <thead>
            <tr>
                <th>Código producto</th>
                <th>Nombre producto</th>
                <th>Costo</th>
                <th>Precio de Venta</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo $producto->id_producto; ?></td>
                <td><?php echo $producto->descripcion; ?></td>
                <td><?php echo '$' . number_format($producto->precio_costo, 2); ?></td>
                <td><?php echo '$' . number_format($producto->precio_venta, 2); ?></td>
                <td><?php echo $producto->stock; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
            <p>No hay productos disponibles en el inventario.</p>
    <?php endif; ?>

</body>
</html>