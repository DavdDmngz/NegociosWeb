<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>
<body>
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Inicio</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="index.html">Inicio</a></li>
                        <li><span>Inicio</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Cuenta<i class="fa fa-angle-down"></i></h4>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?c=usuario&a=logout">Cerrar sesión</a>
                    </div>
                    <ul class="notification-area pull-right">
                        <li class="dropdown">
                            <i class="fa fa-shopping-cart dropdown-toggle" data-toggle="dropdown">
                                <span id="contador-carrito">0</span>
                            </i>
                            <div class="dropdown-menu notify-box nt-enveloper-box">
                                <h5 class="notify-title">Carrito</h5>
                                <div class="cart">
                                    <div class="cart-items">
                                        <div class="carrito-contenedor">
                                            <?php
                                            $carrito = json_decode($_COOKIE['carrito'] ?? '[]');
                                            if (empty($carrito)): ?>
                                                <p>Tu carrito está vacío.</p>
                                            <?php else: ?>
                                                <table class="carrito-tabla">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Precio</th>
                                                            <th>Cantidad</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $totalCarrito = 0;
                                                        foreach ($carrito as $producto):
                                                            $totalProducto = $producto->precio; // Solo si tienes una cantidad
                                                            $totalCarrito += $totalProducto; ?>
                                                            <tr>
                                                                <td><?=$producto->nombre?></td>
                                                                <td>$<?=$producto->precio?></td>
                                                                <td>1</td> <!-- Cambiar si implementas cantidad -->
                                                                <td>$<?=$totalProducto?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="3">Total Carrito</th>
                                                            <th>$<?=$totalCarrito?></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <button class="btn btn-success" onclick="procederAlPago()">Proceder al Pago</button>
                                                <button class="empty-cart" onclick="vaciarCarrito()">Vaciar Carrito</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- page title area end -->

    <!-- Aquí puedes añadir más contenido de tu página -->

    <!-- Enlace al archivo de JavaScript -->
    <script>
        // Llama a la función para actualizar el contador del carrito cuando la página se carga
        window.onload = function() {
            actualizarContadorCarrito();
        };
    </script>
</body>
</html>
