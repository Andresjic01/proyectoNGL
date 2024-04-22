var input = document.getElementById('texto');
var link = document.getElementById('link');
var boton = document.getElementById('button');

// Función que se ejecuta cuando el input está en focus
function onFocus() {
    console.log("El input está en focus.");
    // Mostrar el botón
    link.classList.add('activo');
    boton.classList.remove('activo');
  }
  
  // Función que se ejecuta cuando el input pierde el focus
function onBlur() {
    console.log("El input ha perdido el focus.");
    if (input.value === "") {
        // Si el input está vacío, ocultar el botón
        link.classList.remove('activo');
        boton.classList.add('activo');

    } else {
        // Si el input tiene contenido, mostrar el botón
        boton.classList.remove('activo');

    }
}
 
  
  // Agregar event listener para el evento focus
  input.addEventListener("focus", onFocus);
  
  // Agregar event listener para el evento blur
  input.addEventListener("blur", onBlur);