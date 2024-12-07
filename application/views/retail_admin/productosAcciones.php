<html>
<head>
  <title>Productos</title>
  <link href="<?= base_url('assets/CSS/prodaccio.css'); ?>" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body>
  <div class="container">
    <h1>Productos</h1>

    <div class="buttons">
      <button onclick="window.location.href='<?= base_url('retailmaster/productosNuevo') ?>'">NUEVO</button>
      <button class="actions-button">ACCIONES</button>
    </div>

    <table>
      <thead>
        <tr>
          <th>Código producto</th>
          <th>Descripción</th>
          <th>Precio Costo</th>
          <th>Ganancia (%)</th>
          <th>Precio Venta</th>
          <th>Stock</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <!-- Verifica si hay productos -->
        <?php if (isset($productos) && !empty($productos)): ?>
          <?php foreach ($productos as $producto): ?>
            <tr>
              <td><?= $producto->id_producto ?></td>
              <td><?= $producto->Descripcion ?></td>
              <td><?= number_format($producto->Precio_Costo, 2) ?></td>
              <td><?= number_format($producto->Ganancia_porcentaje, 2) ?>%</td>
              <td><?= number_format($producto->Precio_Venta, 2) ?></td>
              <td><?= $producto->Stock ?></td>
              <td class="actions">
                <a href="<?= base_url('retailmaster/editarProducto/'.$producto->id_producto) ?>"><i class="fas fa-edit edit"></i></a>
                <a href="<?= base_url('retailmaster/eliminarProducto/'.$producto->id_producto) ?>"><i class="fas fa-trash delete"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7">No hay productos disponibles.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
