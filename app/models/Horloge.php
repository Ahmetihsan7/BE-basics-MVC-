<?php

class Horloge {

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getHorloges()
    {
        $this->db->query("SELECT * FROM horloges");
        return $this->db->resultSet();
    }

}