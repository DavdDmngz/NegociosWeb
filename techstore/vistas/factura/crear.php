<h1>Crear Factura</h1>
<form action="?c=factura&a=guardar" method="post">
<label for="factura_id">ID</label>
    <input type="text" name="factura_id" id="factura_id">
    
    <label for="usuario_id">ID de Usuario:</label>
    <input type="text" name="usuario_id" id="usuario_id">
    
    <label for="fecha">Fecha:</label>
    <input type="text" name="fecha" id="fecha">
    
    <label for="total">Total:</label>
    <input type="text" name="total" id="total">
    
    <label for="metodo_pago">Método de Pago:</label>
    <input type="text" name="metodo_pago" id="metodo_pago">
    
    <button type="submit">Guardar</button>
</form>
