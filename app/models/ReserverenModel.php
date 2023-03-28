<?php

class ReserverenModel
{

    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getReserveringen()
    {
        $sql = "SELECT  
                       res.id as resId,
                       res.Datum, 
                       res.BeginTijd,
                       res.Eindtijd,
                       res.Volwassenen,
                       res.Kinderen,
                       pers.id from persoon pers INNER JOIN reservering res 
                       ON pers.id = res.PersoonId 
                       WHERE pers.id = 1";
        $this->db->query($sql);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getgetReserveringById($id)
    {
        $this->db->query("SELECT  
                       res.id as resId,
                       res.Datum, 
                       res.BeginTijd,
                       res.Eindtijd,
                       res.Volwassenen,
                       res.Kinderen FROM reservering AS res
                       WHERE res.id = :id");
        $this->db->bind(':id', 2);
        return $this->db->single();
    }

    public function createReservering($post, $begintijd)
    {
        $sql = "INSERT INTO reservering (Datum, 
                                        BeginTijd, 
                                        Eindtijd, 
                                        Volwassenen, 
                                        Kinderen, 
                                        PersoonId) 
                VALUES (
                                        :Datum,
                                        :BeginTijd,
                                        :Eindtijd,
                                        :Volwassenen,
                                        :Kinderen, 
                                        :PersoonId)";
        $this->db->query($sql);
        $this->db->bind(':Datum', $post['Datum']);
        $this->db->bind(':BeginTijd', $begintijd);
        $this->db->bind(':Eindtijd', $post['Eindtijd']);
        $this->db->bind(':Volwassenen', $post['Volwassenen']);
        $this->db->bind(':Kinderen', $post['Kinderen']);
        $this->db->bind(':PersoonId', $post['PersoonId']);
        $this->db->execute();
    }

    public function updateReservering($post)
    {
        $this->db->query("UPDATE reservering SET Datum = :Datum, BeginTijd = :BeginTijd, Volwassenen = :Volwassenen, Kinderen = :Kinderen WHERE id = :resId");
        $this->db->bind(':Datum', $post['Datum'], PDO::PARAM_STR);
        $this->db->bind(':BeginTijd', $post['BeginTijd'], PDO::PARAM_STR);
        $this->db->bind(':Volwassenen', $post['Volwassenen'], PDO::PARAM_INT);
        $this->db->bind(':Kinderen', $post['Kinderen'], PDO::PARAM_INT);
        $this->db->bind(':resId', $post['id']);
        $this->db->execute();
    }

    public function deleteReservering($id)
    {
        echo $id;
        // exit;
        $this->db->query("DELETE FROM reservering WHERE reservering.id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        $this->db->execute();
    }
}
