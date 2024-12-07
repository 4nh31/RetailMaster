<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retail Master</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #E8ECD6;">
    <div class="container py-5">
        <!-- Header -->
        <div class="text-center mb-4">
            <h1 class="fw-bold">RETAIL MASTER</h1>
        </div>

        <!-- Navigation Buttons -->
        <div class="d-flex justify-content-center gap-3 mb-4">
            <button class="btn btn-primary">VENTAS</button>
            <button class="btn btn-primary">PRODUCTOS</button>
            <button class="btn btn-primary">INVENTARIO</button>
            <button class="btn btn-dark">CORTE</button>
            <button class="btn btn-primary">REPORTE</button>
        </div>

        <!-- Content Section -->
        <div class="p-4" style="background-color: #fff; color: black;">
            <h3 class="text-center">Corte</h3>
            <table class="table table-bordered text-black">
                <thead>
                    <tr>
                        <th>Dinero en caja</th>
                        <th>Ventas</th>
                        <th>Ventas por departamento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Fondo de caja <span class="float-end">$0</span></td>
                        <td>En efectivo <span class="float-end">$0</span></td>
                        <td>Hombres <span class="float-end">$0</span></td>
                    </tr>
                    <tr>
                        <td>Entradas <span class="float-end">$0</span></td>
                        <td>En tarjeta <span class="float-end">$0</span></td>
                        <td>Mujeres <span class="float-end">$0</span></td>
                    </tr>
                    <tr>
                        <td>Salidas <span class="float-end">$0</span></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Total <span class="float-end">$0</span></td>
                        <td>Total <span class="float-end">$0</span></td>
                        <td>Total <span class="float-end">$0</span></td>
                    </tr>
                </tbody>
            </table>

            <div class="text-center mt-4">
                <p class="mb-2 fw-bold">VENTAS TOTALES: $0</p>
                <p class="fw-bold">GANANCIAS TOTALES: $0</p>
                <button class="btn btn-primary">GENERAR REPORTE</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>