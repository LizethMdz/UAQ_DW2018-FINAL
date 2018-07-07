-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2018 a las 05:53:50
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `convocatoriadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(10) NOT NULL,
  `folio` varchar(50) NOT NULL,
  `nombre_Alumno` varchar(50) NOT NULL,
  `apaterno_alumno` varchar(50) NOT NULL,
  `amaterno_alumno` varchar(50) NOT NULL,
  `nacimiento_alumno` date NOT NULL,
  `ocupacion_alumno` varchar(50) NOT NULL,
  `celular_alumno` int(10) NOT NULL,
  `email_alumno` varchar(50) NOT NULL,
  `callenumero_alumno` varchar(50) NOT NULL,
  `municipio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `folio`, `nombre_Alumno`, `apaterno_alumno`, `amaterno_alumno`, `nacimiento_alumno`, `ocupacion_alumno`, `celular_alumno`, `email_alumno`, `callenumero_alumno`, `municipio`) VALUES
(2, 'ALUM111liz', 'Lizeth Ailet', 'Mendoza', 'Trejo', '2018-07-01', 'estudiante', 2147483647, 'liz@mail.com', 'Calle Democracia 56, Colonia Venceremos', 2),
(3, 'ALUM777lui', 'Luis Alberto', 'Garcia', 'Vega', '2018-07-06', 'estudiante', 2147483647, 'luis@mail.com', 'Reforma', 1),
(6, 'ALUM442lup', 'lupita', 'juan', 'juan', '2018-07-18', 'Alumno', 2147483647, 'lupi@mail.com', 'calle 129 colonia Venceremos', 1),
(7, 'ALUM442Ana', 'Laura', 'PeÃ±a', 'Vega', '1997-03-28', 'estudiante', 2147483647, 'lau@mail.com', 'Campanas', 1);

--
-- Disparadores `alumno`
--
DELIMITER $$
CREATE TRIGGER `usuario_alumno` AFTER INSERT ON `alumno` FOR EACH ROW begin 
insert into USUARIO
values (new.email_alumno, new.folio, 'Alumno');
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `alumno` int(5) NOT NULL,
  `CURP` varchar(500) NOT NULL,
  `recibo_pago` varchar(500) NOT NULL,
  `cedula_inscripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`alumno`, `CURP`, `recibo_pago`, `cedula_inscripcion`) VALUES
(3, 'documentos/conn.PNG', 'documentos/alum.PNG', 'documentos/codigo.PNG'),
(7, 'documentos/pago.jpg', 'documentos/Inscripcion.png', 'documentos/Inscripcion.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `alumno` int(5) NOT NULL,
  `tipo_asistencia` enum('asistencia','falta','justificacion','retardo') DEFAULT NULL,
  `curso` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `fecha`, `alumno`, `tipo_asistencia`, `curso`) VALUES
(1, '2018-07-03', 3, 'asistencia', 1),
(6, '2018-07-06', 3, 'falta', 1),
(7, '2018-07-06', 2, 'asistencia', 2),
(8, '2018-07-08', 3, 'falta', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria`
--

