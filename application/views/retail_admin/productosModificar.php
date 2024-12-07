<html>
 <head>
  <title>Productos</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="<?= base_url('assets/CSS/prodnew.css'); ?>" rel="stylesheet">
 </head>
 <body>
  <div class="container">
   <h1>Modificar Productos</h1>
   
   <!-- Botones principales -->
   <div class="buttons">
     <button onclick="window.location.href='<?= base_url('retailmaster/productosNuevo') ?>'">NUEVO</button>
   </div>
   
   <!-- Tabla -->
   <div class="tabla">
     <div class="total">
         <span>Total: $ 1,234.00 MX</span>
     </div>
     <table>
         <thead>
             <tr>
                 <th>Código producto</th>
                 <th>Nombre producto</th>
                 <th>Cantidad</th>
                 <th>Precio</th>
                 <th>Acciones</th>
             </tr>
         </thead>
         <tbody>
             <!-- Ejemplo de fila dinámica -->
             <?php foreach ($productos as $producto): ?>
             <tr>
                 <form action="<?= base_url('retailmaster/actualizar') ?>" method="post">
                     <!-- Campos de la tabla -->
                     <td><?= $producto['codigo'] ?></td>
                     <td>
                         <input type="text" name="descripcion" value="<?= $producto['Descripcion'] ?>" required />
                     </td>
                     <td>
                         <input type="number" name="hay" value="<?= $producto['Stock'] ?>" required />
                     </td>
                     <td>
                         <input type="number" name="precio_venta" value="<?= $producto['Precio_Venta'] ?>" required />
                     </td>
                     
                     <!-- Botones de acción -->
                     <td class="actions">
                         <input type="hidden" name="id_producto" value="<?= $producto['id_producto'] ?>" />
                         <button type="submit" title="Actualizar"><i class="fas fa-save"></i></button>
                         <button type="button" onclick="eliminarProducto('<?= base_url('retailmaster/eliminar/'.$producto['id_producto']) ?>')" title="Eliminar"><i class="fas fa-trash"></i></button>
                     </td>
                 </form>
             </tr>
             <?php endforeach; ?>
         </tbody>
     </table>
   </div>

   <!-- Script para eliminación -->
   <script>
     function eliminarProducto(url) {
         if (confirm('¿Estás seguro de eliminar este producto?')) {
             window.location.href = url;
         }
     }
   </script>

 </body>
</html>
