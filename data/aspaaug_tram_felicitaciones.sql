CREATE TABLE `tram_felicitaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` varchar(45) DEFAULT NULL,
  `felicitado` int(11) DEFAULT NULL,
  `anio_felicitacion` year(4) DEFAULT NULL,
  `fecha_felicitado` datetime DEFAULT NULL,
  `fecha_creado` varchar(45) DEFAULT NULL,
  `ruta_carta` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_empleado_UNIQUE` (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;