-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-02-2024 a las 18:40:22
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id19750923_sar`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `activacion_inactivacion_cita` (IN `id_p` TINYINT, IN `estado_p` ENUM("activo","inactivo"))   UPDATE cita SET estado_cita=estado_p WHERE id_cita=id_p$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `activacion_inactivacion_servicio` (IN `id_p` TINYINT, IN `estado_p` ENUM("activo","inactivo"))   UPDATE servicio SET estado_servicio=estado_p WHERE id_servicio=id_p$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `activacion_inactivacion_usuarios` (IN `id_p` TINYINT, IN `estado_p` ENUM("activo","inactivo"))   UPDATE usuario SET estado=estado_p WHERE id_usuario=id_p$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `actualizacion_admin` (IN `id_p` TINYINT, IN `nombre_p` VARCHAR(255), IN `nombre_u_p` VARCHAR(255), IN `direccion_p` VARCHAR(255), IN `tip_doc_p` ENUM("Registro Civil","Tarjeta de Identidad","Cedula de Ciudadania","Cedula de Extranjeria","Pasaporte","Carnet Diplomatico","Permiso Especial de Permanencia","Salvo Conducto"), IN `num_doc_p` BIGINT, IN `telefono_p` BIGINT, IN `clave_p` VARCHAR(255), IN `titulo_universitario_p` ENUM("si","no"), IN `genero_p` ENUM("masculino","femenino"), IN `fecha_nac_p` DATE, IN `correo_p` VARCHAR(255), IN `anosexperiencia_p` TINYINT)   UPDATE usuario
  SET rol_usuario=1 , nombre=nombre_p ,direccion=direccion_p, tip_doc=tip_doc_p, num_doc=num_doc_p, telefono=telefono_p , fecha_nac=fecha_nac_p ,
  correo=correo_p ,titulo_universitario=titulo_universitario_p ,genero=genero_p , casa_residente=null , porte_armas=null , anosexperiencia=anosexperiencia_p , nombre_u=nombre_u_p , contrasena=clave_p
  WHERE id_usuario=id_p$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `actualizacion_residente` (IN `id_p` TINYINT, IN `nombre_p` VARCHAR(255), IN `nombre_u_p` VARCHAR(255), IN `tip_doc_p` ENUM("Registro Civil","Tarjeta de Identidad","Cedula de Ciudadania","Cedula de Extranjeria","Pasaporte","Carnet Diplomatico","Permiso Especial de Permanencia","Salvo Conducto"), IN `num_doc_p` BIGINT, IN `telefono_p` BIGINT, IN `clave_p` VARCHAR(255), IN `genero_p` ENUM("masculino","femenino"), IN `fecha_nac_p` DATE, IN `correo_p` VARCHAR(255), IN `casa_residente_p` TINYINT)   UPDATE usuario 
  SET rol_usuario=2 , nombre=nombre_p ,direccion=null, tip_doc=tip_doc_p, num_doc=num_doc_p, telefono=telefono_p , fecha_nac=fecha_nac_p ,
  correo=correo_p ,titulo_universitario= null,genero=genero_p , casa_residente=casa_residente_p , porte_armas=null , anosexperiencia=null , nombre_u=nombre_u_p , contrasena=clave_p, estado=estado_p
  WHERE id_usuario=id_p$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `actualizacion_vigilante` (IN `id_p` TINYINT, IN `nombre_p` VARCHAR(255), IN `nombre_u_p` VARCHAR(255), IN `direccion_p` VARCHAR(255), IN `tip_doc_p` ENUM("Registro Civil","Tarjeta de Identidad","Cedula de Ciudadania","Cedula de Extranjeria","Pasaporte","Carnet Diplomatico","Permiso Especial de Permanencia","Salvo Conducto"), IN `num_doc_p` BIGINT, IN `telefono_p` BIGINT, IN `clave_p` VARCHAR(255), IN `genero_p` ENUM("masculino","femenino"), IN `fecha_nac_p` DATE, IN `correo_p` VARCHAR(255), IN `porte_armas_p` ENUM("si","no"), IN `anosexperiencia_p` TINYINT)   UPDATE usuario 
  SET rol_usuario=3 , nombre=nombre_p ,direccion=direccion_p, tip_doc=tip_doc_p, num_doc=num_doc_p, telefono=telefono_p , fecha_nac=fecha_nac_p ,estado=estado_p,
  correo=correo_p ,titulo_universitario= null,genero=genero_p , casa_residente=null , porte_armas=porte_armas_p , anosexperiencia=anosexperiencia_p , nombre_u=nombre_u_p , contrasena=clave_p
  WHERE id_usuario=id_p$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `consulta_citas` ()   select * from cita$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `consulta_cita_id` (IN `id_p` TINYINT)   select * from cita where id_uresidente =id_p$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `consulta_cita_ordenado` ()   select * from cita order by  fecha_hora DESC$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `consulta_servicios` ()   select * from servicio$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `consulta_usuarios` ()   select * from usuario$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `consulta_usuario_id` (IN `id_p` TINYINT)   select * from usuario where id_usuario=id_p$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `informacion_cita` (IN `id_p` TINYINT)   SELECT * FROM ofrece where id_rcita=id_p$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `registrar_admin` (IN `anosexperiencia_p` TINYINT, IN `direccion_p` VARCHAR(255), IN `titulo_universitario_p` ENUM("si","no"), IN `nombre_p` VARCHAR(255), IN `genero_p` ENUM("masculino","femenino"), IN `tip_doc_p` ENUM("Registro Civil","Tarjeta de Identidad","Cedula de Ciudadania","Cedula de Extranjeria","Pasaporte","Carnet Diplomatico","Permiso Especial de Permanencia","Salvo Conducto"), IN `num_doc_p` BIGINT, IN `telefono_p` BIGINT, IN `correo_p` VARCHAR(255), IN `fecha_nac_p` DATE, IN `nombre_u_p` VARCHAR(255), IN `contrasena_p` VARCHAR(255))   INSERT INTO usuario (rol_usuario, nombre,direccion, tip_doc, num_doc, telefono , fecha_nac , correo ,titulo_universitario ,genero , casa_residente , porte_armas , anosexperiencia , nombre_u , contrasena) 
VALUES (1, nombre_p ,direccion_p, tip_doc_p, num_doc_p , telefono_p , fecha_nac_p , correo_p ,titulo_universitario_p, genero_p , null , null , anosexperiencia_p , nombre_u_p , contrasena_p)$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `registrar_residente` (IN `casa_residente_p` TINYINT, IN `nombre_p` VARCHAR(255), IN `genero_p` ENUM("masculino","femenino"), IN `tip_doc_p` ENUM("Registro Civil","Tarjeta de Identidad","Cedula de Ciudadania","Cedula de Extranjeria","Pasaporte","Carnet Diplomatico","Permiso Especial de Permanencia","Salvo Conducto"), IN `num_doc_p` BIGINT, IN `telefono_p` BIGINT, IN `correo_p` VARCHAR(255), IN `fecha_nac_p` DATE, IN `nombre_u_p` VARCHAR(255), IN `contrasena_p` VARCHAR(255))   INSERT INTO usuario (rol_usuario, nombre,direccion, tip_doc, num_doc, telefono , fecha_nac , correo ,titulo_universitario ,genero , casa_residente , porte_armas , anosexperiencia , nombre_u , contrasena) 
VALUES (2, nombre_p ,null, tip_doc_p, num_doc_p , telefono_p , fecha_nac_p , correo_p ,null, genero_p , casa_residente_p , null , null , nombre_u_p , contrasena_p)$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `registrar_vigilante` (IN `anosexperiencia_p` TINYINT, IN `direccion_p` VARCHAR(255), IN `porte_armas_p` ENUM("si","no"), IN `nombre_p` VARCHAR(255), IN `genero_p` ENUM("masculino","femenino"), IN `tip_doc_p` ENUM("Registro Civil","Tarjeta de Identidad","Cedula de Ciudadania","Cedula de Extranjeria","Pasaporte","Carnet Diplomatico","Permiso Especial de Permanencia","Salvo Conducto"), IN `num_doc_p` BIGINT, IN `telefono_p` BIGINT, IN `correo_p` VARCHAR(255), IN `fecha_nac_p` DATE, IN `nombre_u_p` VARCHAR(255), IN `contrasena_p` VARCHAR(255))   INSERT INTO usuario (rol_usuario, nombre,direccion, tip_doc, num_doc, telefono , fecha_nac , correo ,titulo_universitario ,genero , casa_residente , porte_armas , anosexperiencia , nombre_u , contrasena) 
VALUES (3, nombre_p ,direccion_p, tip_doc_p, num_doc_p , telefono_p , fecha_nac_p , correo_p ,null, genero_p , null , porte_armas_p , anosexperiencia_p , nombre_u_p , contrasena_p)$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `registro_cita` (IN `id_up` TINYINT, IN `fecha_p` DATETIME)   INSERT INTO cita (fecha_hora,id_uadmin,id_uresidente) 
VALUES (fecha_p,1,id_up)$$

CREATE DEFINER=`id19750923_user`@`%` PROCEDURE `registro_servicio` (IN `nombre_sp` VARCHAR(255), IN `descrip_p` VARCHAR(255))   INSERT INTO servicio (nombre_ser,descripcion_ser) 
VALUES (nombre_sp,descrip_p)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` tinyint(3) UNSIGNED NOT NULL,
  `estado_cita` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  `fecha_hora` datetime NOT NULL,
  `id_uadmin` tinyint(3) UNSIGNED DEFAULT NULL,
  `id_uresidente` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `estado_cita`, `fecha_hora`, `id_uadmin`, `id_uresidente`) VALUES
