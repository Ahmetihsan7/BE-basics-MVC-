<?php

class Sneaker
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getSneakers() {
    $this->db->query("SELECT Id, Merk, Model, Type, IsActief FROM sneakers ORDER BY Id DESC");
    return $this->db->resultSet();
}

    public function getSneakerById($id)
    {
        $this->db->query("SELECT * FROM sneakers WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function create($post)
    {
        $this->db->query("INSERT INTO sneakers (Merk, Model, Maat, Kleur, Prijs, Materiaal, Releasedatum)
                          VALUES (:merk, :model, :maat, :kleur, :prijs, :materiaal, :releasedatum)");
        
        $this->bindParams($post);
        return $this->db->execute();
    }
public function updateSneaker($post)
{
    $this->db->query("UPDATE sneakers 
                      SET Merk = :merk, 
                          Model = :model, 
                          Type = :type, 
                          IsActief = :is_actief, 
                          Opmerking = :opmerking 
                      WHERE Id = :id");

    $this->db->bind(':id', $post['id'], PDO::PARAM_INT);
    $this->db->bind(':merk', $post['merk'], PDO::PARAM_STR);
    $this->db->bind(':model', $post['model'], PDO::PARAM_STR);
    $this->db->bind(':type', $post['type'], PDO::PARAM_STR);
    $this->db->bind(':is_actief', $post['is_actief'], PDO::PARAM_INT);
    $this->db->bind(':opmerking', $post['opmerking'], PDO::PARAM_STR);

    return $this->db->execute();
}
    public function delete($id)
    {
        $this->db->query("DELETE FROM sneakers WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    private function bindParams($post)
    {
        $this->db->bind(':merk', $post['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $post['model'], PDO::PARAM_STR);
        $this->db->bind(':maat', $post['maat'], PDO::PARAM_INT);
        $this->db->bind(':kleur', $post['kleur'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $post['prijs'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $post['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $post['releasedatum'], PDO::PARAM_STR);
    }
}