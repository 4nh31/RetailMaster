<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="<?= base_url('assets/CSS/ventas.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/CSS/modal_b.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/CSS/modal_corte.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/CSS/modal_e.css'); ?>" rel="stylesheet">
</head>

<body>
    <div class="custom-container">
        <h1>Ventas</h1>
        <div class="custom-search-bar">
            <input type="text" placeholder="Código de producto o nombre de producto">
            <button>Agregar producto</button>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">Buscar</button>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Generar Corte</button>
        </div>
        <div class="custom-payment-buttons">
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal3" class="custom-cash">
                EFECTIVO
                <i class="fas fa-money-bill-wave"></i>
            </button>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal4" class="custom-card">
                TARJETA
                <i class="fas fa-credit-card"></i>
            </button>
        </div>
    </div>

    <!--TABLA-->
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
                <tr>
                    <td>645353</td>
                    <td>Pantalón Jeans</td>
                    <td>3</td>
                    <td>$ 175.00</td>
                    <td class="actions">
                        <button><i class="fas fa-minus-circle"></i></button>
                        <button><i class="fas fa-plus-circle"></i></button>
                        <button><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>645353</td>
                    <td>Pantalón Jeans</td>
                    <td>3</td>
                    <td>$ 175.00</td>
                    <td class="actions">
                        <button><i class="fas fa-minus-circle"></i></button>
                        <button><i class="fas fa-plus-circle"></i></button>
                        <button><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>645353</td>
                    <td>Pantalón Jeans</td>
                    <td>3</td>
                    <td>$ 175.00</td>
                    <td class="actions">
                        <button><i class="fas fa-minus-circle"></i></button>
                        <button><i class="fas fa-plus-circle"></i></button>
                        <button><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Incluir el componente modal y pasarle los datos dinámicos -->
    <?php //$this->load->view('components/modal', $this);
   
    echo $componente;
    echo $componente2;
    echo $componente3;
    echo $componente4;
    ?>

</body>

</html>