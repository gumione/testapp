<?php

class Model
{
    /**
     * @param object $db PDO DB connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit("Cant connect to database using provided settings");
        }
    }
}
