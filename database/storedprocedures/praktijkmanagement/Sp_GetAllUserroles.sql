USE laravel;

DROP PROCEDURE IF EXISTS Sp_GetAllUserroles;

DELIMITER $$

CREATE PROCEDURE Sp_GetAllUserroles()
BEGIN

    SELECT 'patient' AS rolename
    UNION
    SELECT 'tandarts'
    UNION
    SELECT 'mondhygienist'
    UNION
    SELECT 'assistent'
    UNION
    SELECT 'praktijkmanagement';

END$$

DELIMITER ;