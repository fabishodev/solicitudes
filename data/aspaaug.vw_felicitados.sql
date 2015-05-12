CREATE VIEW vw_felicitados AS (
SELECT a.id, a.id_empleado, b.nombre, b.primer_apellido, b.segundo_apellido,a.anio_felicitacion, a.felicitado, b.fecha_nacimiento,a.ruta_carta FROM aspaaug.tram_felicitaciones a 
LEFT JOIN vw_afiliados b ON (a.id_empleado = b.id_empleado))