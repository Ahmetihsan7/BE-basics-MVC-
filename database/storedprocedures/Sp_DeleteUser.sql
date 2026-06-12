USE laravel;

DROP PROCEDURE IF EXISTS Sp_DeleteUser;

DELIMITER $$

CREATE PROCEDURE Sp_DeleteUser(
    IN p_id INT
)
BEGIN
    DELETE FROM users
    WHERE id = p_id;

    SELECT ROW_COUNT() AS affected;
END$$

DELIMITER ;