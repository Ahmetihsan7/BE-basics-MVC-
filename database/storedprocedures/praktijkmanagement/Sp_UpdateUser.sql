USE laravel;

DROP PROCEDURE IF EXISTS Sp_UpdateUser;

DELIMITER $$

CREATE PROCEDURE Sp_UpdateUser(
    IN p_Id INTEGER,
    IN p_Name VARCHAR(255),
    IN p_Email VARCHAR(255),
    IN p_Rolename VARCHAR(20)
)
BEGIN
    UPDATE users
    SET
        name = p_Name,
        email = p_Email,
        rolename = p_Rolename,
        updated_at = NOW()
    WHERE id = p_Id;
END$$

DELIMITER ;