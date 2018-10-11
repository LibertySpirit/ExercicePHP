/* Demo database, with only one table person(person_id, name),
 * having two rows and reste by stored procedure reset_person.
 * Creates a user demo_user with password demo_password having
 * all rights on the DB.
 */
DELIMITER $$
DROP DATABASE IF EXISTS demo $$
CREATE DATABASE demo DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci $$
USE demo $$

CREATE TABLE person (
  person_id INT(11) PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(45) UNIQUE,
  password VARCHAR(45)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 $$

/* Reset procedure declaration and call, which populate the table */
DROP PROCEDURE IF EXISTS reset_person $$
CREATE PROCEDURE reset_person()
BEGIN
  -- Empty table person
  TRUNCATE person;
  -- Reset its id counter
  ALTER TABLE person AUTO_INCREMENT=1;
  INSERT INTO person VALUES (1, 'Tintin', 'tintin');
  INSERT INTO person VALUES (2, 'Haddock', 'mille sabords');
  INSERT INTO person VALUES (3, 'Hergé', 'tchang');
END $$

CALL reset_person() $$

/* Create a user to be used in PHP for the connection,
 * and give him all grants on the DB.
 */
-- Delete the user ...
DELETE FROM mysql.user WHERE user='demo_user' $$
-- and his grants
DELETE FROM mysql.db WHERE user='demo_user' $$
DELETE FROM mysql.tables_priv WHERE user='demo_user' $$
FLUSH PRIVILEGES $$
-- Create him
CREATE USER demo_user@localhost IDENTIFIED by 'demo_password' $$
-- Grant him rights on the DB ...
GRANT ALL ON demo.* TO demo_user@localhost $$
-- and on the stored procedure
GRANT SELECT ON mysql.proc TO demo_user@localhost $$
