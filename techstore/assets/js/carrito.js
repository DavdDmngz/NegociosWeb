// Función para obtener cookies
function getCookie(nombre) {
    var name = nombre + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookies = decodedCookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(name) === 0) {
            return cookie.substring(name.length, cookie.length);
        }
    }
    return "";
}

// Función para establecer cookies
function setCookie(nombre, valor, dias) {
    var expires = "";
    if (dias) {
        var date = new Date();
        date.setTime(date.getTime() + (dias * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = nombre + "=" + (valor || "") + expires + "; path=/";
}

// Función para agregar un producto al carrito
function agregarAlCarrito(event) {
    event.preventDefault();

    var boton = event.currentTarget;
    var id = boton.getAttribute('data-id');
    var nombre = boton.getAttribute('data-nombre');
    var descripcion = boton.getAttribute('data-descripcion');
    var precio = boton.getAttribute('data-precio');
    var categoria = boton.getAttribute('data-categoria');
    var imagen = boton.getAttribute('data-imagen');
    var cantidad = boton.getAttribute('data-cantidad');

    // Obtener el carrito de cookies o inicializarlo
    var carrito = JSON.parse(getCookie('carrito') || '[]');

    // Agregar el producto al carrito
    carrito.push({ id: id, nombre: nombre, descripcion: descripcion, precio: precio, categoria: categoria, imagen: imagen, cantidad: cantidad });

    // Guardar el carrito actualizado en cookies
    setCookie('carrito', JSON.stringify(carrito), 7); // Expira en 7 días

    // Mostrar mensaje
    alert(nombre + ' agregado al carrito.');
    
    location.reload();
}

// Funciones getCookie y setCookie como antes


// Función para vaciar el carrito y refrescar la página
function vaciarCarrito() {
    setCookie('carrito', JSON.stringify([]), 7); // Establece el carrito como vacío

    // Refrescar la página
    location.reload();
}

// Función para actualizar el contador del carrito
function actualizarContadorCarrito() {
    var carrito = JSON.parse(getCookie('carrito') || '[]');
    var totalProductos = carrito.length;
    document.getElementById('contador-carrito').textContent = totalProductos;
}

function procederAlPago() {
    // Redirigir al controlador para crear el pedido
    window.location.href = '?c=pedido&a=CrearPedido';
}

// Llamar a la función para actualizar el contador al cargar la página
window.onload = function() {
    actualizarContadorCarrito();
};