-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.24-log - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para nahuil
CREATE DATABASE IF NOT EXISTS `nahuil` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `nahuil`;

-- Volcando estructura para tabla nahuil.banco
CREATE TABLE IF NOT EXISTS `banco` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.banco: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `banco` DISABLE KEYS */;
INSERT INTO `banco` (`ID`, `DESCRIPCION`) VALUES
	(1, '0');
/*!40000 ALTER TABLE `banco` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.chofer
CREATE TABLE IF NOT EXISTS `chofer` (
  `RUT` varchar(50) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `TELEFONO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`RUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.chofer: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `chofer` DISABLE KEYS */;
INSERT INTO `chofer` (`RUT`, `NOMBRE`, `TELEFONO`) VALUES
	('15601773-6', 'JAVIER DIAZ', '9874654');
/*!40000 ALTER TABLE `chofer` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `RUT` varchar(50) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `TELEFONO` varchar(50) DEFAULT NULL,
  `CIUDAD` varchar(50) DEFAULT NULL,
  `ID_PAIS` int(11) DEFAULT NULL,
  `DIRECCION` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`RUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.cliente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`RUT`, `NOMBRE`, `TELEFONO`, `CIUDAD`, `ID_PAIS`, `DIRECCION`) VALUES
	('14396928-2', 'JUAN PULGAR', '879325465', 'SANTIAGO', 1, 'pasaje uno'),
	('16724346-0', 'DIEGO CARES', '987987', 'SANTIAGO', 1, 'pasaje dos');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.codigo
CREATE TABLE IF NOT EXISTS `codigo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_RUTA` int(11) DEFAULT NULL,
  `ID_TRANSPORTE` int(11) DEFAULT NULL,
  `CODIGO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.codigo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `codigo` DISABLE KEYS */;
/*!40000 ALTER TABLE `codigo` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.concepto
CREATE TABLE IF NOT EXISTS `concepto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIPO` int(11) DEFAULT NULL,
  `DESCRIPCION` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.concepto: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `concepto` DISABLE KEYS */;
INSERT INTO `concepto` (`ID`, `TIPO`, `DESCRIPCION`) VALUES
	(1, 1, 'FACTURACION TRANSPORTE'),
	(2, 1, 'INGRESO TIPO 1'),
	(3, 1, 'INGRESO TIPO 2'),
	(4, 1, 'INGRESO TIPO 3'),
	(5, 2, 'EGRESO TIPO 1'),
	(6, 2, 'EGRESO TIPO 2'),
	(7, 2, 'EGRESO TIPO 3');
/*!40000 ALTER TABLE `concepto` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.embarque
CREATE TABLE IF NOT EXISTS `embarque` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.embarque: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `embarque` DISABLE KEYS */;
INSERT INTO `embarque` (`ID`, `DESCRIPCION`) VALUES
	(1, 'PROPIO'),
	(2, 'A TERCEROS'),
	(3, 'DE TERCEROS');
/*!40000 ALTER TABLE `embarque` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.estado: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`ID`, `DESCRIPCION`) VALUES
	(1, 'CREADA'),
	(2, 'ASIGNADA'),
	(3, 'ENTREGADA'),
	(4, 'FACTURADA'),
	(5, 'ANULADA');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.movimientos
CREATE TABLE IF NOT EXISTS `movimientos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CONCEPTO` int(11) NOT NULL DEFAULT '0',
  `TIPO` int(11) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `MONTO` double DEFAULT NULL,
  `RUT_CLIENTE` varchar(50) DEFAULT NULL,
  `BANCO` int(11) DEFAULT NULL,
  `TIPO_DOC` int(11) DEFAULT NULL,
  `FOLIO_DOC` varchar(50) DEFAULT NULL,
  `TIPO_DOC_FACTURACION` int(11) DEFAULT NULL,
  `FOLIO_DOC_FACTURACION` varchar(50) DEFAULT NULL,
  `GLOSA` varchar(200) DEFAULT NULL,
  `ESTADO` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.movimientos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `movimientos` DISABLE KEYS */;
INSERT INTO `movimientos` (`ID`, `ID_CONCEPTO`, `TIPO`, `FECHA`, `MONTO`, `RUT_CLIENTE`, `BANCO`, `TIPO_DOC`, `FOLIO_DOC`, `TIPO_DOC_FACTURACION`, `FOLIO_DOC_FACTURACION`, `GLOSA`, `ESTADO`) VALUES
	(1, 1, 1, '2019-12-22', 50000, '14396928-2', 0, 1, '1000', 2, '1234', 'PRUEBA', 1),
	(2, 1, 1, '2019-12-30', 150000, '', NULL, 1, '19', 2, '5050', 'ZZZZ FFF', 1),
	(3, 1, 1, '2019-12-30', 78000, '14396928-2', NULL, 1, '3', 2, '7878', 'OBSERVACION DE PRUEBA', 1),
	(4, 1, 1, '2020-01-11', 321, '14396928-2', NULL, 1, '20', 2, '312', '121212 todo ok', 1),
	(5, 2, 1, '2020-01-31', 20000, '', NULL, 0, '0', 2, '0', '', 1),
	(6, 4, 1, '2020-02-02', 48000, '', NULL, 0, '0', 2, '0', 'ZZZZ', 1),
	(7, 6, 2, '2020-01-31', 56000, '', NULL, 0, '0', 2, '0', 'SSSS', 1);
