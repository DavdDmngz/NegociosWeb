<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="header-title">Productos</h4>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="grid-col">
                                Producto
                            </div>
                        </div>
                        <div class="col col-lg-2">
                        <button type="button" class="btn btn-flat btn-danger btn-s" onclick="location.href='?c=producto&a=agregar'">Nuevo producto</button>
                        </div>
                        <div class="col col-lg-2">
                        <button type="button" class="btn btn-flat btn-danger btn-s" onclick="location.href='?c=producto&a=agregar'">Modificar inventario</button>
                        </div>
                    </div>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Fecha de creación</th>
                                    <th>Última actualización</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($this->modelo->Listar() as $r): ?>
                                <tr>
                                    <td><?=$r->id?></td>
                                    <td><?=$r->nombre?></td>
                                    <td><?=$r->email?></td>
                                    <td><?=$r->created_at?></td>
                                    <td><?=$r->updated_at?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>