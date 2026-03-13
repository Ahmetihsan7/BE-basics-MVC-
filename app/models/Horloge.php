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

    public function create($post)
    {
        $this->db->query("INSERT INTO horloges 
                            (Merk, Model, Prijs, Materiaal, Gewicht, Releasedatum, Waterdichtheid, Type)
                          VALUES
                            (:merk, :model, :prijs, :materiaal, :gewicht, :releasedatum, :waterdichtheid, :type)");

        $this->db->bind(':merk', $post['merk']);
        $this->db->bind(':model', $post['model']);
        $this->db->bind(':prijs', $post['prijs']);
        $this->db->bind(':materiaal', $post['materiaal']);
        $this->db->bind(':gewicht', $post['gewicht']);
        $this->db->bind(':releasedatum', $post['releasedatum']);
        $this->db->bind(':waterdichtheid', $post['waterdichtheid']);
        $this->db->bind(':type', $post['type']);

        return $this->db->execute();
    }
}