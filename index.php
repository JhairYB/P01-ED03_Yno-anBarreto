<?php
 
include 'modelos/db.php';

 $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

$registros_por_pagina = 10;

// Calcula la página actual y el inicio de los registros
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1; // Página actual
$inicio = ($pagina - 1) * $registros_por_pagina; // Registro inicial para la consulta

// Consulta para obtener el total de denuncias (para calcular el número de páginas)
$sql_total = "SELECT COUNT(*) FROM denuncias WHERE titulo LIKE :busqueda OR ciudadano LIKE :busqueda";
$stmt_total = $pdo->prepare($sql_total);
$stmt_total->execute([':busqueda' => '%' . $busqueda . '%']);
$total_denuncias = $stmt_total->fetchColumn(); // Total de denuncias encontradas

// Consulta para obtener solo las denuncias de la página actual
$sql = "SELECT * FROM denuncias WHERE titulo LIKE :busqueda OR ciudadano LIKE :busqueda LIMIT :inicio, :registros_por_pagina";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':busqueda', '%' . $busqueda . '%', PDO::PARAM_STR); // Vincula la búsqueda
$stmt->bindValue(':inicio', (int) $inicio, PDO::PARAM_INT); // Vincula el inicio
$stmt->bindValue(':registros_por_pagina', (int) $registros_por_pagina, PDO::PARAM_INT); // Vincula los registros por página
$stmt->execute();
$denuncias = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtiene todas las denuncias

// Calcula el total de páginas
$total_paginas = ceil($total_denuncias / $registros_por_pagina);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denuncias</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Enlaza la hoja de estilos -->
    <script src="js/script.js" defer></script> <!-- Enlaza el archivo de JavaScript -->
</head>

