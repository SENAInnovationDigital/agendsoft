-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2017 a las 08:36:04
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.8

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

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `editarPaciente` (IN `_id` INT, IN `_doc` VARCHAR(20), IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(50), IN `_sexo` VARCHAR(1), IN `_fechaNac` DATE, IN `_rh` VARCHAR(3), IN `_direccion` VARCHAR(50), IN `_ciudad` VARCHAR(30), IN `_tel1` VARCHAR(20), IN `_tel2` VARCHAR(20), IN `_email` VARCHAR(50))  SQL SECURITY INVOKER
UPDATE paciente SET doc_pac= _doc, 
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

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `eliminarPaciente` (IN `_id_pac` INT)  SQL SECURITY INVOKER
DELETE FROM paciente WHERE id_pac = _id_pac$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `eliminarSecretaria` (`_id` INT)  DELETE from secretaria WHERE id_sec = _id$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `historialPaciente` (IN `_id` INT)  SELECT p.nombres_pac, t.descripcion_tra, m.nombres_med, c.fechaIni_cit, c.fechaFin_cit , s.nombres_sec
FROM paciente p, cita c, tratamiento t, diagnostico d, medico m, secretaria s
WHERE p.doc_pac = c.docPac_cit AND p.doc_pac = _id
AND c.docMed_cit = m.doc_med AND c.docSec_cit = s.doc_sec
AND c.id_cit IN (SELECT d.id_cit_dia FROM diagnostico WHERE d.idTra_dia = t.id_tra)$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `RegistroCita` (IN `_fecha_ini` DATE, IN `_fecha_fin` DATE, IN `_idMedico` VARCHAR(20), IN `_idPaciente` VARCHAR(20), IN `_idSecretaria` VARCHAR(20))  INSERT INTO cita( fechaIni_cit, fechaFin_cit, docMed_cit, docPac_cit, docSec_cit)
VALUES( _fecha_ini, _fecha_fin, _idMedico, _idPaciente, _idSecretaria)$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `RegistroMedico` (IN `_id` VARCHAR(20), IN `_nombre` VARCHAR(50), IN `_apellidos` VARCHAR(50), IN `_especialidad` VARCHAR(30), IN `_telefono` VARCHAR(20), IN `_email` VARCHAR(50), IN `_user` VARCHAR(50), IN `_pass` VARCHAR(250), IN `_foto` VARCHAR(400))  SQL SECURITY INVOKER
INSERT INTO medico(doc_med, nombres_med, apellidos_med, especialidad_med, telefono_med, email_med, user_med, pass_med, foto)
VALUES(_id, _nombre, _apellidos, _especialidad, _telefono, _email, _user, _pass, _foto)$$

CREATE DEFINER=`id1345453_agendsoftadsi`@`%` PROCEDURE `RegistroPaciente` (IN `_id` VARCHAR(20), IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(50), IN `_sexo` VARCHAR(1), IN `_fechaNacimiento` DATE, IN `_rh` VARCHAR(3), IN `_direccion` VARCHAR(60), IN `_ciudad` VARCHAR(30), IN `_tel1` VARCHAR(20), IN `_tel2` VARCHAR(20), IN `_email` VARCHAR(50))  SQL SECURITY INVOKER
INSERT into paciente (doc_pac,
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `registroSecretaria` (IN `_doc` VARCHAR(20), IN `_nom` VARCHAR(50), IN `_ape` VARCHAR(50), IN `_tel` VARCHAR(20), IN `_email` VARCHAR(50), IN `_user` VARCHAR(50), IN `_pass` VARCHAR(250))  BEGIN 
	INSERT INTO secretaria(doc_sec, nombres_sec, apellidos_sec, telefono, email_sec, user_sec, pass_sec)
    VALUES(_doc, _nom, _ape, _tel, _email, _user, _pass);
    
    END$$

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
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `apellidos`, `email`, `user`, `pass`) VALUES
(7, 'julio', 'tulio', 'corre@corre.com', 'admin90', '$2y$10$ovEeGwihPxOrjVgciHkthOklP33lLlrsFClSZhWZPQJOxqN/PdUB.');

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
  `aud_tel2_pac_old` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aud_email_pac_old` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_nom_pac_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_ape_pac_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_sex_pac_new` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `aud_fechaNac_pac_new` date NOT NULL,
  `aud_rh_pac_new` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `aud_dir_pac_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_ciu_pac_new` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `aud_tel1_pac_new` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aud_tel2_pac_new` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aud_email_pac_new` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aud_fecha` date NOT NULL,
  `aud_usuario` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `aud_doc_pac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aud_accion` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `email_med` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `user_med` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `pass_med` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(400) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id_med`, `doc_med`, `nombres_med`, `apellidos_med`, `especialidad_med`, `telefono_med`, `email_med`, `user_med`, `pass_med`, `foto`) VALUES
(1, '12345', 'Juan Andres', 'Perez', 'Odontologo', '2434324', 'juanMed@gmail.com', 'Juan123', '$2y$10$b0JScHQM9P2b3CRJDwHI1e6AUESgxnE3U896jkTr1Gk8U/7f0Y0F.', 'panel/fotos/medicos/Juan.jpg');

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
(100, '909090', 'Martha Elena', 'Roman Torres', 'M', '1991-02-08', 'O-', 'Cr5', 'Tuluá', '2292880', '444443', 'martica@hotmail.com');

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
  `telefono` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `email_sec` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `user_sec` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `pass_sec` varchar(250) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `secretaria`
--

INSERT INTO `secretaria` (`id_sec`, `doc_sec`, `nombres_sec`, `apellidos_sec`, `telefono`, `email_sec`, `user_sec`, `pass_sec`) VALUES
(29, '102030', 'Esperanza', 'Ramirez', '123 123 1237', 'esperanza@hotmail.com', 'esperanza', '$2y$10$7bfJlQI39q5TzGP3.IG3guc7ZueM6sQrQjpSZCHEZdK9lkjyjDROe');

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
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `auditoria_cita`
--
ALTER TABLE `auditoria_cita`
  MODIFY `id_aud_cit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `aud_medico`
--
ALTER TABLE `aud_medico`
  MODIFY `aud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `aud_paciente`
--
ALTER TABLE `aud_paciente`
  MODIFY `aud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id_med` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_pac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT de la tabla `secretaria`
--
ALTER TABLE `secretaria`
  MODIFY `id_sec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`docPac_cit`) REFERENCES `paciente` (`doc_pac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_4` FOREIGN KEY (`id_trata`) REFERENCES `tratamiento` (`id_trata`),
  ADD CONSTRAINT `cita_ibfk_8` FOREIGN KEY (`docMed_cit`) REFERENCES `medico` (`doc_med`),
  ADD CONSTRAINT `cita_ibfk_9` FOREIGN KEY (`docSec_cit`) REFERENCES `secretaria` (`doc_sec`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