/*!40000 ALTER TABLE `movimientos` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.orden
CREATE TABLE IF NOT EXISTS `orden` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ESTADO` int(11) DEFAULT NULL,
  `RUT_CLIENTE` varchar(50) DEFAULT NULL,
  `PATENTE` varchar(50) DEFAULT NULL,
  `PATENTE_ENGANCHE` varchar(50) DEFAULT NULL,
  `RUT_CHOFER` varchar(50) DEFAULT NULL,
  `FECHA_INICIO_REQUERIDA` date DEFAULT NULL,
  `FECHA_LLEGADA_REQUERIDA` date DEFAULT NULL,
  `TS_CREACION` datetime DEFAULT NULL,
  `TS_ASIGNACION` datetime DEFAULT NULL,
  `TS_ENTREGA` datetime DEFAULT NULL,
  `TS_FACTURACION` datetime DEFAULT NULL,
  `TS_ANULACION` datetime DEFAULT NULL,
  `ID_RUTA` int(11) NOT NULL DEFAULT '0',
  `DIRECCION_SALIDA` varchar(50) DEFAULT NULL,
  `DIRECCION_LLEGADA` varchar(50) DEFAULT NULL,
  `ID_EMBARQUE` int(11) DEFAULT NULL,
  `OBSERVACION` varchar(50) DEFAULT NULL,
  `FECHA_ENTREGA` date DEFAULT NULL,
  `RUT_RECEPTOR` varchar(50) DEFAULT NULL,
  `NOMBRE_RECEPTOR` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.orden: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `orden` DISABLE KEYS */;
INSERT INTO `orden` (`ID`, `ESTADO`, `RUT_CLIENTE`, `PATENTE`, `PATENTE_ENGANCHE`, `RUT_CHOFER`, `FECHA_INICIO_REQUERIDA`, `FECHA_LLEGADA_REQUERIDA`, `TS_CREACION`, `TS_ASIGNACION`, `TS_ENTREGA`, `TS_FACTURACION`, `TS_ANULACION`, `ID_RUTA`, `DIRECCION_SALIDA`, `DIRECCION_LLEGADA`, `ID_EMBARQUE`, `OBSERVACION`, `FECHA_ENTREGA`, `RUT_RECEPTOR`, `NOMBRE_RECEPTOR`) VALUES
	(1, 5, '14396928-2', 'LOPK56', NULL, '15601773-6', '2019-12-15', '2019-12-15', '2019-12-15 21:02:30', NULL, NULL, NULL, '2020-01-11 23:50:23', 1, 'LA CASA 1', 'LA CASA', 2, 'ENTREGAR ENTRE LAS 13:00 Y LAS 16:00 HRS.', NULL, NULL, NULL),
	(2, 5, '16724346-0', 'LOPK56', NULL, '15601773-6', '2019-12-15', '2019-12-15', '2019-12-15 21:02:30', NULL, NULL, NULL, '2019-12-30 02:23:09', 1, 'LA CASA 1', 'LA CASA', 3, 'ENTREGAR ENTRE LAS 13:00 Y LAS 16:00 HRS.', NULL, NULL, NULL),
	(3, 4, '14396928-2', 'LOPK56', NULL, '15601773-6', '2019-12-15', '2019-12-15', '2019-12-15 21:02:30', NULL, NULL, '2019-12-30 02:09:15', NULL, 1, 'LA CASA 1', 'LA CASA', 1, 'OBSERVACION DE PRUEBA', NULL, NULL, NULL),
	(4, 4, '16724346-0', 'LOPK56', NULL, '15601773-6', '2019-12-15', '2019-12-15', '2019-12-15 21:02:30', NULL, NULL, NULL, NULL, 1, 'LA CASA 1', 'LA CASA', 1, NULL, NULL, NULL, NULL),
	(5, 5, '14396928-2', 'LOPK56', NULL, '15601773-6', '2019-12-15', '2019-12-15', '2019-12-15 21:02:30', NULL, NULL, NULL, NULL, 1, 'LA CASA 1', 'LA CASA', 3, NULL, NULL, NULL, NULL),
	(19, 4, '16724346-0', 'LGLT67', '', '15601773-6', '2019-12-30', '2020-01-03', '2019-12-30 00:52:12', '2019-12-30 00:52:49', '2019-12-30 01:35:39', '2019-12-30 02:03:10', NULL, 4, 'XXXX', 'YYYY', 1, 'ZZZZ', '2020-01-14', '14396928-2', 'HHHHH'),
	(20, 4, '14396928-2', 'LGLT67', '', '15601773-6', '2020-01-12', '2020-01-15', '2020-01-11 23:36:34', '2020-01-11 23:41:56', '2020-01-11 23:45:36', '2020-01-11 23:49:46', NULL, 2, 'a', 'b', 1, '121212 todo ok', '2020-01-22', '1111111111-1', 'diego cares');
