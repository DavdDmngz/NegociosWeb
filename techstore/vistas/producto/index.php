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
                        <div class="col-md-auto">
                            <div class="grid-col">
                                Productos
                            </div>
                        </div>
                        <div class="col col-lg-2">
                        <button type="button" class="btn btn-flat btn-danger btn-s" onclick="location.href='?c=producto&a=agregar'">Nuevo producto</button>

                        </div>
                    </div>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Categoria</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Imagen</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($this->modelo->Listar() as $r): ?>
                                <tr>
                                    <td><?=$r->id?></td>
                                    <td><?=$r->nombre?></td>
                                    <td><?=$r->descripcion?></td>
                                    <td><?=$r->id_categoria?></td>
                                    <td><?=$r->precio?></td>
                                    <td><?=$r->cantidad?></td>
                                    <td><?=$r->imagen?></td>
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