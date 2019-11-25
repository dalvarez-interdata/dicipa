-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-11-2019 a las 17:53:16
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dicipa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `tabla` varchar(255) NOT NULL,
  `record` varchar(255) NOT NULL,
  `cambio` longtext DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `idagenda` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `id_usuario_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristica`
--

CREATE TABLE `caracteristica` (
  `idcaracteristica` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `id_division_fk` int(11) DEFAULT NULL,
  `id_categoria_fk` int(11) DEFAULT NULL,
  `abreviatura` varchar(50) DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `id_division_fk`, `id_categoria_fk`, `abreviatura`, `orden`) VALUES
(1, 'Química Clínica', NULL, 1, NULL, 'QC', 0),
(2, 'Hormonas', NULL, 1, NULL, 'HO', 2),
(3, 'Orinas', NULL, 1, NULL, 'OR', 3),
(4, 'Hematología', '', 1, NULL, 'HE', 4),
(5, 'Servicio Integral', '', 2, NULL, 'SI', 0),
(6, 'Servicios por Partida', '', 2, NULL, 'SP', 0),
(7, 'Digitalización', '', 3, NULL, 'DS', 0),
(8, 'Mastografía', '', 3, NULL, 'MA', 0),
(9, 'Medios de Contraste', '', 3, NULL, 'MC', 0),
(10, 'Rayos X', '', 3, NULL, 'RX', 0),
(11, 'Resonancia Magnética', '', 3, NULL, 'RM', 0),
(12, 'Tomografía', '', 3, NULL, 'TO', 0),
(13, 'Ultrasonido', '', 3, NULL, 'UL', 0),
(14, 'Insuficiencia Renal Crónica', 'La insuficiencia renal crónica (IRC) se define como la pérdida progresiva, permanente e irreversible de la tasa de filtración glomerular  (60 ml/min/1,73 m2) a lo largo de un tiempo variable, a veces incluso de años.', 4, NULL, 'IC', 0),
(15, 'Insuficiencia Renal Aguda', 'La insuficiencia renal aguda (IRA) es un síndrome que se caracteriza por disminución abrupta (horas a días) de la filtración glomerular, que resulta en la incapacidad del riñón para excretar productos nitrogenados y para mantener la homeostasis de líquidos y electrólitos. Esta alteración en la función renal ocurre con lesión renal en los túbulos, vasos, intersticio y glomérulos y excepcionalmente sin lesión demostrable o puede ser producto de la exacerbación en un paciente con enfermedad renal previa. La manifestación clínica primaria de la IRA es la de la causa desencadenante y posteriormente por la acumulación de productos nitrogenados, principalmente urea y creatinina.', 4, NULL, 'IA', 0),
(16, 'Coagulación', '', 1, NULL, 'CO', 0),
(17, 'Gases', '', 1, NULL, 'GA', 0),
(18, 'Microbiología', '', 1, NULL, 'MI', 0),
(19, 'Proteínas Plasmáticas', '', 1, NULL, 'PP', 0),
(20, 'Hemoglobina Glucosilada HPLC', '', 1, NULL, 'HG', 0),
(21, 'Glicosilada', '', 1, NULL, 'GL', 0),
(22, 'HPLC', '', 1, NULL, 'HP', 0),
(23, 'Programas Federales', '', 1, NULL, 'PF', 0),
(24, 'Funcionalidad  Plaquetaria', '', 1, NULL, 'FP', 0),
(25, 'Velocidad de Sedimentación Globular', '', 1, NULL, 'VS', 0),
(26, 'Inmunología', '', 1, NULL, 'IN', 0),
(27, 'Hemocultivos', '', 1, NULL, 'HE', 0),
(28, 'Áreas Críticas', '', 1, NULL, 'AC', 0),
(29, 'Proyectos Integrales', '', 1, NULL, 'PI', 0),
(30, 'Biología Molecular', '', 1, NULL, 'BM', 0),
(31, 'Tamiz Neonatal Ampliado', '', 1, NULL, 'TA', 0),
(32, 'Otros', '', 1, NULL, 'OT', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_persona_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `email`, `id_persona_fk`) VALUES
(1, 'dalvarezmendoza@gmail.com', 1),
(2, 'oscar@gmail.com', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `idcotizacion` int(11) NOT NULL,
  `id_usuario_fk` int(11) DEFAULT NULL,
  `id_cliente_fk` int(11) DEFAULT NULL,
  `id_producto_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `division`
--

CREATE TABLE `division` (
  `iddivision` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `imagenFile` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `division`
--

INSERT INTO `division` (`iddivision`, `nombre`, `descripcion`, `imagen`, `imagenFile`) VALUES
(1, 'Laboratorio Clínico', 'Hemos logrado ayudar a nuestros clientes a hacer más eficientes y oportuno el diagnóstico y tratamiento de sus pacientes, a través de nuestra experiencia en el desarrollo de proyectos integrales en todo el país, atendiendo redes completas de laboratorios con sistemas adecuados a las necesidades de cada laboratorio clínico.', 'e07a6da7f1557a02bb684aa1d9b16945.png', NULL),
(2, 'Banco de Sangre', 'Nuestros servicios integrales contribuye con los bancos de sangre del país, para que, a través del análisis situacional, conocimiento de la problemática, implicaciones de las necesidades y la gestión de recursos desarrollemos de manera conjunta las soluciones para la ejecución e implementación de proyectos que le ofrezcan la mayor seguridad y estandarización para la obtención de sus hemocomponentes.', '6f2aed48d084e15fe81ddf4bb5e9f0c8.png', NULL),
(3, 'Imagenología', 'La imagenología, con fines diagnósticos y tratamiento, tiene un papel preponderante en la mejora de la salud pública en todos los grupos de la población del país, y es por eso que podemos desarrollar proyectos que integran toda una solución para el área de radiología de su institución, desde captura de imagen, distribución, interpretación y almacenamiento que modernizarán su servicio.', '547d470edad3aa41f6b1b136161ad8b6.png', NULL),
(4, 'Cuidado Renal', 'Como integradores de soluciones para el cuidado de la salud renal en México, nos hemos preocupado por tener en nuestra cartera de productos los equipos de la más alta tecnología, el mejor rendimiento y eficacia operativa.\r\nNuestros servicios integrales se diversifican al tener 2 tecnologías que cumplen con los estándares de calidad y requerimientos técnicos acordes a la demanda actual del mercado.\r\nEn DICIPA tenemos la confianza de que los equipos que están en nuestra cartera de productos convergen para ofrecer terapias de hemodiálisis seguras y con la mejor calidad operativa y de servicio. \r\n', 'd040559c2c20e85ef02926adb1bd0d64.png', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `iddomicilio` int(11) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `id_tipodomicilio_fk` int(11) DEFAULT NULL,
  `id_persona_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`iddomicilio`, `direccion`, `id_tipodomicilio_fk`, `id_persona_fk`) VALUES
