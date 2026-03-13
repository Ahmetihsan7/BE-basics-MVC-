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

    public function create($post)
    {
        $this->db->query("INSERT INTO sneakers 
                          (Merk, Model, Type) 
                          VALUES 
                          (:merk, :model, :type)");

        $this->db->bind(':merk', $post['merk']);
        $this->db->bind(':model', $post['model']);
        $this->db->bind(':type', $post['type']);

        return $this->db->execute();
    }

}