(1, 'activo', '2022-04-22 12:30:00', 1, 4),
(2, 'activo', '2022-04-22 12:40:00', 1, 5),
(3, 'activo', '2022-04-22 13:30:00', 1, 6),
(4, 'activo', '2022-04-23 11:30:00', 1, 7),
(5, 'activo', '2022-04-24 10:30:00', 1, 8),
(6, 'activo', '2022-04-25 12:30:00', 1, 9),
(7, 'activo', '2022-04-25 15:30:00', 1, 10),
(8, 'activo', '2022-04-25 16:30:00', 1, 11),
(9, 'activo', '2022-04-27 12:30:00', 1, 12),
(10, 'activo', '2022-04-28 12:30:00', 1, 13),
(11, 'activo', '2022-04-29 12:30:00', 1, 14),
(12, 'activo', '2022-04-30 12:30:00', 1, 15),
(13, 'activo', '2022-05-01 10:30:00', 1, 16),
(14, 'activo', '2022-05-01 11:30:00', 1, 17),
(15, 'activo', '2022-05-01 12:30:00', 1, 18),
(16, 'activo', '2022-05-10 12:30:00', 1, 19),
(17, 'activo', '2022-05-11 12:30:00', 1, 20),
(18, 'activo', '2022-05-11 13:30:00', 1, 21),
(19, 'activo', '2022-05-12 12:30:00', 1, 22),
(20, 'activo', '2022-05-13 12:30:00', 1, 23),
(21, 'activo', '2022-05-14 12:30:00', 1, 24),
(22, 'activo', '2022-05-16 12:30:00', 1, 25),
(23, 'activo', '2022-05-20 12:30:00', 1, 4),
(24, 'activo', '2022-05-21 12:30:00', 1, 18),
(25, 'activo', '2022-05-25 12:30:00', 1, 23),
(26, 'activo', '2022-05-26 10:30:00', 1, 18),
(27, 'activo', '2022-05-26 11:30:00', 1, 7),
(28, 'activo', '2022-05-27 12:30:00', 1, 17),
(29, 'activo', '2022-05-28 12:30:00', 1, 5),
(30, 'activo', '2022-05-29 12:30:00', 1, 12),
(31, 'activo', '2022-12-28 11:04:00', 1, 25),
(32, 'activo', '2022-10-26 11:22:00', 1, 25),
(33, 'activo', '2022-10-27 00:34:00', 1, 25),
(34, 'activo', '2022-12-20 16:58:00', 1, 25),
(35, 'inactivo', '2022-12-27 13:42:00', 1, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofrece`
--

CREATE TABLE `ofrece` (
  `id_rservicio` tinyint(3) UNSIGNED DEFAULT NULL,
  `id_rcita` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ofrece`
--

INSERT INTO `ofrece` (`id_rservicio`, `id_rcita`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(13, 14),
(14, 15),
(15, 16),
(16, 17),
(18, 19),
(19, 20),
(20, 21),
(21, 22),
(22, 23),
(24, 24),
(25, 25),
(17, 26),
(11, 27),
(4, 28),
(7, 29),
(17, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` tinyint(3) UNSIGNED NOT NULL,
  `estado_servicio` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  `descripcion_ser` varchar(255) DEFAULT NULL,
  `nombre_ser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `estado_servicio`, `descripcion_ser`, `nombre_ser`) VALUES
(1, 'activo', 'atencion especializada con el administrador para sacar el chip de acceso', 'chip acceso'),
(2, 'activo', 'atencion especializada con el administrador', 'consulta con el administrador'),
(3, 'activo', 'atencion especializada con el administrador pago de la administracion', 'pago administracion'),
(4, 'activo', 'atencion especializada con el administrador por las fallas en los contadores ', 'falla contadores'),
(5, 'activo', 'atencion especializada con el administrador corto circuto en el generador ', 'fallas en la electricidad'),
(6, 'activo', 'reservaciones parqueadero', 'reservaciones parqueadero'),
(7, 'activo', 'reservaciones parqueadero', 'reservaciones parqueadero'),
(8, 'activo', 'reservaciones parqueadero', 'reservaciones parqueadero'),
(9, 'activo', 'reservaciones parqueadero', 'reservaciones parqueadero'),
(10, 'activo', 'reservaciones parqueadero', 'reservaciones parqueadero'),
(11, 'activo', 'reservaciones parqueadero', 'reservaciones parqueadero'),
(12, 'activo', 'reservaciones salon comunal cumpleaños', 'reservaciones salon comunal'),
(13, 'activo', 'reservaciones salon comunal baby shower', 'reservaciones salon comunal'),
(14, 'activo', 'reservaciones salon comunal boda', 'reservaciones salon comunal'),
(15, 'activo', 'reservaciones salon comunal fiesta', 'reservaciones salon comunal'),
(16, 'activo', 'reservaciones salon comunal reunion de trabajo', 'reservaciones salon comunal'),
(17, 'activo', 'Me robaron la cicla dentro del conjunto', 'Seguridad del Conjunto'),
(18, 'activo', 'Me dañaron una matera que habia en la puerta de mi casa', 'Seguridad del Conjunto'),
(19, 'activo', 'Me rayaron las paredes con aerosol', 'Seguridad del Conjunto'),
(20, 'activo', 'Me prestan el salon comunal para los XV de mi hija', 'Salon Comunal'),
(21, 'activo', 'Me prestan el salon comunal para una fiesta del cumpleaños de mi tia', 'Salon Comunal'),
(22, 'activo', 'Me golpearon el carro y lo abollaron', 'Seguridad del Conjunto'),
(23, 'activo', 'Hay niños jugando futbol al lado de mi casa y pueden romper mis plantas', 'Seguridad del Conjunto'),
(24, 'activo', 'Los perros dejan excremento en la puerta de mi casa', 'No recoger las heces de los perros'),
(25, 'activo', 'Dañaron los columpios del parque', 'Uso inadecuado del parque'),
(26, 'activo', 'Alto volumen de la musica en la casa del residente 7', 'Seguridad del Conjunto'),
(27, 'activo', 'Consumen drogas dentro del parque', 'Uso inadecuado del parque'),
(28, 'activo', 'violencia de vecinos en el conjunto', 'Seguridad del Conjunto'),
(29, 'activo', 'me pincharon el carro', 'Seguridad del Conjunto'),
(30, 'activo', 'El celador me trato mal', 'quejas'),
(31, 'activo', 'quiero que me presten el salon comunal para celebrar un matrimonio', 'Salon comunal'),
(32, 'activo', 'Cita para reservar cupo de parqueadero', 'Parqueaderos'),
(33, 'activo', 'Quince años', 'Salon comunal'),
(34, 'activo', 'hgsajkgbhfsdf', 'Zonas comunes'),
(35, 'activo', 'Robos en la entrada.', 'Seguridad'),
(36, 'activo', 'vecinos ruidosos', 'Convivencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `nombre_u` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  `tip_doc` enum('Registro Civil','Tarjeta de Identidad','Cedula de Ciudadania','Cedula de Extranjeria','Pasaporte','Carnet Diplomatico','Permiso Especial de Permanencia','Salvo Conducto') NOT NULL,
  `num_doc` bigint(20) UNSIGNED NOT NULL,
  `telefono` bigint(20) UNSIGNED NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `titulo_universitario` enum('si','no') DEFAULT NULL,
  `genero` enum('masculino','femenino') NOT NULL,
  `rol_usuario` enum('administrador','residente','vigilante') NOT NULL,
  `fecha_nac` date NOT NULL,
  `correo` varchar(255) NOT NULL,
  `casa_residente` tinyint(3) UNSIGNED DEFAULT NULL,
  `porte_armas` enum('si','no') DEFAULT NULL,
  `anosexperiencia` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `nombre_u`, `direccion`, `estado`, `tip_doc`, `num_doc`, `telefono`, `contrasena`, `titulo_universitario`, `genero`, `rol_usuario`, `fecha_nac`, `correo`, `casa_residente`, `porte_armas`, `anosexperiencia`) VALUES
(1, 'Juan Osorio', 'juan_o', 'CRA 126 #130-51', 'activo', 'Cedula de Ciudadania', 1028400257, 314329223, 'juan1234', 'si', 'masculino', 'administrador', '1982-05-26', 'juanosorio@gmail.com', NULL, NULL, 7),
(2, 'Jorge Pérez', 'Jorge_p', 'CRA 126#130-52', 'activo', 'Cedula de Ciudadania', 1028400256, 314329223, 'Jorge1234', NULL, 'masculino', 'vigilante', '1987-07-23', 'Jorgepérez@gmail.com', NULL, 'si', 14),
(3, 'Antonio posada', 'antonio_p', NULL, 'activo', 'Cedula de Ciudadania', 13707322, 3127240654, 'Antonio 1234', NULL, 'masculino', 'residente', '1966-01-13', 'antonioposada@gmail.com', 75, NULL, NULL),
(4, 'carlos sanchez', 'carlos_s', NULL, 'activo', 'Cedula de Ciudadania', 13707366, 314329862, 'carlos_123', NULL, 'masculino', 'residente', '2000-06-23', 'carlossanchez@gmail.com', 1, NULL, NULL),
(5, 'jose gimenez', 'jose_g', NULL, 'activo', 'Cedula de Ciudadania', 13707987, 32106458, 'jose_123', NULL, 'masculino', 'residente', '1999-06-05', 'josegimenez@gmail.com', 2, NULL, NULL),
(6, 'sofia meza', 'sofia_m', NULL, 'activo', 'Cedula de Ciudadania', 13707251, 314329862, 'sofia_123', NULL, 'femenino', 'residente', '1998-03-21', 'sofiameza@gmail.com', 3, NULL, NULL),
(7, 'rodrigo guzman', 'rodrigo_1', NULL, 'activo', 'Cedula de Ciudadania', 70068923, 314789235, 'rodrigo_123', NULL, 'masculino', 'residente', '1986-12-31', 'rodrigoguzman@gmail.com', 4, NULL, NULL),
(8, 'sandra castillo', 'sandra_c', NULL, 'activo', 'Cedula de Ciudadania', 706982341, 305689237, 'sandra_123', NULL, 'femenino', 'residente', '1976-08-23', 'sandracastillo@gmail.com', 5, NULL, NULL),
(9, 'rogelio pataquiva', 'rogelio_p', NULL, 'activo', 'Cedula de Ciudadania', 10568931101, 30789563, 'rogelio_123', NULL, 'masculino', 'residente', '1996-03-12', 'rogeliopataquiva@gmail.com', 6, NULL, NULL),
(10, 'camila gomez', 'camila_g', NULL, 'activo', 'Cedula de Ciudadania', 32016547, 321869432, 'camila_123', NULL, 'femenino', 'residente', '2001-09-21', 'camilagomez@gmail.com', 7, NULL, NULL),
(11, 'sebastian torres', 'sebastian_t', NULL, 'activo', 'Cedula de Ciudadania', 301213452, 32189364, 'sebastian_123', NULL, 'masculino', 'residente', '0986-08-01', 'sebastiantorres@gmail.com', 8, NULL, NULL),
(12, 'david villanueva', 'david_v', NULL, 'activo', 'Cedula de Ciudadania', 647268991, 321869486, 'david_123', NULL, 'masculino', 'residente', '1993-10-01', 'davidvillanueva@gmail.com', 9, NULL, NULL),
(13, 'cristian santodomingo', 'cristian_s', NULL, 'activo', 'Cedula de Ciudadania', 986230145, 32186943, 'cristian_123', NULL, 'masculino', 'residente', '1999-09-21', 'cristiansantodomingo@gmail.com', 101, NULL, NULL),
(14, 'david santodomingo', 'david_s', NULL, 'activo', 'Cedula de Ciudadania', 986230169, 32186852, 'santodavid_123', NULL, 'masculino', 'residente', '1999-09-21', 'davidsantodomingo@gmail.com', 101, NULL, NULL),
(15, 'messi david', 'messi_d', NULL, 'activo', 'Cedula de Ciudadania', 963230145, 32174143, 'messi_123', NULL, 'masculino', 'residente', '2001-09-11', 'messidavid@gmail.com', 97, NULL, NULL),
(16, 'Jaider Martinez', 'JaiMartinez', NULL, 'activo', 'Cedula de Ciudadania', 1024874839, 320256763, '12jaider', NULL, 'masculino', 'residente', '1989-05-23', 'JaiderMmCastro@gmail.com', 15, NULL, NULL),
(17, 'David Rojas', 'DaviROR', NULL, 'activo', 'Cedula de Ciudadania', 1011474539, 323257036, '89ROR', NULL, 'masculino', 'residente', '1984-02-02', 'RORDAVID@gmail.com', 29, NULL, NULL),
(18, 'Camilo Casallas', 'CamiCasallas2', NULL, 'activo', 'Cedula de Ciudadania', 1010884469, 312457983, 'Cami2', NULL, 'masculino', 'residente', '1999-05-08', 'CamCamgmail.com', 67, NULL, NULL),
(19, 'Fernanda Vanegas Lopez', 'Frechalamaspercha', NULL, 'activo', 'Cedula de Ciudadania', 1011018273, 314816089, 'amor32', NULL, 'femenino', 'residente', '2000-10-28', 'Ferchasau.u@gmail.com', 13, NULL, NULL),
(20, 'Carla Machado', 'CarlaMac', NULL, 'activo', 'Cedula de Ciudadania', 94893241, 119873478, 'fiau45', NULL, 'femenino', 'residente', '1979-12-30', 'Carlaaaaaaa@gmail.com', 98, NULL, NULL),
(21, 'Juan Peña', 'JuanPenas', NULL, 'activo', 'Cedula de Extranjeria', 5630895262, 232398871, 'pena34', NULL, 'masculino', 'residente', '2001-06-10', 'Pokerman@gmail.com', 69, NULL, NULL),
(22, 'Elian Rodriguez', 'ElianR', NULL, 'activo', 'Cedula de Ciudadania', 1011789321, 444523924, 'elian33', NULL, 'masculino', 'residente', '2000-01-23', 'Powerranger32@gmail.com', 32, NULL, NULL),
(23, 'Brayan Perez', 'Elperezpri', NULL, 'activo', 'Cedula de Ciudadania', 1032788384, 323238822, 'perico23', NULL, 'masculino', 'residente', '1987-09-11', 'SoloMilloslok@gmail.com', 14, NULL, NULL),
(24, 'Josue Quijano', 'Aragangg2', NULL, 'activo', 'Cedula de Ciudadania', 1032798285, 932396094, 'socio', NULL, 'masculino', 'residente', '2000-07-29', 'NitratodeNich0so@gmail.com', 27, NULL, NULL),
(25, 'Felipe Cucalon', 'ElCucalon', NULL, 'activo', 'Cedula de Ciudadania', 1055938372, 202385834, '123pipe', NULL, 'masculino', 'residente', '2005-02-05', 'Diosesvida@gmail.com', 47, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD UNIQUE KEY `fecha_hora` (`fecha_hora`),
  ADD KEY `fk_id_uadmin` (`id_uadmin`),
  ADD KEY `fk_id_uresidente` (`id_uresidente`);

--
-- Indices de la tabla `ofrece`
--
ALTER TABLE `ofrece`
  ADD KEY `fk_id_rservicio` (`id_rservicio`),
  ADD KEY `fk_id_rcita` (`id_rcita`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `num_doc` (`num_doc`),
  ADD UNIQUE KEY `contrasena` (`contrasena`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_id_uadmin` FOREIGN KEY (`id_uadmin`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_id_uresidente` FOREIGN KEY (`id_uresidente`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `ofrece`
--
ALTER TABLE `ofrece`
  ADD CONSTRAINT `fk_id_rcita` FOREIGN KEY (`id_rcita`) REFERENCES `cita` (`id_cita`),
  ADD CONSTRAINT `fk_id_rservicio` FOREIGN KEY (`id_rservicio`) REFERENCES `servicio` (`id_servicio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
