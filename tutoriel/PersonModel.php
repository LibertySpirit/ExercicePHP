<?php

require_once("DemoDB.php");

/** Access to the person table.
 * Put here the methods like getBySomeCriteriaSEarch */
class PersonModel {

    /** Get person data for id $personId
     * (here demo with a SQL request about an existing table)
     * @param int $personId id of the quizz to be retrieved
     * @return associative_array table row
     */
    public static function get($personId) {
        $db = DemoDB::getConnection();
        $sql = "SELECT person_id, name
              FROM person
              WHERE person_id = :person_id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":person_id", $personId);
        $ok = $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getByLoginPassword($login, $password) {
        $db = DemoDB::getConnection();
        $sql = "SELECT person_id, name, password
            FROM person
            WHERE name = :name AND password = :password";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":name", $login);
        $stmt->bindValue(":password", $password);
        $ok = $stmt->execute();
				return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

?>