CREATE TABLE `convocatoria` (
  `id_convocatoria` int(5) NOT NULL,
  `nombre_convocatoria` varchar(30) NOT NULL,
  `f_inicio` date NOT NULL,
  `f_fin` date NOT NULL,
  `costo_convocatoria` float NOT NULL,
  `contenido_convocatoria` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `convocatoria`
--

INSERT INTO `convocatoria` (`id_convocatoria`, `nombre_convocatoria`, `f_inicio`, `f_fin`, `costo_convocatoria`, `contenido_convocatoria`) VALUES
(1, 'Curso de ingles', '2018-07-16', '2018-08-16', 850, 'Aprenderas todo'),
(2, 'Curso de Mantenimiento', '2018-07-02', '2018-07-28', 700, 'Contiene todo lo necesario'),
(3, 'Examen de Talentos', '2018-07-16', '2018-07-18', 250, 'Demuestra tu talento'),
(4, 'Android', '2018-07-08', '2018-07-31', 750, 'Abarcara temas basicos para aprendizaje'),
(5, 'Programacion en Shell', '2018-07-08', '2018-07-31', 780, 'Temas basicos en shell y linux'),
(6, 'Java', '2018-07-08', '2018-07-31', 850, 'Abarcara solo temas basicos'),
(7, 'DiseÃ±o Web', '2018-07-09', '2018-07-31', 750, 'Abarcara temas basicos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria_publicada`
--

CREATE TABLE `convocatoria_publicada` (
  `convocatoria` int(5) NOT NULL,
  `f_inicio` date NOT NULL,
  `f_fin` date NOT NULL,
  `estado_convocatoria` enum('Abierta','Proceso','Cerrada') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `convocatoria_publicada`
--

INSERT INTO `convocatoria_publicada` (`convocatoria`, `f_inicio`, `f_fin`, `estado_convocatoria`) VALUES
(1, '2018-07-16', '2018-08-16', 'Abierta'),
(2, '2018-07-02', '2018-07-28', 'Abierta'),
(3, '2018-07-05', '2018-07-09', 'Abierta'),
(5, '2018-07-06', '2018-07-13', 'Abierta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `id_institucion` int(5) NOT NULL,
  `nombre_institucion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`id_institucion`, `nombre_institucion`) VALUES
(1, 'FRAY DE LEON'),
(2, 'UAQ'),
(3, 'Tecnologico de QuerÃ©taro'),
(4, 'UTEQ'),
(5, 'UPQ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `id_instructor` int(5) NOT NULL,
  `folio` varchar(10) NOT NULL,
  `nombre_instructor` varchar(50) NOT NULL,
  `telefono_instructor` varchar(7) NOT NULL,
  `celular_instructor` varchar(10) NOT NULL,
  `email_instructor` varchar(30) NOT NULL,
  `direccion_instructor` varchar(50) NOT NULL,
  `municipio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`id_instructor`, `folio`, `nombre_instructor`, `telefono_instructor`, `celular_instructor`, `email_instructor`, `direccion_instructor`, `municipio`) VALUES
(13, 'INST132Jua', 'Juan Felipe', '1321321', '23335567', 'juan@mail.com', 'Campanas', 2),
(14, 'INST787mar', 'maria', '7878987', '4654654654', 'ma@mail.com', 'reforma 878, pueblito', 2),
(15, 'INST666Noe', 'Noe', '6661112', '5566698877', 'noe@gmail.com', 'Lazaro Cardenas 578, Azteca', 1),
(16, 'INST589Osc', 'Oscar', '5896312', '4427894512', 'oscar@mail.com', 'Lomas Vedes 567, Alamos', 1),
(17, 'INST678Eri', 'Erick', '6781245', '4429104569', 'erick@mail.com', 'Lazaro Caedenas 234, Azteca', 1);

--
-- Disparadores `instructor`
--
DELIMITER $$
CREATE TRIGGER `usuario_instructor` AFTER INSERT ON `instructor` FOR EACH ROW begin 
insert into USUARIO
values (new.email_instructor, new.folio, 'Instructor');
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(5) NOT NULL,
  `nombre_municipio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nombre_municipio`) VALUES
(1, 'Queretaro'),
(2, 'Corregidora'),
(3, 'San Juan del Rio'),
(4, 'Colon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rl_curso`
--

CREATE TABLE `rl_curso` (
  `id_curso` int(5) NOT NULL,
  `sede_curso` int(5) DEFAULT NULL,
  `dia_y_hora_curso` varchar(50) NOT NULL,
  `convocatoria` int(5) DEFAULT NULL,
  `instructor` int(5) DEFAULT NULL,
  `promedio_evaluacion_curso` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rl_curso`
--

INSERT INTO `rl_curso` (`id_curso`, `sede_curso`, `dia_y_hora_curso`, `convocatoria`, `instructor`, `promedio_evaluacion_curso`) VALUES
(1, 2, '17 de enero a las 9:00am', 1, 13, 10),
(2, 2, '9:00am - 12:00pm', 2, 14, 0),
(3, 2, '9:00am - 13:00pm', 3, 15, 0),
(4, 2, '11:30am - 13:00pm', 4, 15, 0),
(5, 2, '11:30am - 13:00pm', 5, 15, 0),
(6, 2, '9:00am - 12:00pm', 6, 16, 0),
(7, 5, '9:00am - 12:00pm', 7, 13, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rl_inscripcion`
--

CREATE TABLE `rl_inscripcion` (
  `alumno` int(5) NOT NULL,
  `rl_curso` int(5) NOT NULL,
  `calificacion_alumno` int(3) DEFAULT NULL,
  `total_asistencias` int(2) DEFAULT NULL,
  `evaluacion_curso` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rl_inscripcion`
--

INSERT INTO `rl_inscripcion` (`alumno`, `rl_curso`, `calificacion_alumno`, `total_asistencias`, `evaluacion_curso`) VALUES
(2, 2, 10, 0, 0),
(3, 1, 6, 0, 0),
(7, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id_sede` int(5) NOT NULL,
  `nombre_sede` varchar(30) NOT NULL,
  `institucion` int(5) DEFAULT NULL,
  `municipio` int(5) DEFAULT NULL,
  `capacidad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sede`, `nombre_sede`, `institucion`, `municipio`, `capacidad`) VALUES
(1, 'Queretaro', 1, 1, 20),
(2, 'Facultad de Informatica', 2, 1, 10),
(3, 'Campus Norte', 3, 1, 30),
(4, 'Sala de Conferencias', 2, 1, 50),
(5, 'Auditorio', 3, 1, 200),
(6, 'Sala 11', 4, 1, 100),
(7, 'Sala 22', 4, 1, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `email_usuario` varchar(30) NOT NULL,
  `password_usuario` varchar(10) NOT NULL,
  `tipo_usuario` enum('Alumno','Instructor','Coordinador') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`email_usuario`, `password_usuario`, `tipo_usuario`) VALUES
('admin@mail.com', 'admin', 'Coordinador'),
('alumno@mail.com', '12345', 'Alumno'),
('analau@mail.com', 'ALUM272Ana', 'Alumno'),
('erick@mail.com', 'INST678Eri', 'Instructor'),
('juan@mail.com', 'INST132Jua', 'Instructor'),
('lau@mail.com', 'ALUM442Ana', 'Alumno'),
('liz@mail.com', 'ALUM111liz', 'Alumno'),
('lmt@mail.com', 'ALUM427Ana', 'Alumno'),
('luis@mail.com', 'ALUM777lui', 'Alumno'),
('lupi@mail.com', 'ALUM442lup', 'Alumno'),
('ma@mail.com', 'INST787mar', 'Instructor'),
('noe@gmail.com', 'INST666Noe', 'Instructor'),
('oscar@mail.com', 'INST589Osc', 'Instructor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `fk_alumno_municipio` (`municipio`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`alumno`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `fk_asistencia1` (`alumno`),
  ADD KEY `fk_asistencia2` (`curso`);

--
-- Indices de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  ADD PRIMARY KEY (`id_convocatoria`);

--
-- Indices de la tabla `convocatoria_publicada`
--
ALTER TABLE `convocatoria_publicada`
  ADD PRIMARY KEY (`convocatoria`,`estado_convocatoria`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id_institucion`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id_instructor`),
  ADD KEY `fk_instructor_municipio` (`municipio`),
  ADD KEY `fk_instructor_usuario` (`email_instructor`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`);

--
-- Indices de la tabla `rl_curso`
--
ALTER TABLE `rl_curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `fk__rl_curso_sede` (`sede_curso`),
  ADD KEY `fk__rl_curso_convocatoria` (`convocatoria`),
  ADD KEY `fk__rl_curso_instructor` (`instructor`);

--
-- Indices de la tabla `rl_inscripcion`
--
ALTER TABLE `rl_inscripcion`
  ADD PRIMARY KEY (`alumno`,`rl_curso`),
  ADD KEY `fk_rl_inscripcion_rl_curso` (`rl_curso`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id_sede`),
  ADD KEY `fk_sede_institucion` (`institucion`),
  ADD KEY `fk_sede_municipio` (`municipio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email_usuario`,`password_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  MODIFY `id_convocatoria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `convocatoria_publicada`
--
ALTER TABLE `convocatoria_publicada`
  MODIFY `convocatoria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id_institucion` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id_instructor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rl_curso`
--
ALTER TABLE `rl_curso`
  MODIFY `id_curso` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id_sede` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_alumno_municipio` FOREIGN KEY (`municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `fk_archivos` FOREIGN KEY (`alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_asistencia1` FOREIGN KEY (`alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asistencia2` FOREIGN KEY (`curso`) REFERENCES `rl_curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `fk_instructor_municipio` FOREIGN KEY (`municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rl_curso`
--
ALTER TABLE `rl_curso`
  ADD CONSTRAINT `fk__rl_curso_convocatoria` FOREIGN KEY (`convocatoria`) REFERENCES `convocatoria` (`id_convocatoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk__rl_curso_instructor` FOREIGN KEY (`instructor`) REFERENCES `instructor` (`id_instructor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk__rl_curso_sede` FOREIGN KEY (`sede_curso`) REFERENCES `sede` (`id_sede`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rl_inscripcion`
--
ALTER TABLE `rl_inscripcion`
  ADD CONSTRAINT `fk_rl_inscripcion_alumno` FOREIGN KEY (`alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rl_inscripcion_rl_curso` FOREIGN KEY (`rl_curso`) REFERENCES `rl_curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `fk_sede_institucion` FOREIGN KEY (`institucion`) REFERENCES `institucion` (`id_institucion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sede_municipio` FOREIGN KEY (`municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
