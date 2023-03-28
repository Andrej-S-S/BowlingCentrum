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
        $sql = "UPDATE reservering SET Datum = :Datum, BeginTijd = :BeginTijd, Volwassenen = :Volwassenen, Kinderen = :Kinderen WHERE id = :id";
        $this->db->bind(':Datum', $post['Datum']);
        $this->db->bind(':BeginTijd', $post['BeginTijd']);
        $this->db->bind(':Volwassenen', $post['Volwassenen']);
        $this->db->bind(':Kinderen', $post['Kinderen']);
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