(6, 'Calle Ave del Paraizo, #7, ático A', 1, 4),
(8, 'Cuidad México, México', 1, 5),
(9, 'Calle Ave del Paraizo, #7, ático A', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email`
--

CREATE TABLE `email` (
  `idemail` int(11) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `id_persona_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `email`
--

INSERT INTO `email` (`idemail`, `direccion`, `id_persona_fk`) VALUES
(7, 'manuel@dicipa.com', 4),
(9, 'manuel.moran@dicipa.onmicrosoft.com', 5),
(10, 'dalvarezmendoza@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idmarca`, `nombre`, `descripcion`) VALUES
(1, 'Braun', 'Software inteligente para la gestión del balance de líquidos,  Optimización de la capacidad de la báscula.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `idnotas` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `contenido` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario_fk` int(11) DEFAULT NULL,
  `cotizacion_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `idnotificacion` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `idperiodo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`idperiodo`, `nombre`) VALUES
(1, 'Mes del 1ro Septiembre - 30 de Septiembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `paterno` varchar(50) DEFAULT NULL,
  `materno` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombre`, `paterno`, `materno`) VALUES
(1, 'Deivis', 'Alvarez', 'Mendoza'),
(2, 'Javi', 'Barrios', '-'),
(3, 'Oscar', 'Garcia', ' Flores'),
(4, 'Manuel', 'Moran', 'Días'),
(5, 'Manuel', 'Moran', 'Navarro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `enunciado` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  `idcotizacion_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `id_marca_fk` int(11) DEFAULT NULL,
  `id_volumen_prueba_fk` int(11) DEFAULT NULL,
  `id_tipo_producto_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre`, `modelo`, `descripcion`, `id_marca_fk`, `id_volumen_prueba_fk`, `id_tipo_producto_fk`) VALUES
(1, 'Diapact® CRRT', ' SCUF', 'Es un sistema conformado por una máquina de terapias de reemplazo renal continuo con un software inteligente.', 1, NULL, 1),
(3, 'Seca mBCA 514', '514', 'medical Body Composition Analyzer para determinar la composición corporal de pie', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_caracteristica`
--

CREATE TABLE `producto_caracteristica` (
  `idProductoCaracteristica` int(11) NOT NULL,
  `id_producto_fk` int(11) DEFAULT NULL,
  `id_caracteristica_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_categoria`
--

CREATE TABLE `producto_categoria` (
  `idProductoCategoria` int(11) NOT NULL,
  `producto_id_fk` int(11) DEFAULT NULL,
  `categoria_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_categoria`
--

INSERT INTO `producto_categoria` (`idProductoCategoria`, `producto_id_fk`, `categoria_id_fk`) VALUES
(4, 3, 14),
(5, 1, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_imagen`
--

CREATE TABLE `producto_imagen` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `id_producto_fk` int(11) NOT NULL,
  `portada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_imagen`
--

INSERT INTO `producto_imagen` (`id`, `imagen`, `id_producto_fk`, `portada`) VALUES
(1, '1929d09c2fb8b886e41dabf9b0bf4c59.png', 3, 0),
(2, '6db50529d13eae15601722b1b02e9927.png', 3, 0),
(3, '7932f62e48c7b4e2f61c65a1bc3bdf77.png', 1, 0),
(4, '83ecaa07089d3dc7eef38ff59ffef9b3.png', 1, 0),
(5, 'f45d56771b8f1fc2806ecdb667f15b9d.png', 1, 0),
(6, '6903967de1c8a3d44008a2c7b08ec181.png', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_prueba`
--

CREATE TABLE `producto_prueba` (
  `idProductoPrueba` int(11) NOT NULL,
  `producto_id_fk` int(1) DEFAULT NULL,
  `prueba_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `idprueba` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`idprueba`, `nombre`, `descripcion`) VALUES
(1, 'Prueba 1', 'Descripción de prueba 1'),
(2, 'Prueba 2', 'Descripción de prueba 2'),
(3, 'Prueba 3', 'Descripción de prueba 3'),
(7, 'Prueba 4', 'Descripción de la prueba 4'),
(8, NULL, NULL),
(9, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL,
  `idpregunta_fk` int(11) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `fecha_creada` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `idtelefono` int(11) NOT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `id_tipo_telefono_fk` int(11) DEFAULT NULL,
  `id_persona_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`idtelefono`, `numero`, `id_tipo_telefono_fk`, `id_persona_fk`) VALUES
(11, '4426175170', 1, 4),
(13, '4426175170', 1, 5),
(14, '53721515', 1, 1),
(15, '54272663', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_domicilio`
--

CREATE TABLE `tipo_domicilio` (
  `idtipodomicilio` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_domicilio`
--

INSERT INTO `tipo_domicilio` (`idtipodomicilio`, `nombre`) VALUES
(1, 'Hogar residencial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `idTipoProducto` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`idTipoProducto`, `nombre`, `descripcion`) VALUES
(1, 'CRRT System', 'Software inteligente para la gestión del balance de líquidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_telefono`
--

CREATE TABLE `tipo_telefono` (
  `idtipo_telefono` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_telefono`
--

INSERT INTO `tipo_telefono` (`idtipo_telefono`, `nombre`) VALUES
(1, 'Celular'),
(2, 'Hogar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idTipoUsuario`, `tipo`) VALUES
(1, 'Admin'),
(2, 'Usuario-Sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_persona_fk` int(11) DEFAULT NULL,
  `id_tipo_usuario_fk` int(11) DEFAULT NULL,
  `authKey` varchar(255) DEFAULT NULL,
  `accessToken` varchar(255) DEFAULT NULL,
  `is_active` int(1) DEFAULT 0,
  `last_login_time` datetime DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `imagenFile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `username`, `email`, `password`, `id_persona_fk`, `id_tipo_usuario_fk`, `authKey`, `accessToken`, `is_active`, `last_login_time`, `imagen`, `imagenFile`) VALUES
(5, 'dalvarezmendoza', 'dalvarezmendoza@gmail.com', 'b82b53871cbaab3545d114df79e2215f07bc092d', 1, 1, '123453', '123455', 1, '2019-10-19 14:49:57', 'bd677436aba4d9de06211b158e31f740.jpg', '6518156bd4011154f785c89471e70f3f.jpg'),
(7, 'manuel', 'manuel@dicipa.com', '72928d9345d4f672fc56d5b2bc3dbbc325041ebe', 4, 1, NULL, NULL, 0, NULL, 'b47838359a6770f3faab45ecf8542f6a.jpg', 'avatar5.jpg'),
(8, 'manuel.moran', 'manuel.moran@dicipa.onmicrosoft.com', 'ceca6457935e1a2223d8cfe267cf3dcdfe0df483', 5, 1, NULL, NULL, 0, NULL, '527712b371d3a73cdcb3509a504681e3.png', 'Screen Shot 2019-10-17 at 10.30.40.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `volumen_prueba`
--

CREATE TABLE `volumen_prueba` (
  `idVolumenPrueba` int(11) NOT NULL,
  `cantidad_min` int(11) DEFAULT NULL,
  `cantidad_max` int(11) DEFAULT NULL,
  `id_periodo_fk` int(11) DEFAULT NULL,
  `id_division_fk` int(11) DEFAULT NULL,
  `id_categoria_fk` int(11) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `volumen_prueba`
--

INSERT INTO `volumen_prueba` (`idVolumenPrueba`, `cantidad_min`, `cantidad_max`, `id_periodo_fk`, `id_division_fk`, `id_categoria_fk`, `nombre`) VALUES
(1, 25000, 40000, 1, 1, 1, 'Entre 25000 y 40000 x mes');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`idagenda`),
  ADD KEY `id_usuario_fk` (`id_usuario_fk`);

--
-- Indices de la tabla `caracteristica`
--
ALTER TABLE `caracteristica`
  ADD PRIMARY KEY (`idcaracteristica`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD KEY `id_division_fk` (`id_division_fk`),
  ADD KEY `id_categoria_fk` (`id_categoria_fk`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `id_persona_fk` (`id_persona_fk`),
  ADD KEY `id_persona_fk_2` (`id_persona_fk`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`idcotizacion`),
  ADD KEY `id_usuario_fk` (`id_usuario_fk`),
  ADD KEY `id_cliente_fk` (`id_cliente_fk`),
  ADD KEY `id_producto_fk` (`id_producto_fk`);

--
-- Indices de la tabla `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`iddivision`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`iddomicilio`),
  ADD KEY `id_tipodomicilio_fk` (`id_tipodomicilio_fk`),
  ADD KEY `id_persona_fk` (`id_persona_fk`);

--
-- Indices de la tabla `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`idemail`),
  ADD KEY `id_persona_fk` (`id_persona_fk`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`idnotas`),
  ADD KEY `usuario_fk` (`usuario_fk`),
  ADD KEY `cotizacion_fk` (`cotizacion_fk`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`idnotificacion`),
  ADD KEY `id_usuario_fk` (`id_usuario_fk`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`idperiodo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcotizacion_fk` (`idcotizacion_fk`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `id_marca` (`id_marca_fk`),
  ADD KEY `id_volumen_prueba` (`id_volumen_prueba_fk`),
  ADD KEY `id_tipo_producto` (`id_tipo_producto_fk`);

--
-- Indices de la tabla `producto_caracteristica`
--
ALTER TABLE `producto_caracteristica`
  ADD PRIMARY KEY (`idProductoCaracteristica`),
  ADD KEY `id_producto_fk` (`id_producto_fk`),
  ADD KEY `id_caracteristica_fk` (`id_caracteristica_fk`);

--
-- Indices de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  ADD PRIMARY KEY (`idProductoCategoria`),
  ADD KEY `producto_id_fk` (`producto_id_fk`),
  ADD KEY `categoria_id_fk` (`categoria_id_fk`);

--
-- Indices de la tabla `producto_imagen`
--
ALTER TABLE `producto_imagen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_prueba`
--
ALTER TABLE `producto_prueba`
  ADD PRIMARY KEY (`idProductoPrueba`),
  ADD KEY `producto_id_fk` (`producto_id_fk`),
  ADD KEY `prueba_id_fk` (`prueba_id_fk`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`idprueba`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpregunta_fk` (`idpregunta_fk`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`idtelefono`),
  ADD KEY `tipo_telefono_fk` (`id_tipo_telefono_fk`),
  ADD KEY `id_tipo_telefono_fk` (`id_tipo_telefono_fk`),
  ADD KEY `id_persona_fk` (`id_persona_fk`);

--
-- Indices de la tabla `tipo_domicilio`
--
ALTER TABLE `tipo_domicilio`
  ADD PRIMARY KEY (`idtipodomicilio`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`idTipoProducto`);

--
-- Indices de la tabla `tipo_telefono`
--
ALTER TABLE `tipo_telefono`
  ADD PRIMARY KEY (`idtipo_telefono`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `id_persona_fk` (`id_persona_fk`),
  ADD KEY `id_tipo_usuario_fk` (`id_tipo_usuario_fk`);

--
-- Indices de la tabla `volumen_prueba`
--
ALTER TABLE `volumen_prueba`
  ADD PRIMARY KEY (`idVolumenPrueba`),
  ADD KEY `id_periodo_fk` (`id_periodo_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `idagenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caracteristica`
--
ALTER TABLE `caracteristica`
  MODIFY `idcaracteristica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `idcotizacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `division`
--
ALTER TABLE `division`
  MODIFY `iddivision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `iddomicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `email`
--
ALTER TABLE `email`
  MODIFY `idemail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `idnotas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idnotificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `idperiodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto_caracteristica`
--
ALTER TABLE `producto_caracteristica`
  MODIFY `idProductoCaracteristica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  MODIFY `idProductoCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto_imagen`
--
ALTER TABLE `producto_imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto_prueba`
--
ALTER TABLE `producto_prueba`
  MODIFY `idProductoPrueba` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `idprueba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `idtelefono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tipo_domicilio`
--
ALTER TABLE `tipo_domicilio`
  MODIFY `idtipodomicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `idTipoProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_telefono`
--
ALTER TABLE `tipo_telefono`
  MODIFY `idtipo_telefono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `volumen_prueba`
--
ALTER TABLE `volumen_prueba`
  MODIFY `idVolumenPrueba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD CONSTRAINT `calendario_fk_01` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_fk_01` FOREIGN KEY (`id_division_fk`) REFERENCES `division` (`iddivision`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categoria_fk_02` FOREIGN KEY (`id_categoria_fk`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_fk_01` FOREIGN KEY (`id_persona_fk`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `cotizacion_fk_01` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cotizacion_fk_02` FOREIGN KEY (`id_cliente_fk`) REFERENCES `cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cotizacion_fk_03` FOREIGN KEY (`id_producto_fk`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `domicilio_fk_01` FOREIGN KEY (`id_tipodomicilio_fk`) REFERENCES `tipo_domicilio` (`idtipodomicilio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `domicilio_fk_02` FOREIGN KEY (`id_persona_fk`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_fk_01` FOREIGN KEY (`id_persona_fk`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_fk_01` FOREIGN KEY (`usuario_fk`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_fk_02` FOREIGN KEY (`cotizacion_fk`) REFERENCES `cotizacion` (`idcotizacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `notificacion_fk_01` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_fk_01` FOREIGN KEY (`idcotizacion_fk`) REFERENCES `cotizacion` (`idcotizacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_fk_01` FOREIGN KEY (`id_marca_fk`) REFERENCES `marca` (`idmarca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_fk_02` FOREIGN KEY (`id_volumen_prueba_fk`) REFERENCES `volumen_prueba` (`idVolumenPrueba`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_fk_03` FOREIGN KEY (`id_tipo_producto_fk`) REFERENCES `tipo_producto` (`idTipoProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_caracteristica`
--
ALTER TABLE `producto_caracteristica`
  ADD CONSTRAINT `producto_caracteristica_fk_01` FOREIGN KEY (`id_producto_fk`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_caracteristica_fk_02` FOREIGN KEY (`id_caracteristica_fk`) REFERENCES `caracteristica` (`idcaracteristica`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  ADD CONSTRAINT `producto_categoria_fk_01` FOREIGN KEY (`producto_id_fk`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_categoria_fk_02` FOREIGN KEY (`categoria_id_fk`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_prueba`
--
ALTER TABLE `producto_prueba`
  ADD CONSTRAINT `produto_prueba_fk_01` FOREIGN KEY (`producto_id_fk`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produto_prueba_fk_02` FOREIGN KEY (`prueba_id_fk`) REFERENCES `prueba` (`idprueba`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_fk_01` FOREIGN KEY (`idpregunta_fk`) REFERENCES `pregunta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `telefono_fk_01` FOREIGN KEY (`id_tipo_telefono_fk`) REFERENCES `tipo_telefono` (`idtipo_telefono`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `telefono_fk_02` FOREIGN KEY (`id_persona_fk`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_fk_01` FOREIGN KEY (`id_persona_fk`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_fk_02` FOREIGN KEY (`id_tipo_usuario_fk`) REFERENCES `tipo_usuario` (`idTipoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `volumen_prueba`
--
ALTER TABLE `volumen_prueba`
  ADD CONSTRAINT `volumen_prueba_fk_01` FOREIGN KEY (`id_periodo_fk`) REFERENCES `periodo` (`idperiodo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