<body>
    <div class="sidebar">
        <h2>PNL</h2>
        <nav>
            <a href="#">Denuncias</a>
        </nav>
    </div>

    <div class="main-content">
        <h1>Denuncias</h1>

        <div class="actions">
            <button class="btn btn-new" onclick="abrirModalNuevaDenuncia()">Nuevo</button>
            <button class="btn btn-show-all" onclick="mostrarTodas()">Mostrar Todas</button>
            <form id="formBuscar" method="get" action="" class="search-bar">
                <input type="text" name="busqueda" placeholder="Buscar..." required>
                <button type="submit" class="btn btn-search">Buscar</button>
            </form>
        </div>

        <table class="denuncias-table">
            <thead>
                <tr>
                    <th>Opciones</th>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Ubicación</th>
                    <th>Ciudadano</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($denuncias as $denuncia): ?>
                <tr>
                    <td>
                        <button class="btn-icon editar" onclick="abrirModalEditar(
                            <?= htmlspecialchars($denuncia['id']) ?>,
                            '<?= htmlspecialchars($denuncia['titulo']) ?>',
                            '<?= htmlspecialchars($denuncia['descripcion']) ?>',
                            '<?= htmlspecialchars($denuncia['ubicacion']) ?>',
                            '<?= htmlspecialchars($denuncia['estado']) ?>',
                            '<?= htmlspecialchars($denuncia['telefono_ciudadano']) ?>',
                            '<?= htmlspecialchars($denuncia['fecha_registro']) ?>'
                        )">✏️</button>
                        <button class="btn-icon eliminar" onclick="confirmarEliminacion(<?= $denuncia['id'] ?>)">🗑️</button>
                    </td>
                    <td><?= htmlspecialchars($denuncia['id']) ?></td>
                    <td><?= htmlspecialchars($denuncia['titulo']) ?></td>
                    <td><?= htmlspecialchars($denuncia['descripcion']) ?></td>
                    <td><?= htmlspecialchars($denuncia['ubicacion']) ?></td>
                    <td><?= htmlspecialchars($denuncia['ciudadano']) ?></td>
                    <td><?= htmlspecialchars($denuncia['telefono_ciudadano']) ?></td>
                    <td><?= htmlspecialchars($denuncia['fecha_registro']) ?></td>
                    <td>
                        <?= htmlspecialchars($denuncia['estado']) ?>
                        <span class="status-circle <?= strtolower(str_replace(' ', '-', $denuncia['estado'])) ?>"></span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="pagination">
            <?php if ($pagina > 1): ?>
                <a href="?pagina=<?= $pagina - 1 ?>&busqueda=<?= urlencode($busqueda) ?>">Anterior</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                <a href="?pagina=<?= $i ?>&busqueda=<?= urlencode($busqueda) ?>" class="<?= ($i == $pagina) ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($pagina < $total_paginas): ?>
                <a href="?pagina=<?= $pagina + 1 ?>&busqueda=<?= urlencode($busqueda) ?>">Siguiente</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal de Nueva Denuncia -->
    <div id="modalNuevaDenuncia" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarModalNuevaDenuncia()">&times;</span>
            <h2>Nueva Denuncia</h2>
            <form id="formNuevaDenuncia" method="post" action="vistas/agregar.php">
                <!-- Campos del formulario para crear una nueva denuncia -->
                <div class="form-group">
                    <label for="nuevo-ciudadano">Ciudadano:</label>
                    <input type="text" name="ciudadano" id="nuevo-ciudadano" required>
                </div>
                <div class="form-group">
                    <label for="nuevo-telefono">Teléfono:</label>
                    <input type="tel" name="telefono" id="nuevo-telefono" required>
                </div>
                <div class="form-group">
                    <label for="nuevo-titulo">Título:</label>
                    <input type="text" name="titulo" id="nuevo-titulo" required>
                </div>
                <div class="form-group">
                    <label for="nuevo-descripcion">Descripción:</label>
                    <textarea name="descripcion" id="nuevo-descripcion" required></textarea>
                </div>
                <div class="form-group">
                    <label for="nuevo-ubicacion">Ubicación:</label>
                    <input type="text" name="ubicacion" id="nuevo-ubicacion" required>
                </div>
                <div class="form-group">
                    <label for="nuevo-fecha">Fecha:</label>
                    <input type="date" name="fecha" id="nuevo-fecha" required>
                </div>
                <div class="form-group">
                    <label for="nuevo-estado">Estado:</label>
                    <select name="estado" id="nuevo-estado">
                        <option value="Pendiente">Pendiente</option>
                        <option value="En proceso">En proceso</option>
                        <option value="Resuelto">Resuelto</option>
                    </select>
                </div>
                <div class="modal-buttons">
                    <button type="button" class="btn" onclick="cerrarModalNuevaDenuncia()">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar Denuncia</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de Eliminación -->
    <div id="modalEliminar" class="modal">
        <div class="modal-content modal-delete">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <h2>Eliminar registro</h2>
            <p>¿Deseas eliminar el registro?</p>
            <button class="btn" onclick="cerrarModal()">Cerrar</button>
            <button class="btn btn-danger" id="btnEliminar">Eliminar</button>
        </div>
    </div>

    <!-- Modal de Edición -->
    <div id="modalEditar" class="modal">
        <div class="modal-content modal-edit">
            <span class="close" onclick="cerrarModalEditar()">&times;</span>
            <h2>Editar Denuncia</h2>
            <form id="formEditar" method="post" action="controladores/editar.php">
                <input type="hidden" name="id" id="edit-id"> <!-- Campo oculto para el ID -->
                <!-- Campos del formulario para editar una denuncia -->
                <div class="form-group">
                    <label for="edit-titulo">Título:</label>
                    <input type="text" name="titulo" id="edit-titulo" required>
                </div>
                <div class="form-group">
                    <label for="edit-descripcion">Descripción:</label>
                    <textarea name="descripcion" id="edit-descripcion" required></textarea>
                </div>
                <div class="form-group">
                    <label for="edit-ubicacion">Ubicación:</label>
                    <input type="text" name="ubicacion" id="edit-ubicacion" required>
                </div>
                <div class="form-group">
                    <label for="edit-estado">Estado:</label>
                    <select name="estado" id="edit-estado" required>
                        <option value="Pendiente">Pendiente</option>
                        <option value="En proceso">En proceso</option>
                        <option value="Resuelto">Resuelto</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit-telefono">Teléfono:</label>
                    <input type="tel" name="telefono" id="edit-telefono" required>
                </div>
                <div class="modal-buttons">
                    <button type="button" class="btn" onclick="cerrarModalEditar()">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Función para mostrar todas las denuncias
        function mostrarTodas() {
            window.location.href = 'index.php'; // Redirige a la página principal
        }
    </script>
</body>
</html>
