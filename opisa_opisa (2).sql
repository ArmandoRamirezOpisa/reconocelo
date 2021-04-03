-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-04-2021 a las 17:07:56
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `opisa_opisa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Administrador`
--

CREATE TABLE `Administrador` (
  `Usuario` varchar(50) NOT NULL,
  `Pwd` varchar(45) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `CodPrograma` int(11) DEFAULT NULL,
  `CodEmpresa` int(11) DEFAULT NULL,
  `Personalizado` int(11) DEFAULT NULL,
  `typeTicket` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Atencion`
--

CREATE TABLE `Atencion` (
  `IdTicket` int(11) NOT NULL,
  `idCanje` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `idParticipante` int(11) NOT NULL,
  `mensaje` varchar(300) NOT NULL,
  `solucion` varchar(300) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `FechaCreacion` date NOT NULL,
  `FechaFinalizacion` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AtencionTicket`
--

CREATE TABLE `AtencionTicket` (
  `IdTicket` int(11) NOT NULL,
  `idCanje` int(11) DEFAULT NULL,
  `idParticipante` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `FechaCreacion` date DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AtencionTicketDetalle`
--

CREATE TABLE `AtencionTicketDetalle` (
  `IdTicket` int(11) DEFAULT NULL,
  `mensaje` varchar(500) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `loginWeb` varchar(40) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Canje`
--

CREATE TABLE `Canje` (
  `idCanje` double NOT NULL,
  `codPrograma` int(11) DEFAULT NULL,
  `idParticipante` int(11) NOT NULL DEFAULT '0',
  `noFolio` int(11) NOT NULL DEFAULT '0',
  `feSolicitud` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `noIP` varchar(15) NOT NULL DEFAULT '',
  `noTipoEntrega` tinyint(4) NOT NULL DEFAULT '1',
  `CalleNumero` varchar(45) DEFAULT NULL,
  `Colonia` varchar(35) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  `Ciudad` varchar(35) DEFAULT NULL,
  `Estado` varchar(15) DEFAULT NULL,
  `Telefono` varchar(16) DEFAULT NULL,
  `esExportado` tinyint(1) NOT NULL DEFAULT '0',
  `fhExp` date DEFAULT NULL,
  `folioExp` int(11) DEFAULT NULL,
  `expOperador` varchar(80) DEFAULT NULL,
  `idPartWeb` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1 = activo',
  `referencias` text,
  `DescargadoParaSqlServer` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CanjeDetalle`
--

CREATE TABLE `CanjeDetalle` (
  `codPrograma` int(11) NOT NULL,
  `idCanje` int(11) NOT NULL DEFAULT '0',
  `idPreCanjeDet` smallint(6) NOT NULL DEFAULT '0',
  `CodPremio` int(11) NOT NULL DEFAULT '0',
  `Cantidad` smallint(6) NOT NULL DEFAULT '0',
  `PuntosXUnidad` int(11) NOT NULL DEFAULT '0',
  `idPartWeb` int(11) DEFAULT NULL,
  `Mensajeria` varchar(10) DEFAULT NULL,
  `NumeroGuia` varchar(400) DEFAULT NULL,
  `Status` varchar(50) DEFAULT 'Pendiente'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CategoriaPremio`
--

CREATE TABLE `CategoriaPremio` (
  `CodCategoria` int(11) NOT NULL DEFAULT '0',
  `nbCategoria` varchar(60) NOT NULL DEFAULT '',
  `esBaja` tinyint(1) NOT NULL DEFAULT '0',
  `nbCategoria_Ing` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ClavesPartWeb`
--

CREATE TABLE `ClavesPartWeb` (
  `id` int(11) NOT NULL,
  `idParticipante` double NOT NULL,
  `pwd` varchar(10) DEFAULT NULL,
  `codPrograma` int(11) DEFAULT NULL,
  `acReglas` int(1) DEFAULT '0' COMMENT 'Acepta Reglas',
  `ip` varchar(15) NOT NULL COMMENT 'IP de acceso ',
  `fhAcepta` datetime NOT NULL COMMENT 'Fecha de aceptación'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cliente`
--

CREATE TABLE `Cliente` (
  `codPrograma` int(11) NOT NULL DEFAULT '0',
  `codCliente` int(11) NOT NULL DEFAULT '0',
  `Nombre` varchar(50) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `CalleNumero` varchar(45) DEFAULT NULL,
  `Colonia` varchar(35) DEFAULT NULL,
  `Ciudad` varchar(35) DEFAULT NULL,
  `Estado` varchar(15) DEFAULT NULL,
  `Pais` varchar(25) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  `Telefono` varchar(16) DEFAULT NULL,
  `Fax` varchar(16) DEFAULT NULL,
  `EMail` varchar(60) DEFAULT NULL,
  `Responsable` varchar(60) DEFAULT NULL,
  `Puesto` varchar(30) DEFAULT NULL,
  `TipoMov` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ClienteEmpresa`
--

CREATE TABLE `ClienteEmpresa` (
  `codPrograma` int(11) NOT NULL DEFAULT '0',
  `codCliente` int(11) NOT NULL DEFAULT '0',
  `codEmpresa` int(11) NOT NULL DEFAULT '0',
  `CodClienteEmpresa` varchar(20) DEFAULT NULL,
  `RutaZona` varchar(30) DEFAULT NULL,
  `TipoMov` char(1) DEFAULT NULL,
  `TipoCliente` char(3) DEFAULT NULL,
  `IdGrupo` varchar(255) DEFAULT NULL,
  `ClienteCadena` varchar(255) DEFAULT NULL,
  `idCadena` int(11) DEFAULT NULL,
  `PuntosAsignados` int(11) DEFAULT NULL,
  `PuntosOtrosCtes` int(11) DEFAULT NULL,
  `idRuta` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ClienteEmpresaPart`
--

CREATE TABLE `ClienteEmpresaPart` (
  `codPrograma` int(11) NOT NULL DEFAULT '0',
  `codCliente` int(11) NOT NULL DEFAULT '0',
  `codEmpresa` int(11) NOT NULL DEFAULT '0',
  `codParticipante` int(11) NOT NULL DEFAULT '0',
  `PuntosAsignados` int(11) DEFAULT NULL,
  `PuntosOtrosCtes` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositosDet`
--

CREATE TABLE `depositosDet` (
  `idDeposito` int(11) DEFAULT NULL,
  `idParticipanteCliente` varchar(255) DEFAULT NULL,
  `Puntos` int(11) DEFAULT NULL,
  `Concepto` varchar(255) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Despositos`
--

CREATE TABLE `Despositos` (
  `idDeposito` int(11) NOT NULL,
  `fhDeposito` date NOT NULL,
  `idParticipanteCliente` varchar(50) DEFAULT NULL,
  `standBy` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empresa`
--

CREATE TABLE `Empresa` (
  `codPrograma` int(11) NOT NULL DEFAULT '0',
  `codEmpresa` int(11) NOT NULL DEFAULT '0',
  `NombreOficial` varchar(80) DEFAULT NULL,
  `CalleNumero` varchar(45) DEFAULT NULL,
  `Colonia` varchar(35) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  `Ciudad` varchar(35) DEFAULT NULL,
  `Estado` varchar(15) DEFAULT NULL,
  `Pais` varchar(25) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `Telefono` varchar(16) DEFAULT NULL,
  `Fax` varchar(16) DEFAULT NULL,
  `eMail` varchar(255) DEFAULT NULL,
  `Giro` varchar(20) DEFAULT NULL,
  `Visibilidad` tinyint(4) NOT NULL DEFAULT '1',
  `numCliente` int(11) NOT NULL,
  `FechaCaptura` varchar(255) DEFAULT NULL,
  `catalogoVisible` int(2) DEFAULT '1',
  `urlEmpresa` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Monitor`
--

CREATE TABLE `Monitor` (
  `id` int(11) NOT NULL,
  `Participante` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `OfertaIncentivos`
--

CREATE TABLE `OfertaIncentivos` (
  `idOferta` int(11) NOT NULL DEFAULT '0',
  `codPremio` int(11) NOT NULL DEFAULT '0',
  `codPrograma` int(11) NOT NULL DEFAULT '0',
  `fhIniVigencia` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fhFinVigencia` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ValorPuntos` int(11) NOT NULL DEFAULT '0',
  `fhOperacion` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `OrdenesRec`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `OrdenesRec` (
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Participante`
--

CREATE TABLE `Participante` (
  `loginWeb` varchar(50) DEFAULT NULL,
  `codPrograma` int(11) NOT NULL DEFAULT '0',
  `codEmpresa` int(11) NOT NULL DEFAULT '0',
  `codParticipante` int(11) NOT NULL DEFAULT '0',
  `Status` tinyint(4) DEFAULT NULL,
  `Cargo` varchar(25) DEFAULT NULL,
  `PrimerNombre` varchar(100) DEFAULT NULL,
  `SegundoNombre` varchar(20) DEFAULT NULL,
  `ApellidoPaterno` varchar(25) DEFAULT NULL,
  `ApellidoMaterno` varchar(25) DEFAULT NULL,
  `CalleNumero` varchar(45) DEFAULT NULL,
  `Colonia` varchar(35) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  `Ciudad` varchar(35) DEFAULT NULL,
  `Estado` varchar(15) DEFAULT NULL,
  `Pais` varchar(25) DEFAULT NULL,
  `Telefono` varchar(16) DEFAULT NULL,
  `EnvioDocumentacion` tinyint(4) DEFAULT NULL,
  `TipoMov` char(1) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `eMail` varchar(60) DEFAULT NULL,
  `stEmail` tinyint(1) NOT NULL DEFAULT '0',
  `SaldoActual` int(11) DEFAULT NULL,
  `PuntosEspera` int(11) DEFAULT NULL,
  `idParticipante` int(11) NOT NULL,
  `codCategoria` int(11) NOT NULL,
  `Administrador` int(11) NOT NULL DEFAULT '0',
  `Considerar` int(11) NOT NULL DEFAULT '1',
  `idParticipanteCliente` varchar(255) DEFAULT NULL,
  `idPuesto` varchar(10) DEFAULT NULL,
  `fhMov` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statusPwd` int(2) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PartMovimientos`
--

CREATE TABLE `PartMovimientos` (
  `codPrograma` int(11) NOT NULL DEFAULT '0',
  `codEmpresa` int(11) NOT NULL DEFAULT '0',
  `codParticipante` int(11) NOT NULL DEFAULT '0',
  `Act_Fecha` datetime DEFAULT NULL,
  `Act_SaldoAnt` int(11) DEFAULT '0',
  `Act_Obtenidos` int(11) DEFAULT '0',
  `Act_Canjeados` int(11) DEFAULT '0',
  `Act_Transferidos` int(11) DEFAULT '0',
  `Act_Devueltos` int(11) DEFAULT '0',
  `Act_Vendidos` int(11) DEFAULT '0',
  `Act_Ajustados` int(11) DEFAULT '0',
  `Act_SaldoFinal` int(11) DEFAULT '0',
  `Ant_SaldoAnt` int(11) DEFAULT '0',
  `Ant_MesDeposito` datetime DEFAULT NULL,
  `Ant_Facturacion` int(11) DEFAULT '0',
  `Ant_Canjeados` int(11) DEFAULT '0',
  `Ant_Transferidos` int(11) DEFAULT '0',
  `Ant_Devueltos` int(11) DEFAULT '0',
  `Ant_Vendidos` int(11) DEFAULT '0',
  `Ant_Ajustados` int(11) DEFAULT '0',
  `Ant_SaldoFinal` int(11) DEFAULT '0',
  `Acum_Obtenidos` int(11) DEFAULT '0',
  `Acum_Canjeados` int(11) DEFAULT '0',
  `Acum_Transferidos` int(11) DEFAULT '0',
  `Acum_Devueltos` int(11) DEFAULT '0',
  `Acum_Vendidos` int(11) DEFAULT '0',
  `Acum_Ajustados` int(11) DEFAULT '0',
  `Descripcion` varchar(75) NOT NULL COMMENT 'Detalle del movimiento',
  `Folio` int(11) NOT NULL DEFAULT '0' COMMENT 'Folio del movimiento'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PartMovsRealizados`
--

CREATE TABLE `PartMovsRealizados` (
  `idParticipante` int(11) NOT NULL DEFAULT '0',
  `feMov` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `noFolio` int(11) NOT NULL,
  `dsMov` varchar(255) DEFAULT NULL,
  `noPuntos` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Preguntas`
--

CREATE TABLE `Preguntas` (
  `idPregunta` int(11) NOT NULL,
  `TipoPregunta` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Premio`
--

CREATE TABLE `Premio` (
  `codPremio` int(11) NOT NULL DEFAULT '0',
  `CodCategoria` int(11) DEFAULT NULL,
  `codProveedor` int(11) DEFAULT NULL,
  `Marca` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `Modelo` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `Nombre_Esp` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `Nombre_Ing` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Caracts_Esp` varchar(800) CHARACTER SET utf8 NOT NULL DEFAULT 'Sin Desc',
  `Caracts_Ing` text CHARACTER SET utf8
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PremioPrograma`
--

CREATE TABLE `PremioPrograma` (
  `codPrograma` int(11) NOT NULL DEFAULT '0',
  `codPremio` int(11) NOT NULL DEFAULT '0',
  `codEmpresa` int(11) NOT NULL DEFAULT '0',
  `ValorPuntos` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ProductoIncorporado`
--

CREATE TABLE `ProductoIncorporado` (
  `idProducto` int(11) NOT NULL DEFAULT '0',
  `codPrograma` int(11) DEFAULT NULL,
  `codCliente` int(11) DEFAULT NULL,
  `codCategoria` smallint(6) DEFAULT NULL,
  `codMarca` smallint(6) DEFAULT NULL,
  `codProducto` varchar(20) DEFAULT NULL,
  `Descripcion` varchar(75) DEFAULT NULL,
  `Puntos` decimal(17,0) DEFAULT NULL,
  `TipoMov` char(1) DEFAULT NULL,
  `DescripcionReal` varchar(75) DEFAULT NULL,
  `Piezas` smallint(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ProductoParticipante`
--

CREATE TABLE `ProductoParticipante` (
  `id` int(10) UNSIGNED NOT NULL,
  `sku` varchar(10) NOT NULL COMMENT 'No. producto',
  `descrip` varchar(100) NOT NULL COMMENT 'Nombre ',
  `puntos` int(5) NOT NULL DEFAULT '0' COMMENT 'Puntos X Caja',
  `codPrograma` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Puntos X Caja';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Programa`
--

CREATE TABLE `Programa` (
  `codPrograma` int(11) NOT NULL DEFAULT '0',
  `Nombre` varchar(40) DEFAULT NULL,
  `LeyendaPuntos` varchar(20) DEFAULT NULL,
  `EMailParticipante` varchar(50) NOT NULL DEFAULT '',
  `PorcentajePuntosEmpresa` decimal(8,2) DEFAULT '0.00',
  `FechaPrograma` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proveedor`
--

CREATE TABLE `Proveedor` (
  `codProveedor` int(11) NOT NULL DEFAULT '0',
  `RazonSocial` varchar(50) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `Perfil` varchar(30) DEFAULT NULL,
  `Calle` varchar(45) DEFAULT NULL,
  `Colonia` varchar(35) DEFAULT NULL,
  `Ciudad` varchar(35) DEFAULT NULL,
  `Estado` varchar(15) DEFAULT NULL,
  `Pais` varchar(25) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  `EMail` varchar(60) DEFAULT NULL,
  `Contacto` varchar(50) DEFAULT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Fax` varchar(50) DEFAULT NULL,
  `Clave` char(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reglas`
--

CREATE TABLE `Reglas` (
  `idRegla` int(11) NOT NULL,
  `idReglaNombre` varchar(255) DEFAULT NULL,
  `regla` varchar(500) NOT NULL,
  `descripcionRegla` varchar(500) NOT NULL,
  `codEmpresa` int(11) NOT NULL,
  `codPrograma` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TablaPrueba`
--

CREATE TABLE `TablaPrueba` (
  `Tipo` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `codPrograma` int(11) NOT NULL,
  `codEmpresa` int(255) DEFAULT NULL,
  `codCategoria` int(255) DEFAULT NULL,
  `codPremio` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Caracts` varchar(255) NOT NULL,
  `Marca` varchar(40) NOT NULL,
  `Modelo` varchar(80) NOT NULL,
  `ValorPuntos` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura para la vista `OrdenesRec`
--
DROP TABLE IF EXISTS `OrdenesRec`;

CREATE ALGORITHM=UNDEFINED DEFINER=`opisa`@`localhost` SQL SECURITY DEFINER VIEW `OrdenesRec`  AS  select `p`.`codPrograma` AS `codPrograma`,`p`.`codEmpresa` AS `CodEmpresa`,`p`.`codParticipante` AS `CodParticipante`,`p`.`PrimerNombre` AS `PrimerNombre`,`p`.`SegundoNombre` AS `SegundoNombre`,`p`.`ApellidoPaterno` AS `ApellidoPaterno`,`p`.`ApellidoMaterno` AS `ApellidoMaterno`,`c`.`CalleNumero` AS `CalleNumero`,`c`.`Colonia` AS `Colonia`,`c`.`Ciudad` AS `Ciudad`,`c`.`Estado` AS `Estado`,`c`.`CP` AS `cp`,'Mexico' AS `Pais`,`c`.`Telefono` AS `telefono`,`d`.`noFolio` AS `NoFolio`,`d`.`Cantidad` AS `Cantidad`,`d`.`CodPremio` AS `codPremio`,`p`.`eMail` AS `eMail`,`pr`.`Nombre_Esp` AS `Nombre_Esp` from (((`PreCanjeDet` `d` join `PreCanje` `c` on(((`c`.`idParticipante` = `d`.`idParticipante`) and (`c`.`idCanje` = `d`.`noFolio`)))) join `Participante` `p` on((`p`.`idParticipante` = `c`.`idParticipante`))) left join `Premio` `pr` on((`pr`.`codPremio` = `d`.`CodPremio`))) where ((`c`.`codPrograma` = 41) and (`p`.`idParticipante` <> 89526) and (`d`.`noFolio` >= 170)) order by `d`.`noFolio` desc ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Administrador`
--
ALTER TABLE `Administrador`
  ADD PRIMARY KEY (`Usuario`);

--
-- Indices de la tabla `Atencion`
--
ALTER TABLE `Atencion`
  ADD PRIMARY KEY (`IdTicket`);

--
-- Indices de la tabla `AtencionTicket`
--
ALTER TABLE `AtencionTicket`
  ADD PRIMARY KEY (`IdTicket`);

--
-- Indices de la tabla `Canje`
--
ALTER TABLE `Canje`
  ADD PRIMARY KEY (`idCanje`),
  ADD KEY `PreCanje_FK1` (`idParticipante`),
  ADD KEY `PreCanje_IDX1` (`noFolio`),
  ADD KEY `idParticipante` (`idParticipante`,`noFolio`);

--
-- Indices de la tabla `CanjeDetalle`
--
ALTER TABLE `CanjeDetalle`
  ADD PRIMARY KEY (`idCanje`,`idPreCanjeDet`),
  ADD KEY `PreCanjeDet_FK1` (`idCanje`),
  ADD KEY `PreCanjeDet_FK2` (`CodPremio`);

--
-- Indices de la tabla `CategoriaPremio`
--
ALTER TABLE `CategoriaPremio`
  ADD PRIMARY KEY (`CodCategoria`);

--
-- Indices de la tabla `ClavesPartWeb`
--
ALTER TABLE `ClavesPartWeb`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`codPrograma`,`codCliente`),
  ADD KEY `Cliente_FK1` (`codPrograma`);

--
-- Indices de la tabla `ClienteEmpresa`
--
ALTER TABLE `ClienteEmpresa`
  ADD PRIMARY KEY (`codPrograma`,`codCliente`,`codEmpresa`),
  ADD KEY `ClienteEmpresa_FK1` (`codPrograma`,`codCliente`),
  ADD KEY `ClienteEmpresa_FK2` (`codPrograma`,`codEmpresa`),
  ADD KEY `idRuta` (`idRuta`);

--
-- Indices de la tabla `ClienteEmpresaPart`
--
ALTER TABLE `ClienteEmpresaPart`
  ADD PRIMARY KEY (`codPrograma`,`codCliente`,`codEmpresa`,`codParticipante`);

--
-- Indices de la tabla `Despositos`
--
ALTER TABLE `Despositos`
  ADD PRIMARY KEY (`idDeposito`);

--
-- Indices de la tabla `Empresa`
--
ALTER TABLE `Empresa`
  ADD PRIMARY KEY (`codPrograma`,`codEmpresa`),
  ADD KEY `Empresa_FK1` (`codPrograma`),
  ADD KEY `codEmpresa` (`codEmpresa`);

--
-- Indices de la tabla `Monitor`
--
ALTER TABLE `Monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `OfertaIncentivos`
--
ALTER TABLE `OfertaIncentivos`
  ADD PRIMARY KEY (`idOferta`),
  ADD KEY `codPremio` (`codPremio`),
  ADD KEY `codPrograma` (`codPrograma`);

--
-- Indices de la tabla `Participante`
--
ALTER TABLE `Participante`
  ADD PRIMARY KEY (`codPrograma`,`codEmpresa`,`codParticipante`),
  ADD KEY `Participante_FK1` (`codPrograma`,`codEmpresa`),
  ADD KEY `idParticipante` (`idParticipante`),
  ADD KEY `loginWeb` (`codPrograma`,`loginWeb`) USING BTREE;

--
-- Indices de la tabla `PartMovimientos`
--
ALTER TABLE `PartMovimientos`
  ADD PRIMARY KEY (`codPrograma`,`codEmpresa`,`codParticipante`);

--
-- Indices de la tabla `PartMovsRealizados`
--
ALTER TABLE `PartMovsRealizados`
  ADD PRIMARY KEY (`idParticipante`,`noFolio`),
  ADD KEY `PartMovsRealizados_IDX1` (`idParticipante`);

--
-- Indices de la tabla `Preguntas`
--
ALTER TABLE `Preguntas`
  ADD PRIMARY KEY (`idPregunta`);

--
-- Indices de la tabla `Premio`
--
ALTER TABLE `Premio`
  ADD PRIMARY KEY (`codPremio`),
  ADD KEY `Premio_FK1` (`CodCategoria`);

--
-- Indices de la tabla `PremioPrograma`
--
ALTER TABLE `PremioPrograma`
  ADD PRIMARY KEY (`codPrograma`,`codPremio`,`codEmpresa`),
  ADD KEY `PremioPrograma_FK1` (`codPrograma`),
  ADD KEY `PremioPrograma_FK2` (`codPremio`),
  ADD KEY `codPremio` (`ValorPuntos`,`codPremio`) USING BTREE;

--
-- Indices de la tabla `ProductoIncorporado`
--
ALTER TABLE `ProductoIncorporado`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `ProductoIncorporado_FK1` (`codPrograma`,`codCliente`),
  ADD KEY `ProductoIncorporado_FK2` (`codPrograma`,`codCliente`,`codCategoria`),
  ADD KEY `ProductoIncorporado_FK3` (`codPrograma`,`codCliente`,`codCategoria`,`codMarca`);

--
-- Indices de la tabla `ProductoParticipante`
--
ALTER TABLE `ProductoParticipante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codPrograma` (`codPrograma`);

--
-- Indices de la tabla `Programa`
--
ALTER TABLE `Programa`
  ADD PRIMARY KEY (`codPrograma`);

--
-- Indices de la tabla `Proveedor`
--
ALTER TABLE `Proveedor`
  ADD PRIMARY KEY (`codProveedor`);

--
-- Indices de la tabla `Reglas`
--
ALTER TABLE `Reglas`
  ADD PRIMARY KEY (`idRegla`),
  ADD KEY `codEmpresa` (`codEmpresa`),
  ADD KEY `codPrograma` (`codPrograma`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Atencion`
--
ALTER TABLE `Atencion`
  MODIFY `IdTicket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `AtencionTicket`
--
ALTER TABLE `AtencionTicket`
  MODIFY `IdTicket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Canje`
--
ALTER TABLE `Canje`
  MODIFY `idCanje` double NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ClavesPartWeb`
--
ALTER TABLE `ClavesPartWeb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Despositos`
--
ALTER TABLE `Despositos`
  MODIFY `idDeposito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Monitor`
--
ALTER TABLE `Monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `PartMovsRealizados`
--
ALTER TABLE `PartMovsRealizados`
  MODIFY `noFolio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Preguntas`
--
ALTER TABLE `Preguntas`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ProductoParticipante`
--
ALTER TABLE `ProductoParticipante`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Reglas`
--
ALTER TABLE `Reglas`
  MODIFY `idRegla` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
