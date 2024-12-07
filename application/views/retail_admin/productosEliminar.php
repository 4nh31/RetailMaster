<html>
 <head>
  <title>Productos</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="<?= base_url('assets/CSS/prodnew.css'); ?>" rel="stylesheet">
 </head>
 <body>
  <div class="container">
   <h1>Productos</h1>
   <div class="form-container">
    <div class="buttons">
     <button>
      NUEVO
     </button>
     <button id="btn-modificar">
      MODIFICAR
     </button>
     <button>
      ELIMINAR
     </button>
    </div>
    <form action="<?= base_url('retailmaster/eliminar')?>" method="post">
     <label>
      Codigo de barras:<br>
      <input type="number" id="codigo_barras" name="codigo_barras" value="<?= isset($producto['id_producto']) ? $producto['id_producto'] : '' ?>" />
     </label>
     <label>
      Descripcion:<br>
      <input type="text" id="descripcion" name="descripcion" value="<?= isset($producto['Descripcion']) ? $producto['Descripcion'] : '' ?>" required/>
     </label>
     <label>
      Precio Costo:<br>
      <input type="number" id="precio_costo" name="precio_costo" value="<?= isset($producto['Precio_Costo']) ? $producto['Precio_Costo'] : '' ?>" required/>
     </label>
     <div class="submit-button">
      <button type="submit">
       CONFIRMAR ELIMINACION
      </button>
     </div>
    </form>
   </div>
  </div>

  
 </body>
</html>
