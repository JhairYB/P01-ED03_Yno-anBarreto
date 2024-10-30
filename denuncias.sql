-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2024 a las 20:27:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jhairbarreto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncias`
--

CREATE TABLE `denuncias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `estado` enum('Pendiente','En proceso','Resuelto') NOT NULL,
  `ciudadano` varchar(255) NOT NULL,
  `telefono_ciudadano` varchar(20) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `denuncias`
--

INSERT INTO `denuncias` (`id`, `titulo`, `descripcion`, `ubicacion`, `estado`, `ciudadano`, `telefono_ciudadano`, `fecha_registro`) VALUES
(3, 'Denuncia ruidos', 'Se reporta ruido excesivo en la calle.', 'Calle 5', 'Pendiente', 'Juan Perez', '1234567890', '2024-10-30 17:05:00'),
(4, 'Basura acumulada', 'Hay acumulación de basura en el parque.', 'Parque Central', 'En proceso', 'Maria Lopez', '0987654321', '2024-10-30 17:06:00'),
(5, 'Problema de iluminación', 'Las luces de la calle no funcionan.', 'Calle 12', 'Resuelto', 'Carlos Gomez', '2345678901', '2024-10-30 17:07:00'),
(6, 'Fugas de agua', 'Se observa fuga de agua en la esquina.', 'Calle 3', 'Pendiente', 'Ana Torres', '3456789012', '2024-10-30 17:08:00'),
(7, 'Animales sueltos', 'Hay varios perros sueltos en el barrio.', 'Barrio Las Flores', 'En proceso', 'Pedro Ruiz', '4567890123', '2024-10-30 17:09:00'),
(8, 'Tráfico congestionado', 'Se requiere señalización en la intersección.', 'Intersección Calle 6', 'Pendiente', 'Laura Mendez', '5678901234', '2024-10-30 17:10:00'),
(9, 'Agujeros en la calle', 'Se reportan varios agujeros en la vía.', 'Calle 10', 'Pendiente', 'Luis Martinez', '6789012345', '2024-10-30 17:11:00'),
(10, 'Alumbrado deficiente', 'Las luces del parque están apagadas.', 'Parque 1', 'Resuelto', 'Sofia Castro', '7890123456', '2024-10-30 17:12:00'),
(11, 'Problemas con el transporte', 'El transporte público es ineficiente.', 'Estación Central', 'Pendiente', 'Diego Alvarez', '8901234567', '2024-10-30 17:13:00'),
(12, 'Queja por mal estado de la vía', 'La calle está llena de baches.', 'Calle 8', 'En proceso', 'Claudia Jimenez', '9012345678', '2024-10-30 17:14:00'),
(13, 'Robo en la tienda', 'Se reporta un robo en la tienda local.', 'Tienda de Abarrotes', 'Pendiente', 'Fernando Silva', '0123456789', '2024-10-30 17:15:00'),
(14, 'Problemas de drenaje', 'El drenaje no funciona adecuadamente.', 'Calle 7', 'Pendiente', 'Gina Rios', '1234567890', '2024-10-30 17:16:00'),
(15, 'Construcción sin permiso', 'Se están realizando obras sin licencia.', 'Calle 9', 'En proceso', 'Andres Torres', '2345678901', '2024-10-30 17:17:00'),
(16, 'Vandalismo en la plaza', 'Se han dañado los bancos de la plaza.', 'Plaza Principal', 'Pendiente', 'Veronica Peña', '3456789012', '2024-10-30 17:18:00'),
(17, 'Incendio forestal', 'Se reporta un incendio en el bosque.', 'Bosque Verde', 'En proceso', 'Nicolas Vega', '4567890123', '2024-10-30 17:19:00'),
(18, 'Problema de salud pública', 'Hay un brote de enfermedades en la comunidad.', 'Centro de Salud', 'Pendiente', 'Elena Morales', '5678901234', '2024-10-30 17:20:00'),
(19, 'Cierre de calle por construcción', 'Se cierra la calle sin aviso.', 'Calle 4', 'Pendiente', 'Jorge Salas', '6789012345', '2024-10-30 17:21:00'),
(20, 'Inseguridad en el barrio', 'Se reportan varios asaltos recientes.', 'Barrio San José', 'Pendiente', 'Lina Espinoza', '7890123456', '2024-10-30 17:22:00'),
(21, 'Contaminación acústica', 'Se reporta música a alto volumen.', 'Calle 15', 'En proceso', 'Cristian Ortega', '8901234567', '2024-10-30 17:23:00'),
(22, 'Interrupción del suministro eléctrico', 'Se ha ido la luz en toda la zona.', 'Calle 2', 'Pendiente', 'Patricia Ramos', '9012345678', '2024-10-30 17:24:00'),
(23, 'Desbordamiento de alcantarilla', 'La alcantarilla está desbordada.', 'Calle 11', 'Pendiente', 'Hugo Castaño', '0123456789', '2024-10-30 17:25:00'),
(24, 'Destrucción de patrimonio', 'Se han destruido bienes patrimoniales.', 'Centro Histórico', 'Pendiente', 'Camila Martínez', '1234567890', '2024-10-30 17:26:00'),
(25, 'Cuidado con los niños', 'Se necesita un cruce peatonal en la escuela.', 'Escuela Primaria', 'Pendiente', 'Isabel Torres', '2345678901', '2024-10-30 17:27:00'),
(26, 'Mal estado de la acera', 'Las aceras están en mal estado.', 'Calle 13', 'En proceso', 'Rafael Muñoz', '3456789012', '2024-10-30 17:28:00'),
(27, 'Pintadas en las paredes', 'Se han hecho pintadas en las paredes.', 'Calle 14', 'Resuelto', 'Angela Ruiz', '4567890123', '2024-10-30 17:29:00'),
(28, 'Servicios básicos interrumpidos', 'El agua no ha llegado hoy.', 'Calle 1', 'Pendiente', 'Fernando Castro', '5678901234', '2024-10-30 17:30:00'),
(29, 'Maltrato animal', 'Hay un perro maltratado en la calle.', 'Calle 5', 'Resuelto', 'María Álvarez', '6789012345', '2024-10-30 17:31:00'),
(30, 'Accidente de tráfico', 'Se reporta un accidente en la vía.', 'Calle 3', 'Pendiente', 'Oscar Fernández', '7890123456', '2024-10-30 17:32:00'),
(31, 'Exceso de velocidad', 'Se requieren radares en la zona escolar.', 'Calle 4', 'En proceso', 'Lourdes Morales', '8901234567', '2024-10-30 17:33:00'),
(32, 'Fugas de gas', 'Se reporta olor a gas en el área.', 'Calle 6', 'Pendiente', 'Felipe Díaz', '9012345678', '2024-10-30 17:34:00'),
(33, 'Abandono de mascotas', 'Se han abandonado gatos en la calle.', 'Barrio Las Palmas', 'Pendiente', 'Laura Pineda', '0123456789', '2024-10-30 17:35:00'),
(34, 'Construcción en zona prohibida', 'Obras en zona no permitida.', 'Calle 7', 'Pendiente', 'Nora García', '1234567890', '2024-10-30 17:36:00'),
(35, 'Problema con el cableado', 'Cables en mal estado en la calle.', 'Calle 8', 'En proceso', 'Elias Rodríguez', '2345678901', '2024-10-30 17:37:00'),
(36, 'Reclamo por servicio de internet', 'El servicio de internet es muy lento.', 'Calle 9', 'Pendiente', 'Tamara Castro', '3456789012', '2024-10-30 17:38:00'),
(37, 'Desperfecto en el transporte público', 'Los buses no llegan a tiempo.', 'Estación de Buses', 'Pendiente', 'Lucas Serrano', '4567890123', '2024-10-30 17:39:00'),
(38, 'Ruido de construcción', 'La obra genera ruidos molestos.', 'Calle 10', 'Pendiente', 'Ines López', '5678901234', '2024-10-30 17:40:00'),
(39, 'Invasión de propiedad pública', 'Se han invadido terrenos públicos.', 'Barrio El Sol', 'En proceso', 'Hector Aguilar', '6789012345', '2024-10-30 17:41:00'),
(40, 'Problemas de sanidad', 'Se necesita fumigación en la zona.', 'Barrio La Esperanza', 'Pendiente', 'Selene Vargas', '7890123456', '2024-10-30 17:42:00'),
(41, 'Robo en la vivienda', 'Se reporta un robo en la vivienda.', 'Calle 11', 'Pendiente', 'Marcelo Gómez', '8901234567', '2024-10-30 17:43:00'),
(42, 'Contaminación del aire', 'Se reporta contaminación en el área industrial.', 'Zona Industrial', 'En proceso', 'Susana Rivas', '9012345678', '2024-10-30 17:44:00'),
(43, 'Denuncia por acoso', 'Se reporta un caso de acoso en la escuela.', 'Escuela Secundaria', 'Pendiente', 'Julia Romero', '0123456789', '2024-10-30 17:45:00'),
(44, 'Daños en el mobiliario urbano', 'Los bancos del parque están dañados.', 'Parque 2', 'Resuelto', 'Pedro López', '1234567890', '2024-10-30 17:46:00'),
(45, 'Accidente en el cruce', 'Un coche ha chocado en el cruce.', 'Calle 12', 'Pendiente', 'Marta Silva', '2345678901', '2024-10-30 17:47:00'),
(46, 'Erosión en la carretera', 'La carretera presenta erosión peligrosa.', 'Calle 13', 'Pendiente', 'Ricardo Vázquez', '3456789012', '2024-10-30 17:48:00'),
(47, 'Situación de calle', 'Hay personas viviendo en la calle.', 'Calle 14', 'En proceso', 'Cecilia Méndez', '4567890123', '2024-10-30 17:49:00'),
(48, 'Infracción de tránsito', 'Un vehículo se estacionó en la acera.', 'Calle 15', 'Pendiente', 'Diego Hernández', '5678901234', '2024-10-30 17:50:00'),
(49, 'Mal estado de las instalaciones deportivas', 'Las canchas están en mal estado.', 'Polideportivo', 'Pendiente', 'Lorena Martínez', '6789012345', '2024-10-30 17:51:00'),
(50, 'Queja por ruidos de fiesta', 'Se reporta fiesta ruidosa en el vecindario.', 'Calle 16', 'Pendiente', 'Fernando Pérez', '7890123456', '2024-10-30 17:52:00'),
(51, 'Contaminación por vertidos', 'Vertidos contaminantes en el río.', 'Río Azul', 'Pendiente', 'Laura Sánchez', '8901234567', '2024-10-30 17:53:00'),
(52, 'Calle sin mantenimiento', 'La calle no ha recibido mantenimiento.', 'Calle 17', 'Pendiente', 'Victor Ramírez', '9012345678', '2024-10-30 17:54:00'),
(53, 'Queja por servicio de limpieza', 'La limpieza de las calles es insuficiente.', 'Calle 18', 'En proceso', 'Gabriela Castro', '0123456789', '2024-10-30 17:55:00'),
(54, 'Mal estado de los semáforos', 'Los semáforos no funcionan correctamente.', 'Calle 19', 'Pendiente', 'Miguel Ángel Torres', '1234567890', '2024-10-30 17:56:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
