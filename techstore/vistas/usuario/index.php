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
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Contraseña</th>
                            <th>Fecha de creación</th>
                            <th>Última actualización</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->modelo->Listar() as $r): ?>
                        <tr>
                            <td><?=$r->id?></td>
                            <td><?=$r->nombre?></td>
                            <td><?=$r->apellido?></td>
                            <td><?=$r->email?></td>
                            <td><?=$r->contrasena?></td>
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
