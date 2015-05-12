CREATE VIEW vw_evento_afiliado AS
    (SELECT 
        a.id AS id,
        a.nombre_evento AS nombre_evento,
        a.des_evento AS des_evento,
        a.lugar AS lugar,
        a.hora_inicio AS hora_inicio,
        a.hora_fin AS hora_fin,
        a.fecha_inicio AS fecha_inicio,
        b.id_afiliado AS id_afiliado,
        c.nombre_variable AS nombre_variable,
        c.descripcion AS descripcion,
        b.valor AS valor,
        a.estatus AS estatus,
        b.id_evento AS id_evento,
        c.id AS id_variable
    FROM
        tram_eventos a
        LEFT JOIN tram_eventos_afiliados b ON (a.id = b.id_evento)
        LEFT JOIN tram_eventos_variables c ON (a.id = c.id_evento)
    )