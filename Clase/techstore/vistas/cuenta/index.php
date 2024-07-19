<div class="content-wrapper">
        <div class="page-title">
            <div>
                <h1>Data table</h1>
                <ul class="breadcrum side">
                    <li>
                        <i class="fa fa-home fa-lg"></i>
                    </li>
                    <li>Tables</li>
                    <li class="activa"><a href="a">Data Table</a></li>
                </ul>
            </div>
            <div><a class="btn btn-primary btn-flat" href="a"></a></div>
        </div>
</div>




<body class="d-flex flex-column h-100">

    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3" id="titulo">Empleados</h3>

            <a href="nuevo.html" class="btn btn-success">Agregar</a>

            <table class="table table-hover table-bordered my-3" aria-describedby="titulo">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Ejemplo de registros de empleados
                    $usuarios = array(
                        array("12345", "JUAN PEREZ", "0123456789", "JUANPEREZ@DOMINIO.COM", "RECURSOS HUMANOS", "AYER"),
                        // Puedes agregar más registros aquí
                    );

                    foreach ($usuarios as $usuarios) {
                        echo "<tr>";
                        echo "<td>" . $usuarios[0] . "</td>";
                        echo "<td>" . $usuarios[1] . "</td>";
                        echo "<td>" . $usuarios[2] . "</td>";
                        echo "<td>" . $usuarios[3] . "</td>";
                        echo "<td>" . $usuarios[4] . "</td>";
                        echo "<td>" . $usuarios[5] . "</td>";
                        echo '<td>
                                <a href="edita.html" class="btn btn-warning btn-sm me-2">Editar</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#eliminaModal" data-bs-id="1">Eliminar</button>
                              </td>';
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <span class="text-body-secondary"> 2024 | Códigos de Programación</span>
        </div>
    </footer>

    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="eliminaModalLabel">Aviso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <form id="form-elimina" action="" method="post">
                        <input type="hidden" name="_method" value="delete">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
    <?php
        require_once "vistas/pie.php";
    ?>
</html>