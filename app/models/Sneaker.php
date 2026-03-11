<?php

class Sneaker {

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSneakers()
    {
        $this->db->query("SELECT * FROM sneakers");
        return $this->db->resultSet();
    }

}