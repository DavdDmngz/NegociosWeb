<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <button class="btn btn-primary" type="button">Botón</button>
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Precio Compra</th>
                            <th>Precio Venta</th>
                            <th>Marca</th>
                            <th>Cantidad</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->modelo->Listar() as $r): ?>
                        <tr>
                            <td><?=$r->id?></td>
                            <td><?=$r->nombre?></td>
                            <td><?=$r->descripcion?></td>
                            <td><?=$r->tipo_producto?></td>
                            <td><?=$r->precio_compra?></td>
                            <td><?=$r->precio_venta?></td>
                            <td><?=$r->marca?></td>
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
