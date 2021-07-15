
-- Tabal base
-- describe ciudad;
-- +------------+--------------+------+-----+---------+----------------+
-- | Field      | Type         | Null | Key | Default | Extra          |
-- +------------+--------------+------+-----+---------+----------------+
-- | ciu_id     | int(11)      | NO   | PRI | NULL    | auto_increment |
-- | ciu_nombre | varchar(30)  | NO   |     | NULL    |                |
-- | dep_id     | int(11)      | NO   | MUL | NULL    |                |
-- | ciu_imagen | varchar(200) | YES  |     | NULL    |                |
-- +------------+--------------+------+-----+---------+----------------+


-- Informacion tabla
-- select * from ciudad;
-- +--------+------------+--------+------------------------------------------------------------+
-- | ciu_id | ciu_nombre | dep_id | ciu_imagen                                                 |
-- +--------+------------+--------+------------------------------------------------------------+
-- |      1 | Cali       |      3 | ../imagenesCargadas/ciudad_1_wallp1.jpg                    |
-- |      2 | Palmira    |      1 | ../imagenesCargadas/ciudad_2_cali.jpg                      |
-- |      3 | Cali1      |      1 | ../imagenesCargadas/ciudad_3_cali.jpg                      |
-- |      5 | Prueba SQL |      1 | ../imagenesCargadas/ciudad_5_WIN_20210317_22_55_53_Pro.jpg |
-- +--------+------------+--------+------------------------------------------------------------+



-- Crear tabla bitacora
CREATE TABLE bitacora ( 
    bit_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    bit_user VARCHAR (100) NOT NULL, 
    bit_table VARCHAR (100) NOT NULL, 
    bit_accion VARCHAR (100) NOT NULL, 
    bit_descripcion TEXT NOT NULL, 
    bit_fecha DATETIME NOT NULL 
);


-- Crear funcion de evaluar campo
DELIMITER $$

    CREATE FUNCTION evaluarCampo (
        atributo VARCHAR(200),
        datoViejo VARCHAR(200),
        datoNuevo VARCHAR(200),
        respuesta TEXT
    )
    RETURNS TEXT
    BEGIN

        IF (datoViejo <> datoNuevo) THEN

            SET respuesta =CONCAT(respuesta,"Atributo: ",atributo,", Dato Anterior: ",datoViejo," - ","Dato Nuevo: ",datoNuevo,". \n ");

        ELSE

            SET respuesta =CONCAT(respuesta,"");

        END IF;

        RETURN (respuesta);
    END$$

DELIMITER ;


-- Crear procedimiento de insertar

DELIMITER $$

    CREATE PROCEDURE insertarBitacora (
        IN bit_user VARCHAR(100),
        IN bit_table VARCHAR(100),
        IN bit_accion VARCHAR (100),
        IN bit_descripcion TEXT
    )
    BEGIN

        INSERT INTO bitacora value(NULL,bit_user,bit_table,bit_accion,bit_descripcion,NOW());

    END$$

DELIMITER ;


-- Crear el disparador de la tabla, en insertar
DELIMITER $$
    CREATE TRIGGER trigger_insert_ciudad_bitacora
        AFTER INSERT
    ON ciudad FOR EACH ROW
    BEGIN
        DECLARE descripcion TEXT;
        SET descripcion = CONCAT(   "ciu_id: ",NEW.ciu_id,". \n ",
                                    "ciu_nombre: ",NEW.ciu_nombre,". \n ",
                                    "dep_id: ",NEW.dep_id,". \n ",
                                    "ciu_imagen: ",NEW.ciu_imagen,". \n "
                                    );

        CALL insertarBitacora ( current_user(),"ciudad","INSERT",descripcion);
    END$$
DELIMITER ;


-- Crear el disparador de la tabla, en Update
DELIMITER $$
    CREATE TRIGGER trigger_update_ciudad_bitacora
        AFTER UPDATE
    ON ciudad FOR EACH ROW
        BEGIN
            DECLARE descripcion TEXT;
            SET descripcion="";


            SET descripcion = evaluarCampo( "ciu_id",OLD.ciu_id,NEW.ciu_id,descripcion );
            SET descripcion = evaluarCampo( "ciu_nombre",OLD.ciu_nombre,NEW.ciu_nombre,descripcion );
            SET descripcion = evaluarCampo( "dep_id",OLD.dep_id,NEW.dep_id,descripcion );
            SET descripcion = evaluarCampo( "ciu_imagen",OLD.ciu_imagen,NEW.ciu_imagen,descripcion );

            CALL insertarBitacora ( current_user(),"ciudad","UPDATE",descripcion);
        END$$
DELIMITER ;

-- Crear el disparador de la tabla, en delete
DELIMITER $$
    CREATE TRIGGER trigger_delete_ciudad_bitacora
        AFTER delete
    ON ciudad FOR EACH ROW
    BEGIN
        DECLARE descripcion TEXT;
        SET descripcion = CONCAT(   "ciu_id: ",OLD.ciu_id,". \n ",
                                    "ciu_nombre: ",OLD.ciu_nombre,". \n ",
                                    "dep_id: ",OLD.dep_id,". \n ",
                                    "ciu_imagen: ",OLD.ciu_imagen,". \n "
                                    );

        CALL insertarBitacora ( current_user(),"ciudad","DELETE",descripcion);
    END$$
DELIMITER ;



-- Despues de hacer pruebas con disparador

-- select * from bitacora;
-- +--------+----------------+-----------+------------+---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+---------------------+
-- | bit_id | bit_user       | bit_table | bit_accion | bit_descripcion

--                                                                                                                                       | bit_fecha           |
-- +--------+----------------+-----------+------------+---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+---------------------+
-- |      1 | root@localhost | ciudad    | INSERT     | ciu_id: 5.
                                                    --  ciu_nombre: Prueba SQL.
                                                    --  dep_id: 1.
                                                    --  ciu_imagen: ../imagenesCargadas/ciudad_5_WIN_20210317_22_55_53_Pro.jpg. 

--                                                                                                                                      | 2021-04-12 11:08:48 |
-- |      2 | root@localhost | ciudad    | UPDATE     | Atributo: ciu_id, Dato Anterior: 3 - Dato Nuevo: 3.                             | 2021-04-12 11:17:57 |
-- |      3 | root@localhost | ciudad    | UPDATE     | Atributo: dep_id, Dato Anterior: 4 - Dato Nuevo: 3.                             | 2021-04-12 11:20:32 |        
-- |      4 | root@localhost | ciudad    | DELETE     | ciu_id: 4.
                                                    --  ciu_nombre: b.
                                                    --  dep_id: 1.
                                                    --  ciu_imagen: ../imagenesCargadas/ciudad_4_wallp1.jpg.

--                                                                                                                                      | 2021-04-12 11:23:49 |
-- +--------+----------------+-----------+------------+---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+---------------------+


