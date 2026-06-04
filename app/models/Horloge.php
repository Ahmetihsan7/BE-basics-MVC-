<?php

class Horloge
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getHorloges()
    {
        $this->db->query("SELECT * FROM horloges ORDER BY Id DESC");
        return $this->db->resultSet();
    }

    public function getHorlogeById($id)
    {
        $this->db->query("SELECT * FROM horloges WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function create($post)
    {
        $this->db->query("INSERT INTO horloges (Merk, Model, Prijs, Materiaal, Gewicht, Releasedatum, Waterdichtheid, Type)
                          VALUES (:merk, :model, :prijs, :materiaal, :gewicht, :releasedatum, :waterdichtheid, :type)");
        
        $this->db->bind(':merk', $post['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $post['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $post['prijs'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $post['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $post['gewicht'], PDO::PARAM_INT);
        $this->db->bind(':releasedatum', $post['releasedatum'], PDO::PARAM_STR);
        $this->db->bind(':waterdichtheid', $post['waterdichtheid'], PDO::PARAM_INT);
        $this->db->bind(':type', $post['type'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function updateHorloge($post)
    {
        $this->db->query("UPDATE horloges 
                          SET Merk = :merk, 
                              Model = :model, 
                              Prijs = :prijs, 
                              Materiaal = :materiaal, 
                              Gewicht = :gewicht, 
                              Releasedatum = :releasedatum, 
                              Waterdichtheid = :waterdichtheid, 
                              Type = :type 
                          WHERE Id = :id");

        $this->db->bind(':id', $post['id'], PDO::PARAM_INT);
        $this->db->bind(':merk', $post['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $post['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $post['prijs'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $post['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $post['gewicht'], PDO::PARAM_INT);
        $this->db->bind(':releasedatum', $post['releasedatum'], PDO::PARAM_STR);
        $this->db->bind(':waterdichtheid', $post['waterdichtheid'], PDO::PARAM_INT);
        $this->db->bind(':type', $post['type'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM horloges WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }
}