<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retail Master</title>
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #E8ECD6;">
    <div class="container py-5">
        <!-- Header -->
        <div class="text-center mb-4">
            <h1 class="fw-bold" style="font-family: 'Cinzel', serif;">RETAIL MASTER</h1>
        </div>

        <!-- Navigation Buttons -->
        <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
            <button class="btn btn-primary">VENTAS</button>
            <button class="btn btn-primary">PRODUCTOS</button>
            <button class="btn btn-primary">INVENTARIO</button>
            <button class="btn btn-primary">CORTE</button>
            <button class="btn btn-primary">REPORTE</button>
        </div>

        <!-- Content Section -->
        <div style="background-color: #b1b1b16e;" class="p-4 border rounded">
            <h3 class="text-center">MODIFICAR</h3>
            <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                <button class="btn btn-primary">NUEVO</button>
                <button class="btn btn-primary">MODIFICAR</button>
                <button class="btn btn-primary">ELIMINAR</button>
            </div>

            <form>
                <div class="row g-3">
                    <!-- Primera columna -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="codigo_barras" class="form-label">Código de barras:</label>
                            <input type="text" id="codigo_barras" name="codigo_barras" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción:</label>
                            <input type="text" id="descripcion" name="descripcion" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="precio_costo" class="form-label">Precio Costo:</label>
                            <input type="number" id="precio_costo" name="precio_costo" step="0.01" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="ganancia" class="form-label">Ganancia:</label>
                            <div class="input-group">
                                <input type="number" id="ganancia" name="ganancia" step="0.01" class="form-control">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Segunda columna -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="precio_venta" class="form-label">Precio Venta:</label>
                            <input type="number" id="precio_venta" name="precio_venta" step="0.01" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="departamento" class="form-label">Departamento:</label>
                            <select id="departamento" name="departamento" class="form-select">
                                <option value="">-- Seleccionar --</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="hay" class="form-label">Hay:</label>
                            <div class="input-group">
                                <input type="number" id="hay" name="hay" step="0.01" class="form-control">
                                <span class="input-group-text">en este momento</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="minimo" class="form-label">Mínimo:</label>
                            <input type="number" id="minimo" name="minimo" step="0.01" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-primary">AGREGAR</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
