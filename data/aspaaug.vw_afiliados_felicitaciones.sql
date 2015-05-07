CREATE VIEW vw_afiliados_felicitados as
(
SELECT a.id_empleado, a.nombre, a.primer_apellido, a.segundo_apellido, a.fecha_nacimiento, a.edad, a.correo_electronico FROM vw_afiliados a
WHERE a.id_empleado  NOT IN (
SELECT b.id_empleado FROM tram_felicitaciones b
WHERE b.anio_felicitacion <= YEAR(CURDATE()))
)