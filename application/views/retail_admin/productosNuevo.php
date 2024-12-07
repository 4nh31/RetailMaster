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
     <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">
      MODIFICAR
     </button>
     <button onclick="window.location.href='<?= base_url('retailmaster/productosAcci') ?>'">ACCIONES</button>

    </div>
    <form action="<?= base_url('retailmaster/guardarProducto')?>" method="post">
     <label>
      Codigo de barra:<br>
      <input type="text" id="codigo_barras" name="codigo_barras"/>
     </label>
     <label>
      Precio Venta:<br>
      <input type="number" id="precio_venta" name="precio_venta"/>
     </label>
     <label>
      Descripcion:<br>
      <input type="text" id="descripcion" name="descripcion"/>
     </label>
     <label>
      Precio Costo:<br>
      <input type="number" id="precio_costo" name="precio_costo"/>
     </label>
     <label>
      Hay:<br>
      <input type="number" id="hay" name="hay" value="en este momento" onfocus="this.value=''" onblur="if(this.value===''){this.value='placeholder';}">
     </label>
     <label>
      Ganancia:<br>
      <input type="number" id="ganancia" name="ganancia"/>
     </label>
     <div class="submit-button">
      <button type="submit">
       AGREGAR
      </button>
     </div>
    </form>
   </div>
  </div>

  
  <?php //$this->load->view('components/modal', $this);
   
   echo $componente;
   echo $componente2;
   ?>
  
 </body>
</html>
