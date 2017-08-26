-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2017 a las 23:10:39
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agendsoft`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `consultaCita` ()  SELECT * from cita$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `editarMedico` (`_id` INT, `_doc` VARCHAR(20), `_nombre` VARCHAR(50), `_apellido` VARCHAR(50), `_especialidad` VARCHAR(50), `_tel` VARCHAR(20), `_email` VARCHAR(50))  UPDATE medico 
 set doc_med = _doc, nombres_med = _nombre, apellidos_med = _apellido, especialidad_med = _especialidad, telefono_med = _tel, email_med = _email
 WHERE id_med = _id$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `editarPaciente` (`_id` INT, `_doc` VARCHAR(20), `_nombre` VARCHAR(50), `_apellido` VARCHAR(50), `_sexo` VARCHAR(1), `_fechaNac` DATE, `_rh` VARCHAR(3), `_direccion` VARCHAR(50), `_ciudad` VARCHAR(30), `_tel1` VARCHAR(20), `_tel2` VARCHAR(20), `_email` VARCHAR(50))  UPDATE paciente SET doc_pac= _doc, 
        nombres_pac = _nombre,
        apellidos_pac = _apellido,
        sexo_pac = _sexo, 
        fechaNacimiento_pac = _fechaNac,
        rh_pac = _rh, direccion_pac = _direccion,
        ciudad_pac = _ciudad,
        telefono1_pac = _tel1,
        telefono2_pac = _tel2,
        email_pac = _email
WHERE id_pac = _id$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `editarSecretaria` (IN `_id` INT, IN `_doc` VARCHAR(20), IN `_nombre` VARCHAR(50), IN `_apellidos` VARCHAR(50), IN `_email` VARCHAR(50))  update secretaria set
doc_sec=_doc, 
nombres_sec=_nombre, 
apellidos_sec=_apellidos, 
email_sec=_email
where id_sec=_id$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `eliminarCita` (`_id` INT)  DELETE from cita WHERE id_cita = _id$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `EliminarMedico` (`_id` INT)  DELETE From medico WHERE id_med=_id$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `eliminarPaciente` (`_id` INT)  DELETE FROM paciente WHERE id_pac = _id$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `eliminarSecretaria` (`_id` INT)  DELETE from secretaria WHERE id_sec = _id$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `historialPaciente` (IN `_id` INT)  SELECT p.nombres_pac, t.descripcion_tra, m.nombres_med, c.fechaIni_cit, c.fechaFin_cit , s.nombres_sec
FROM paciente p, cita c, tratamiento t, diagnostico d, medico m, secretaria s
WHERE p.doc_pac = c.docPac_cit AND p.doc_pac = _id
AND c.docMed_cit = m.doc_med AND c.docSec_cit = s.doc_sec
AND c.id_cit IN (SELECT d.id_cit_dia FROM diagnostico WHERE d.idTra_dia = t.id_tra)$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `RegistroCita` (IN `_fecha_ini` DATE, IN `_fecha_fin` DATE, IN `_idMedico` VARCHAR(20), IN `_idPaciente` VARCHAR(20), IN `_idSecretaria` VARCHAR(20))  INSERT INTO cita( fechaIni_cit, fechaFin_cit, docMed_cit, docPac_cit, docSec_cit)
VALUES( _fecha_ini, _fecha_fin, _idMedico, _idPaciente, _idSecretaria)$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `RegistroMedico` (IN `_id` VARCHAR(20), IN `_nombre` VARCHAR(50), IN `_apellidos` VARCHAR(50), IN `_especialidad` VARCHAR(30), IN `_telefono` VARCHAR(20), IN `_email` VARCHAR(50))  INSERT INTO medico(doc_med, nombres_med, apellidos_med, especialidad_med, telefono_med, email_med)
VALUES(_id, _nombre, _apellidos, _especialidad, _telefono, _email)$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `RegistroPaciente` (IN `_id` VARCHAR(20), IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(50), IN `_sexo` VARCHAR(1), IN `_fechaNacimiento` DATE, IN `_rh` VARCHAR(3), IN `_direccion` VARCHAR(60), IN `_ciudad` VARCHAR(30), IN `_tel1` VARCHAR(20), IN `_tel2` VARCHAR(20), IN `_email` VARCHAR(50))  INSERT into paciente (doc_pac,
                        nombres_pac,
                        apellidos_pac, 
                        sexo_pac, 
                        fechaNacimiento_pac,
                        rh_pac,
                        direccion_pac,
                        ciudad_pac, 
                        telefono1_pac,
                        telefono2_pac,
                        email_pac)  
   VALUES ( _id, _nombre, _apellido, _sexo, _fechaNacimiento, _rh, _direccion, _ciudad, _tel1, _tel2, _email )$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `RegistroSecretaria` (IN `_id` VARCHAR(20), IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(50), IN `_email` VARCHAR(50))  INSERT INTO secretaria(doc_sec, nombres_Sec, apellidos_Sec, email_Sec) 
VALUES(_id, _nombre, _apellido, _email)$$

--
-- Funciones
--
CREATE DEFINER=`id1345453_agendsoftadsi`@`%` FUNCTION `cantPacienteFemen` () RETURNS INT(11) BEGIN
DECLARE total int;
SELECT COUNT(*) INTO total FROM paciente WHERE sexo_pac = "F";
RETURN total;
END$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` FUNCTION `cantPacienteMasc` () RETURNS INT(11) BEGIN
DECLARE total int;
SELECT COUNT(*) INTO total FROM paciente WHERE sexo_pac = "M";
RETURN total;
END$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` FUNCTION `contadorCitas` (`_fechaIni` DATETIME, `_fechaFin` DATETIME) RETURNS INT(11) BEGIN
    DECLARE totalcit int;
    
 SELECT COUNT(*) INTO totalcit FROM `cita` WHERE fechaIni_cit >=  _fechaIni AND fechaFin_cit <= _fechaFin;

    RETURN totalcit;

    END$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` FUNCTION `contadorPacientes` () RETURNS INT(11) BEGIN
    DECLARE promedio int;
    
    SELECT COUNT(*) INTO promedio FROM `paciente`;

    RETURN promedio;

    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_cita`
--

CREATE TABLE `auditoria_cita` (
  `id_aud_cit` int(11) NOT NULL,
  `fechaInicio_audCita_old` datetime NOT NULL,
  `fechaFin_audCita_old` datetime NOT NULL,
  `docMed_audCita_old` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `docPac_audCita_old` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `docSec_audCita_old` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_trata_old` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fechaInicio_audCita_new` datetime NOT NULL,
  `fechaFin_audCita_new` datetime NOT NULL,
  `docMed_audCita_new` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `docPac_audCita_new` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `docSec_audCita_new` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_trata_new` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_audCita` datetime NOT NULL,
  `usuario_audCita` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idcita_audCita` int(11) NOT NULL,
  `comentario_audCita` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auditoria_cita`
--

INSERT INTO `auditoria_cita` (`id_aud_cit`, `fechaInicio_audCita_old`, `fechaFin_audCita_old`, `docMed_audCita_old`, `docPac_audCita_old`, `docSec_audCita_old`, `id_trata_old`, `fechaInicio_audCita_new`, `fechaFin_audCita_new`, `docMed_audCita_new`, `docPac_audCita_new`, `docSec_audCita_new`, `id_trata_new`, `fecha_audCita`, `usuario_audCita`, `idcita_audCita`, `comentario_audCita`) VALUES
(1, '2017-04-12 10:00:00', '2017-04-12 11:00:00', '12345', '1112099999', '112233', '', '2017-04-12 10:00:00', '2017-04-12 12:00:00', '12345', '1112099999', '112233', '', '2017-04-13 02:32:52', 'id1345453_agendsofta', 5, 'ActualizacionCita'),
(2, '2017-04-12 10:00:00', '2017-04-12 12:00:00', '12345', '1112099999', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '2017-04-13 02:35:59', 'id1345453_agendsofta', 5, 'DeleteCita'),
(3, '2017-08-24 08:00:00', '2017-08-24 12:00:00', '12345', '1112099859', '112233', '', '2017-08-24 08:00:00', '2017-08-24 08:30:00', '12345', '1112099859', '112233', '', '2017-08-24 22:28:36', 'root@localhost', 1, 'ActualizacionCita'),
(4, '2017-08-25 09:00:00', '2017-08-25 10:05:00', '12345', '32535', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '2017-08-24 23:07:59', 'root@localhost', 2, 'DeleteCita'),
(5, '2017-08-24 08:00:00', '2017-08-24 08:30:00', '12345', '1112099859', '112233', '', '2017-08-24 08:00:00', '2017-08-24 08:30:00', '12345', '1112099859', '112233', '', '2017-08-24 23:09:35', 'root@localhost', 1, 'ActualizacionCita'),
(7, '2017-08-24 08:00:00', '2017-08-24 08:30:00', '12345', '1112099859', '112233', '', '2017-08-24 08:00:00', '2017-08-24 08:30:00', '12345', '1112099859', '112233', '', '2017-08-24 23:10:52', 'root@localhost', 1, 'ActualizacionCita'),
(8, '2017-08-24 08:00:00', '2017-08-24 08:30:00', '12345', '1112099859', '112233', '', '2017-08-24 08:00:00', '2017-08-24 12:30:00', '12345', '1112099859', '112233', '', '2017-08-24 23:19:27', 'root@localhost', 1, 'ActualizacionCita'),
(9, '2017-08-24 08:00:00', '2017-08-24 12:30:00', '12345', '1112099859', '112233', '', '2017-08-24 08:00:00', '2017-08-24 12:30:00', '12345', '1112099859', '112233', '', '2017-08-24 23:19:43', 'root@localhost', 1, 'ActualizacionCita'),
(10, '2017-08-24 08:00:00', '2017-08-24 12:30:00', '12345', '1112099859', '112233', '', '2017-08-24 08:00:00', '2017-08-24 12:30:00', '12345', '1112099859', '112233', '', '2017-08-24 23:19:48', 'root@localhost', 1, 'ActualizacionCita'),
(11, '2017-08-18 20:00:00', '2017-08-18 21:05:00', '12345', '32535', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '2017-08-24 23:20:03', 'root@localhost', 4, 'DeleteCita'),
(12, '2017-08-24 08:00:00', '2017-08-24 12:30:00', '12345', '1112099859', '112233', '', '2017-08-23 09:00:00', '2017-08-23 13:30:00', '12345', '1112099859', '112233', '', '2017-08-24 23:20:25', 'root@localhost', 1, 'ActualizacionCita'),
(13, '2017-08-23 09:00:00', '2017-08-23 13:30:00', '12345', '1112099859', '112233', '', '2017-08-31 09:00:00', '2017-08-31 13:30:00', '12345', '1112099859', '112233', '', '2017-08-24 23:20:31', 'root@localhost', 1, 'ActualizacionCita'),
(14, '2017-08-31 09:00:00', '2017-08-31 13:30:00', '12345', '1112099859', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '2017-08-24 23:20:49', 'root@localhost', 1, 'DeleteCita'),
(15, '2017-08-24 11:00:00', '2017-08-24 12:00:00', '12345', '1113790616', '112233', '', '2017-08-24 11:00:00', '2017-08-24 12:00:00', '12345', '1113790616', '112233', '', '2017-08-24 23:23:12', 'root@localhost', 5, 'ActualizacionCita'),
(16, '2017-08-24 11:00:00', '2017-08-24 12:00:00', '12345', '1113790616', '112233', '', '2017-08-24 10:00:00', '2017-08-24 11:00:00', '12345', '1113790616', '112233', '', '2017-08-24 23:23:20', 'root@localhost', 5, 'ActualizacionCita'),
(17, '2017-08-24 10:00:00', '2017-08-24 11:00:00', '12345', '1113790616', '112233', '', '2017-08-24 10:00:00', '2017-08-24 12:30:00', '12345', '1113790616', '112233', '', '2017-08-24 23:23:23', 'root@localhost', 5, 'ActualizacionCita'),
(18, '2017-08-24 10:00:00', '2017-08-24 12:30:00', '12345', '1113790616', '112233', '', '2017-08-24 10:00:00', '2017-08-24 12:30:00', '12345', '1113790616', '112233', '', '2017-08-24 23:23:33', 'root@localhost', 5, 'ActualizacionCita'),
(19, '2017-08-24 10:00:00', '2017-08-24 12:30:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '2017-08-24 23:23:39', 'root@localhost', 5, 'DeleteCita'),
(20, '2017-08-24 08:00:00', '2017-08-24 09:05:00', '12345', '1113790616', '112233', '', '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '2017-08-24 23:51:19', 'root@localhost', 6, 'ActualizacionCita'),
(21, '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-24 23:52:37', 'root@localhost', 6, 'ActualizacionCita'),
(22, '2017-08-24 08:00:00', '2017-08-24 10:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-24 23:54:03', 'root@localhost', 7, 'ActualizacionCita'),
(23, '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-24 23:55:23', 'root@localhost', 8, 'ActualizacionCita'),
(24, '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-24 23:56:12', 'root@localhost', 9, 'ActualizacionCita'),
(25, '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-24 23:56:47', 'root@localhost', 10, 'ActualizacionCita'),
(26, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-24 23:57:03', 'root@localhost', 10, 'ActualizacionCita'),
(27, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-24 23:57:09', 'root@localhost', 10, 'ActualizacionCita'),
(28, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-24 23:57:14', 'root@localhost', 10, 'ActualizacionCita'),
(29, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-24 23:57:22', 'root@localhost', 10, 'ActualizacionCita'),
(30, '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-24 23:57:49', 'root@localhost', 11, 'ActualizacionCita'),
(31, '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-24 23:58:58', 'root@localhost', 12, 'ActualizacionCita'),
(32, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-24 23:59:01', 'root@localhost', 12, 'ActualizacionCita'),
(33, '2017-08-25 08:00:00', '2017-08-25 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:01:35', 'root@localhost', 13, 'ActualizacionCita'),
(34, '2017-08-25 08:00:00', '2017-08-25 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:07:22', 'root@localhost', 14, 'ActualizacionCita'),
(35, '2017-08-25 08:00:00', '2017-08-25 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:09:25', 'root@localhost', 15, 'ActualizacionCita'),
(36, '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '2017-08-25 00:09:59', 'root@localhost', 16, 'ActualizacionCita'),
(37, '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '2017-08-25 00:09:59', 'root@localhost', 16, 'ActualizacionCita'),
(38, '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '2017-08-25 00:09:59', 'root@localhost', 16, 'ActualizacionCita'),
(39, '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:10:05', 'root@localhost', 16, 'ActualizacionCita'),
(40, '2017-08-25 08:00:00', '2017-08-25 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:10:40', 'root@localhost', 17, 'ActualizacionCita'),
(41, '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:10:57', 'root@localhost', 18, 'ActualizacionCita'),
(42, '2017-08-25 08:00:00', '2017-08-25 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:12:05', 'root@localhost', 19, 'ActualizacionCita'),
(43, '2017-08-17 08:00:00', '2017-08-17 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:15:10', 'root@localhost', 20, 'ActualizacionCita'),
(44, '2017-08-17 08:00:00', '2017-08-17 08:05:00', '12345', '1113790616', '112233', '', '2017-08-17 08:00:00', '2017-08-17 08:05:00', '12345', '1113790616', '112233', '', '2017-08-25 00:16:15', 'root@localhost', 21, 'ActualizacionCita'),
(45, '2017-08-17 08:00:00', '2017-08-17 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:16:36', 'root@localhost', 21, 'ActualizacionCita'),
(46, '2017-08-25 08:00:00', '2017-08-25 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:18:13', 'root@localhost', 22, 'ActualizacionCita'),
(47, '2017-08-25 08:00:00', '2017-08-25 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:20:02', 'root@localhost', 23, 'ActualizacionCita'),
(48, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:20:03', 'root@localhost', 23, 'ActualizacionCita'),
(49, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:20:04', 'root@localhost', 23, 'ActualizacionCita'),
(50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:20:04', 'root@localhost', 23, 'ActualizacionCita'),
(51, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:20:05', 'root@localhost', 23, 'ActualizacionCita'),
(52, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:20:05', 'root@localhost', 23, 'ActualizacionCita'),
(53, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:20:05', 'root@localhost', 23, 'ActualizacionCita'),
(54, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12345', '1113790616', '112233', '', '2017-08-25 00:20:05', 'root@localhost', 23, 'ActualizacionCita'),
(55, '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '2017-08-25 00:31:00', 'root@localhost', 24, 'DeleteCita'),
(56, '2017-08-24 08:00:00', '2017-08-24 08:05:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '2017-08-25 00:31:59', 'root@localhost', 25, 'DeleteCita'),
(57, '2017-08-23 08:00:00', '2017-08-23 08:05:00', '12345', '1113790616', '112233', '', '2017-08-23 08:00:00', '2017-08-23 08:05:00', '12345', '1113790616', '112233', '', '2017-08-25 00:32:12', 'root@localhost', 26, 'ActualizacionCita'),
(58, '2017-08-23 08:00:00', '2017-08-23 08:05:00', '12345', '1113790616', '112233', '', '2017-08-23 08:00:00', '2017-08-23 09:35:00', '12345', '1113790616', '112233', '', '2017-08-25 00:32:37', 'root@localhost', 26, 'ActualizacionCita'),
(59, '2017-08-23 08:00:00', '2017-08-23 09:35:00', '12345', '1113790616', '112233', '', '2017-08-23 08:00:00', '2017-08-23 09:35:00', '12345', '1113790616', '112233', '', '2017-08-25 00:33:37', 'root@localhost', 26, 'ActualizacionCita'),
(60, '2017-08-23 08:00:00', '2017-08-23 09:35:00', '12345', '1113790616', '112233', '', '2017-08-15 08:00:00', '2017-08-15 09:35:00', '12345', '1113790616', '112233', '', '2017-08-25 00:33:43', 'root@localhost', 26, 'ActualizacionCita'),
(61, '2017-08-16 12:00:00', '2017-08-16 13:05:00', '12345', '1113790616', '112233', '', '2017-08-23 12:00:00', '2017-08-23 13:05:00', '12345', '1113790616', '112233', '', '2017-08-25 00:48:46', 'root@localhost', 27, 'ActualizacionCita'),
(62, '2017-08-23 12:00:00', '2017-08-23 13:05:00', '12345', '1113790616', '112233', '', '2017-08-25 12:00:00', '2017-08-25 13:05:00', '12345', '1113790616', '112233', '', '2017-08-25 00:48:54', 'root@localhost', 27, 'ActualizacionCita'),
(63, '2017-08-25 12:00:00', '2017-08-25 13:05:00', '12345', '1113790616', '112233', '', '2017-08-25 12:00:00', '2017-08-25 15:35:00', '12345', '1113790616', '112233', '', '2017-08-25 00:48:59', 'root@localhost', 27, 'ActualizacionCita'),
(64, '2017-08-25 12:00:00', '2017-08-25 15:35:00', '12345', '1113790616', '112233', '', '2017-08-23 10:00:00', '2017-08-23 13:35:00', '12345', '1113790616', '112233', '', '2017-08-25 00:49:04', 'root@localhost', 27, 'ActualizacionCita'),
(65, '2017-08-23 10:00:00', '2017-08-23 13:35:00', '12345', '1113790616', '112233', '', '2017-08-25 08:00:00', '2017-08-25 11:35:00', '12345', '1113790616', '112233', '', '2017-08-25 00:49:09', 'root@localhost', 27, 'ActualizacionCita'),
(66, '2017-08-25 08:00:00', '2017-08-25 11:35:00', '12345', '1113790616', '112233', '', '2017-08-25 10:30:00', '2017-08-25 14:05:00', '12345', '1113790616', '112233', '', '2017-08-25 00:49:13', 'root@localhost', 27, 'ActualizacionCita'),
(67, '2017-08-25 10:30:00', '2017-08-25 14:05:00', '12345', '1113790616', '112233', '', '2017-08-25 10:30:00', '2017-08-25 14:05:00', '12345', '1113790616', '112233', '', '2017-08-25 00:49:23', 'root@localhost', 27, 'ActualizacionCita'),
(68, '2017-08-25 10:30:00', '2017-08-25 14:05:00', '12345', '1113790616', '112233', '', '2017-08-23 10:30:00', '2017-08-23 14:05:00', '12345', '1113790616', '112233', '', '2017-08-25 00:57:58', 'root@localhost', 27, 'ActualizacionCita'),
(69, '2017-08-15 08:00:00', '2017-08-15 09:35:00', '12345', '1113790616', '112233', '', '2017-08-18 08:00:00', '2017-08-18 09:35:00', '12345', '1113790616', '112233', '', '2017-08-26 15:56:50', 'root@localhost', 26, 'ActualizacionCita'),
(70, '2017-08-18 08:00:00', '2017-08-18 09:35:00', '12345', '1113790616', '112233', '', '2017-08-17 08:00:00', '2017-08-17 09:35:00', '12345', '1113790616', '112233', '', '2017-08-26 16:04:48', 'root@localhost', 26, 'ActualizacionCita'),
(71, '2017-08-17 08:00:00', '2017-08-17 09:35:00', '12345', '1113790616', '112233', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '2017-08-26 16:05:07', 'root@localhost', 26, 'DeleteCita'),
(72, '2017-08-23 10:30:00', '2017-08-23 14:05:00', '12345', '1113790616', '112233', '', '2017-08-23 10:30:00', '2017-08-23 14:05:00', '12345', '1113790616', '112233', '', '2017-08-26 16:05:17', 'root@localhost', 27, 'ActualizacionCita'),
(73, '2017-08-23 10:30:00', '2017-08-23 14:05:00', '12345', '1113790616', '112233', '', '2017-08-23 10:30:00', '2017-08-23 14:05:00', '12345', '1113790616', '112233', '', '2017-08-26 16:05:24', 'root@localhost', 27, 'ActualizacionCita'),
(74, '2017-08-23 10:30:00', '2017-08-23 14:05:00', '12345', '1113790616', '112233', '', '2017-08-26 10:30:00', '2017-08-26 14:05:00', '12345', '1113790616', '112233', '', '2017-08-26 16:05:59', 'root@localhost', 27, 'ActualizacionCita'),
(75, '2017-08-26 10:30:00', '2017-08-26 14:05:00', '12345', '1113790616', '112233', '', '2017-08-26 10:30:00', '2017-08-26 13:05:00', '12345', '1113790616', '112233', '', '2017-08-26 16:06:11', 'root@localhost', 27, 'ActualizacionCita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_secretaria`
--

