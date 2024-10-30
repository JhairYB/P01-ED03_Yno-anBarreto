// Función para abrir el modal de nueva denuncia
function abrirModalNuevaDenuncia() {
    document.getElementById("modalNuevaDenuncia").style.display = "block";
}

// Función para cerrar el modal de nueva denuncia
function cerrarModalNuevaDenuncia() {
    document.getElementById("modalNuevaDenuncia").style.display = "none";
}

// Función para confirmar la eliminación de una denuncia
function confirmarEliminacion(id) {
    const modal = document.getElementById("modalEliminar");
    const btnEliminar = document.getElementById("btnEliminar");

    modal.style.display = "block";

    btnEliminar.onclick = function() {
        window.location.href = "controladores/eliminar.php?id=" + id;
    };
}

// Función para cerrar el modal de eliminación
function cerrarModal() {
    document.getElementById("modalEliminar").style.display = "none";
}

// Función para abrir el modal de edición de denuncia
function abrirModalEditar(id, titulo, descripcion, ubicacion, estado, telefono) {
    const modal = document.getElementById("modalEditar");

    document.getElementById("edit-id").value = id;
    document.getElementById("edit-titulo").value = titulo;
    document.getElementById("edit-descripcion").value = descripcion;
    document.getElementById("edit-ubicacion").value = ubicacion;
    document.getElementById("edit-estado").value = estado;
    document.getElementById("edit-telefono").value = telefono; // Agregar el teléfono aquí

    modal.style.display = "block";
}

// Función para cerrar el modal de edición
function cerrarModalEditar() {
    document.getElementById("modalEditar").style.display = "none";
}

// Cerrar modales al hacer clic fuera de ellos
window.onclick = function(event) {
    const modalEliminar = document.getElementById("modalEliminar");
    const modalEditar = document.getElementById("modalEditar");
    const modalNuevaDenuncia = document.getElementById("modalNuevaDenuncia");

    if (event.target === modalEliminar) {
        cerrarModal();
    } else if (event.target === modalEditar) {
        cerrarModalEditar();
    } else if (event.target === modalNuevaDenuncia) {
        cerrarModalNuevaDenuncia();
    }
};