/*!40000 ALTER TABLE `orden` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.pais
CREATE TABLE IF NOT EXISTS `pais` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.pais: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` (`ID`, `DESCRIPCION`) VALUES
	(1, 'CHILE'),
	(2, 'ARGENTINA'),
	(3, 'BRASIL'),
	(4, 'PERU'),
	(5, 'BOLIVIA');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.ruta
CREATE TABLE IF NOT EXISTS `ruta` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.ruta: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
INSERT INTO `ruta` (`ID`, `DESCRIPCION`) VALUES
	(1, 'CHILE - CHILE'),
	(2, 'CHILE - ARGENTINA'),
	(3, 'ARGENTINA - CHILE'),
	(4, 'CHILE - BRASIL'),
	(5, 'BRASIL - CHILE');
/*!40000 ALTER TABLE `ruta` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.tipo_documento
CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.tipo_documento: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT INTO `tipo_documento` (`ID`, `DESCRIPCION`) VALUES
	(1, 'ORDEN DE TRANSPORTE'),
	(2, 'FACTURA'),
	(3, 'BOLETA');
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.tipo_movimientos
CREATE TABLE IF NOT EXISTS `tipo_movimientos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.tipo_movimientos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_movimientos` DISABLE KEYS */;
INSERT INTO `tipo_movimientos` (`ID`, `DESCRIPCION`) VALUES
	(1, 'INGRESO'),
	(2, 'EGRESO');
/*!40000 ALTER TABLE `tipo_movimientos` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.tipo_transporte
CREATE TABLE IF NOT EXISTS `tipo_transporte` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.tipo_transporte: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_transporte` DISABLE KEYS */;
INSERT INTO `tipo_transporte` (`ID`, `DESCRIPCION`) VALUES
	(1, 'CAMION'),
	(2, 'ENGANCHE');
/*!40000 ALTER TABLE `tipo_transporte` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.transporte
CREATE TABLE IF NOT EXISTS `transporte` (
  `PATENTE` varchar(50) NOT NULL,
  `ID_TIPO_TRANSPORTE` int(11) DEFAULT NULL,
  `MARCA` varchar(50) DEFAULT NULL,
  `MODELO` varchar(50) DEFAULT NULL,
  `AÑO` int(11) DEFAULT NULL,
  `N_CHASIS` varchar(50) DEFAULT NULL,
  `N_MOTOR` varchar(50) DEFAULT NULL,
  `CARGA_MAXIMA` int(11) DEFAULT NULL,
  `ID_ASEGURADORA` int(11) DEFAULT NULL,
  `FOLIO_SEGURO` varchar(50) DEFAULT NULL,
  `VENC_SEGURO` date DEFAULT NULL,
  `VENC_CHILE` date DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  PRIMARY KEY (`PATENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.transporte: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `transporte` DISABLE KEYS */;
INSERT INTO `transporte` (`PATENTE`, `ID_TIPO_TRANSPORTE`, `MARCA`, `MODELO`, `AÑO`, `N_CHASIS`, `N_MOTOR`, `CARGA_MAXIMA`, `ID_ASEGURADORA`, `FOLIO_SEGURO`, `VENC_SEGURO`, `VENC_CHILE`, `ESTADO`) VALUES
	('JN8672', 2, 'UTILITY', '3000R', 2007, '1UYVS25337U022139', NULL, 8400, 1, '74-239417', '2020-01-09', '2028-10-05', 1),
	('LGLT67', 1, 'SCANIA', 'R500A', 2019, '9BSR6X200K3949422', '8339629', 9300, 1, '74-239417', '2020-01-09', '2028-10-05', 1);
/*!40000 ALTER TABLE `transporte` ENABLE KEYS */;

-- Volcando estructura para tabla nahuil.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(50) DEFAULT '0',
  `CONTRASENA` varchar(50) DEFAULT '0',
  `ESTADO` int(11) DEFAULT '0',
  `NOMBRE` varchar(50) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla nahuil.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`ID`, `USUARIO`, `CONTRASENA`, `ESTADO`, `NOMBRE`) VALUES
	(1, 'dcares', 'dcares', 1, 'Diego Cares'),
	(2, 'jpulgar', 'jpulgar', 1, 'Juan Pulgar');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
