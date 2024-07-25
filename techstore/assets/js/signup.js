$(document).ready(function() {
    $('#registroForm').on('submit', function(event) {
        var contrasena = $('#contrasena').val();
        var contrasena2 = $('#contrasena2').val();
        var errorDiv = $('#contrasenaError');
        
        // Limpiar el mensaje de error
        errorDiv.text('');
        
        if (contrasena !== contrasena2) {
            errorDiv.text('Las contraseñas no coinciden.');
            event.preventDefault(); // Evitar el envío del formulario
        }
    });
});