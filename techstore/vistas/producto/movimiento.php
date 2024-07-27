<form action="?c=producto&a=RegistrarMovimiento" method="post">
    <div class="form-group">
        <label for="producto_id">Producto:</label>
        <select class="form-control" id="producto_id" name="producto_id" required>
            <!-- Opciones de productos -->
        </select>
    </div>
    <div class="form-group">
        <label for="cantidad">Cantidad:</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
    </div>
    <div class="form-group">
        <label for="tipo">Tipo de Movimiento:</label>
        <select class="form-control" id="tipo" name="tipo" required>
            <option value="entrada">Entrada</option>
            <option value="salida">Salida</option>
        </select>
    </div>
    <div class="form-group">
        <label for="observaciones">Observaciones:</label>
        <textarea class="form-control" id="observaciones" name="observaciones"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Registrar Movimiento</button>
</form>
