<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="header-title">Categorías</h4>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="grid-col">
                                Categorías
                            </div>
                        </div>
                        <div class="col col-lg-2">
                        <button type="button" class="btn btn-flat btn-danger btn-s" onclick="location.href='?c=categoria&a=agregar'">Nueva categoría</button>
                        </div>
                        <div class="col col-lg-2">
                        <button type="button" class="btn btn-flat btn-danger btn-s" onclick="location.href='?c=categoria&a=agregar'">Nueva categoría</button>
                        </div>
                    </div>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Id</th>
                                    <th>Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($this->modelo->Listar() as $r): ?>
                                <tr>
                                    <td><?=$r->id?></td>
                                    <td><?=$r->descripcion?></td>
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