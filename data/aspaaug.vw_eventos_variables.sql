CREATE VIEW vw_eventos_variables AS
    (SELECT 
        b.id AS id,
        a.nombre_evento AS nombre_evento,
        a.des_evento AS des_evento,
        b.nombre_variable AS nombre_variable,
        b.descripcion AS descripcion,
        b.estatus AS estatus,
        b.fecha_creado AS fecha_creado
    FROM
        tram_eventos a
        LEFT JOIN tram_eventos_variables b ON (a.id = b.id_evento)
    )