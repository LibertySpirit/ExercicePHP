<?php

class DemoDB {

    /** Give a connection to the quizz DB, in UTF-8 */
    public static function getConnection() {
        // DB configuration
        $db = "demo";
        $dsn = "mysql:dbname=$db;host=localhost;charset=utf8";
        $user = "demo_user";
        $password = "demo_password";
        // Get a DB connection with PDO library
        $bdd = new PDO($dsn, $user, $password);
        // Set communication in utf-8
        $bdd->exec("SET character_set_client = 'utf8'");
        // Throw the SQL exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }

}