CREATE TABLE `auditoria_secretaria` (
  `docSec_audSec_old` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nomSec_audSec_old` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apesec_audSec_old` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emailSec_audSec_old` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `docSec_audSec_new` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nomSec_audSec_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apesec_audSec_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emailSec_audSec_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_audSec` datetime NOT NULL,
  `user_audSec` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idSec_audSec` int(11) NOT NULL,
  `accion_audSec` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auditoria_secretaria`
--

INSERT INTO `auditoria_secretaria` (`docSec_audSec_old`, `nomSec_audSec_old`, `apesec_audSec_old`, `emailSec_audSec_old`, `docSec_audSec_new`, `nomSec_audSec_new`, `apesec_audSec_new`, `emailSec_audSec_new`, `fecha_audSec`, `user_audSec`, `idSec_audSec`, `accion_audSec`) VALUES
('102030', 'Sandra', 'Prieto', 'sandraPrieto@secretaria.com', '102030', 'Sandra maria', 'Prieto', 'sandraPrieto@secretaria.com', '2017-04-13 02:55:34', 'id1345453_agendsoftadsi@%', 2, 'ActualizaSecretaria'),
('102030', 'Sandra maria', 'Prieto', 'sandraPrieto@secretaria.com', '', '', '', '', '2017-04-13 02:58:13', 'id1345453_agendsoftadsi@%', 2, 'DELETE_Secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_medico`
--

CREATE TABLE `aud_medico` (
  `aud_id` int(11) NOT NULL,
  `aud_nom_med_old` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_ape_med_old` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_esp_med_old` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `aud_tel_med_old` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aud_email_med_old` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_nom_med_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_ape_med_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_esp_med_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_tel_med_new` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `aud_email_med_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_fecha` datetime NOT NULL,
  `aud_usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_id_med` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aud_accion` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `aud_medico`
--

INSERT INTO `aud_medico` (`aud_id`, `aud_nom_med_old`, `aud_ape_med_old`, `aud_esp_med_old`, `aud_tel_med_old`, `aud_email_med_old`, `aud_nom_med_new`, `aud_ape_med_new`, `aud_esp_med_new`, `aud_tel_med_new`, `aud_email_med_new`, `aud_fecha`, `aud_usuario`, `aud_id_med`, `aud_accion`) VALUES
(1, 'julian', 'madera', 'veterinario', '654321', 'medicomadera@adera.com', 'julian', 'maderay', 'veterinario', '654321', 'medicomadera@adera.com', '2017-04-13 02:54:28', 'id1345453_agendsoftadsi@%', '3', 'Actualizacion'),
(2, 'hector', 'Abad', 'Matarife', '01666', 'Elcarnicero@gmail.com', '', '', '', '', '', '2017-04-13 02:56:51', 'id1345453_agendsoftadsi@%', '1', 'Eliminacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_paciente`
--

CREATE TABLE `aud_paciente` (
  `aud_id` int(11) NOT NULL,
  `aud_nom_pac_old` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_ape_pac_old` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_sex_pac_old` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `aud_fechaNac_pac_old` date NOT NULL,
  `aud_rh_pac_old` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `aud_dir_pac_old` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_ciu_pac_old` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `aud_tel1_pac_old` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aud_tel2_pac_old` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aud_email_pac_old` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_nom_pac_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_ape_pac_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_sex_pac_new` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `aud_fechaNac_pac_new` date NOT NULL,
  `aud_rh_pac_new` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `aud_dir_pac_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_ciu_pac_new` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `aud_tel1_pac_new` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aud_tel2_pac_new` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aud_email_pac_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_fecha` date NOT NULL,
  `aud_usuario` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `aud_doc_pac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aud_accion` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `aud_paciente`
--

INSERT INTO `aud_paciente` (`aud_id`, `aud_nom_pac_old`, `aud_ape_pac_old`, `aud_sex_pac_old`, `aud_fechaNac_pac_old`, `aud_rh_pac_old`, `aud_dir_pac_old`, `aud_ciu_pac_old`, `aud_tel1_pac_old`, `aud_tel2_pac_old`, `aud_email_pac_old`, `aud_nom_pac_new`, `aud_ape_pac_new`, `aud_sex_pac_new`, `aud_fechaNac_pac_new`, `aud_rh_pac_new`, `aud_dir_pac_new`, `aud_ciu_pac_new`, `aud_tel1_pac_new`, `aud_tel2_pac_new`, `aud_email_pac_new`, `aud_fecha`, `aud_usuario`, `aud_doc_pac`, `aud_accion`) VALUES
(1, 'Eduard', 'Prieto', 'M', '1991-05-06', 'A+', 'La tulia calle 1', 'la Tulua ', '3143422312', '2324', 'eduar.ap@hotmail.com', '', '', '', '0000-00-00', '', '', '', '', '', '', '2017-04-13', 'id1345453_agendsoftadsi@%', '1113790616', 'Eliminacion'),
(2, 'El brayan', 'Rojasalio', 'M', '2017-09-11', 'C8', 'Calle 9', 'bucaramanga tulia', '21434', '23324', 'Kuiefq@hotmial.com', 'JULIO toquw', 'Rojasalio', 'M', '2017-09-11', 'C8', 'Calle 9', 'bucaramanga tulia', '21434', '23324', 'Kuiefq@hotmial.com', '2017-04-13', 'id1345453_agendsoftadsi@%', '32535', 'Actualizacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cit` int(11) NOT NULL,
  `docPac_cit` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `docMed_cit` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `docSec_cit` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `id_trata` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `fechaIni_cit` datetime NOT NULL,
  `fechaFin_cit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cit`, `docPac_cit`, `docMed_cit`, `docSec_cit`, `id_trata`, `fechaIni_cit`, `fechaFin_cit`) VALUES
(6, '1113790616', '12345', '112233', '#40E0D0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '1113790616', '12345', '112233', '#40E0D0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '1113790616', '12345', '112233', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '1113790616', '12345', '112233', '#40E0D0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '1113790616', '12345', '112233', '#FF8C00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '1113790616', '12345', '112233', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '1113790616', '12345', '112233', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '1113790616', '12345', '112233', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '1113790616', '12345', '112233', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '1113790616', '12345', '112233', '#40E0D0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '1113790616', '12345', '112233', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '1113790616', '12345', '112233', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '1113790616', '12345', '112233', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '1113790616', '12345', '112233', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '1113790616', '12345', '112233', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '1113790616', '12345', '112233', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '1113790616', '12345', '112233', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '1113790616', '12345', '112233', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '1113790616', '12345', '112233', '#0071c5', '2017-08-26 10:30:00', '2017-08-26 13:05:00');

--
-- Disparadores `cita`
--
DELIMITER $$
CREATE TRIGGER `ActualizaCitas` BEFORE UPDATE ON `cita` FOR EACH ROW INSERT into auditoria_cita(fechainicio_audCita_old, fechaFin_audCita_old,docMed_audCita_old, docpac_audcita_old,docsec_audCita_old,fechainicio_audCita_new, fechaFin_audCita_new,docMed_audCita_new, docpac_audcita_new,docsec_audCita_new,fecha_audCita,usuario_audCita,idCita_audCita,comentario_audCita)
Values(old.fechaIni_cit,old.fechaFin_cit,old.docMed_cit,old.docPac_cit,old.docSec_cit,new.fechaIni_cit,new.fechaFin_cit,new.docMed_cit,new.docPac_cit,new.docSec_cit, NOW(), CURRENT_USER,new.id_cit,'ActualizacionCita')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deleteCitas` BEFORE DELETE ON `cita` FOR EACH ROW INSERT into auditoria_cita(fechainicio_audCita_old, fechaFin_audCita_old,docMed_audCita_old, docpac_audcita_old,docsec_audCita_old,fecha_audCita,usuario_audCita,idCita_audCita,comentario_audCita)
Values(old.fechaIni_cit,old.fechaFin_cit,old.docMed_cit,old.docPac_cit,old.docSec_cit, NOW(), CURRENT_USER,old.id_cit,'DeleteCita')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `id_dia` int(11) NOT NULL,
  `id_cit_dia` int(11) NOT NULL,
  `idTra_dia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id_med` int(11) NOT NULL,
  `doc_med` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombres_med` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos_med` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `especialidad_med` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_med` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email_med` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id_med`, `doc_med`, `nombres_med`, `apellidos_med`, `especialidad_med`, `telefono_med`, `email_med`) VALUES
(3, '12345', 'julian', 'maderay', 'veterinario', '654321', 'medicomadera@adera.com');

--
-- Disparadores `medico`
--
DELIMITER $$
CREATE TRIGGER `audMedicoEliminar` BEFORE DELETE ON `medico` FOR EACH ROW INSERT INTO aud_medico(aud_nom_med_old, aud_ape_med_old, aud_esp_med_old, aud_tel_med_old, aud_email_med_old, aud_fecha, aud_usuario, aud_id_med, aud_accion)
VALUES(old.nombres_med, old.apellidos_med, old.especialidad_med, old.telefono_med, old.email_med, NOW(), CURRENT_USER(), old.id_med, 'Eliminacion')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `audMedicoUpdate` BEFORE UPDATE ON `medico` FOR EACH ROW INSERT INTO aud_medico(aud_nom_med_old, aud_ape_med_old, aud_esp_med_old, aud_tel_med_old, aud_email_med_old, aud_nom_med_new, aud_ape_med_new, aud_esp_med_new, aud_tel_med_new, aud_email_med_new, aud_fecha, aud_usuario, aud_id_med, aud_accion)
VALUES(old.nombres_med, old.apellidos_med, old.especialidad_med, old.telefono_med, old.email_med, new.nombres_med, new.apellidos_med, new.especialidad_med, new.telefono_med, new.email_med, NOW(), CURRENT_USER(), new.id_med, 'Actualizacion')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_pac` int(11) NOT NULL,
  `doc_pac` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombres_pac` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos_pac` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo_pac` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `fechaNacimiento_pac` date NOT NULL,
  `rh_pac` varchar(3) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion_pac` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `ciudad_pac` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono1_pac` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono2_pac` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email_pac` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_pac`, `doc_pac`, `nombres_pac`, `apellidos_pac`, `sexo_pac`, `fechaNacimiento_pac`, `rh_pac`, `direccion_pac`, `ciudad_pac`, `telefono1_pac`, `telefono2_pac`, `email_pac`) VALUES
(1, '1112099999', 'Miguel Antonio', 'Rojas Martinez', 'M', '1988-10-05', 'A+', 'Calle Tulua', 'Tulua', '3153113979', NULL, 'rojas.miguel@outlook.com'),
(7, '1112099859', '2Miguel Antonio', 'Rojas Martinez', 'M', '1988-10-05', 'A+', 'Calle Tulua', 'Tulua', '3153113979', NULL, 'rojas.miguel@outlook.com'),
(8, '1113790617', '2Eduard', 'Prieto', 'M', '1991-05-06', 'A+', 'La tulia calle 1', 'la Tulia', '3143422312', '2324', 'eduar.ap@hotmail.com'),
(9, '32535', 'JULIO toquw', 'Rojasalio', 'M', '2017-09-11', 'C8', 'Calle 9', 'bucaramanga tulia', '21434', '23324', 'Kuiefq@hotmial.com'),
(10, '1113790616', 'Edwar Alexander', 'Prieto Grajales', 'M', '1996-05-16', 'A+', 'La Tulia', 'Bolivar', '315134351', '313423535', 'notengo@gmail.com');

--
-- Disparadores `paciente`
--
DELIMITER $$
CREATE TRIGGER `aud_pacienteDELETE` BEFORE DELETE ON `paciente` FOR EACH ROW INSERT INTO aud_paciente(aud_nom_pac_old, aud_ape_pac_old, aud_sex_pac_old, aud_fechaNac_pac_old, aud_rh_pac_old, aud_dir_pac_old, aud_ciu_pac_old, aud_tel1_pac_old, aud_tel2_pac_old, aud_email_pac_old, aud_fecha, aud_usuario, aud_doc_pac, aud_accion)
VALUES(old.nombres_pac, old.apellidos_pac, old.sexo_pac, old.fechaNacimiento_pac, old.rh_pac, old.direccion_pac, old.ciudad_pac, old.telefono1_pac, old.telefono2_pac, 
old.email_pac, 
 NOW(), CURRENT_USER(), old.doc_pac, 'Eliminacion')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `aud_pacienteUpdate` BEFORE UPDATE ON `paciente` FOR EACH ROW INSERT INTO aud_paciente(aud_nom_pac_old,
            aud_ape_pac_old, 
            aud_sex_pac_old, aud_fechaNac_pac_old, 
             aud_rh_pac_old, 
            aud_dir_pac_old, aud_ciu_pac_old, 
            aud_tel1_pac_old, aud_tel2_pac_old, 
            aud_email_pac_old, aud_nom_pac_new, aud_ape_pac_new, aud_sex_pac_new, aud_fechaNac_pac_new, aud_rh_pac_new, aud_dir_pac_new, aud_ciu_pac_new, aud_tel1_pac_new, aud_tel2_pac_new, aud_email_pac_new, aud_fecha, aud_usuario, aud_doc_pac, aud_accion)
VALUES(old.nombres_pac, old.apellidos_pac, old.sexo_pac, old.fechaNacimiento_pac, old.rh_pac, old.direccion_pac, old.ciudad_pac, old.telefono1_pac, old.telefono2_pac, 
old.email_pac, 
new.nombres_pac, new.apellidos_pac, new.sexo_pac, new.fechaNacimiento_pac, new.rh_pac, old.direccion_pac, new.ciudad_pac, new.telefono1_pac, new.telefono2_pac, 
new.email_pac, NOW(), CURRENT_USER(), new.doc_pac, 'Actualizacion')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretaria`
--

CREATE TABLE `secretaria` (
  `id_sec` int(11) NOT NULL,
  `doc_sec` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombres_sec` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos_sec` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `email_sec` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `secretaria`
--

INSERT INTO `secretaria` (`id_sec`, `doc_sec`, `nombres_sec`, `apellidos_sec`, `email_sec`) VALUES
(1, '112233', 'lina', 'ruiz', 'linaruiz@secre.com');

--
-- Disparadores `secretaria`
--
DELIMITER $$
CREATE TRIGGER `ActualizaSecretaria` BEFORE UPDATE ON `secretaria` FOR EACH ROW insert into auditoria_secretaria(docSec_audSec_old,                                nomSec_audSec_old,apeSec_audSec_old,                                
                                emailSec_audSec_old,docSec_audSec_new,                                nomSec_audSec_new,
                                apeSec_audSec_new,
                                emailSec_audSec_new,fecha_audSec,user_audSec,idSec_audSec,accion_audSec)
values (old.doc_sec, old.nombres_sec, old.apellidos_sec,old.email_sec,new.doc_sec, new.nombres_sec, new.apellidos_sec,new.email_sec,now(),CURRENT_USER,new.id_sec,'ActualizaSecretaria')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `DeleteSecretaria` BEFORE DELETE ON `secretaria` FOR EACH ROW insert into auditoria_secretaria(docSec_audSec_old,nomSec_audSec_old,apeSec_audSec_old,emailSec_audSec_old,fecha_audSec,user_audSec,idSec_audSec,accion_audSec)
values (old.doc_sec, old.nombres_sec, old.apellidos_sec,old.email_sec,now(),CURRENT_USER,old.id_sec,'DELETE_Secretaria')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id_trata` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_tra` varchar(535) COLLATE utf8_spanish2_ci NOT NULL,
  `duracion_tra` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`id_trata`, `descripcion_tra`, `duracion_tra`) VALUES
('#0071c5', 'Ortodoncia', '2 años'),
('#40E0D0', 'Limpieza', '1 Hora'),
('#FF8C00', 'Periodoncia', '2 Horas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria_cita`
--
ALTER TABLE `auditoria_cita`
  ADD PRIMARY KEY (`id_aud_cit`);

--
-- Indices de la tabla `aud_medico`
--
ALTER TABLE `aud_medico`
  ADD PRIMARY KEY (`aud_id`);

--
-- Indices de la tabla `aud_paciente`
--
ALTER TABLE `aud_paciente`
  ADD PRIMARY KEY (`aud_id`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cit`),
  ADD KEY `idMed_cit` (`docMed_cit`),
  ADD KEY `idPac_cit` (`docPac_cit`),
  ADD KEY `idSec_cit` (`docSec_cit`),
  ADD KEY `id_trata` (`id_trata`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`id_dia`),
  ADD KEY `idTra_dia` (`idTra_dia`),
  ADD KEY `idTra_dia_2` (`idTra_dia`),
  ADD KEY `id_cit_dia` (`id_cit_dia`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_med`),
  ADD UNIQUE KEY `doc_med` (`doc_med`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_pac`),
  ADD UNIQUE KEY `doc_pac` (`doc_pac`);

--
-- Indices de la tabla `secretaria`
--
ALTER TABLE `secretaria`
  ADD PRIMARY KEY (`id_sec`),
  ADD UNIQUE KEY `doc_sec` (`doc_sec`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id_trata`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria_cita`
--
ALTER TABLE `auditoria_cita`
  MODIFY `id_aud_cit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT de la tabla `aud_medico`
--
ALTER TABLE `aud_medico`
  MODIFY `aud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `aud_paciente`
--
ALTER TABLE `aud_paciente`
  MODIFY `aud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id_med` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_pac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `secretaria`
--
ALTER TABLE `secretaria`
  MODIFY `id_sec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`docPac_cit`) REFERENCES `paciente` (`doc_pac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`docMed_cit`) REFERENCES `medico` (`doc_med`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`docSec_cit`) REFERENCES `secretaria` (`doc_sec`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_4` FOREIGN KEY (`id_trata`) REFERENCES `tratamiento` (`id_trata`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
