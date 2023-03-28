<?php
class ContactInformationModel {

    private $db;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function getAllContactInformation()
    {
        $this->db->query('  SELECT * 
                            from        Persoon 
                            inner join  contact 
                                    on  contact.PersoonId = Persoon.Id');

        $result = $this->db->resultSet();
        return $result;
    }


    public function getContactInformationById($id = null)
    {
        $this->db->query('  SELECT PERS.Voornaam
		,PERS.TussenVoegsel
        ,PERS.Achternaam
        ,CONT.Email
        ,CONT.Mobiel
        ,PERS.IsVolwassen
from        Persoon AS PERS
inner join  contact AS CONT
                            where PERS.Id = :id');

        $this->db->bind(':id', $id, PDO::PARAM_INT); 

        $result = $this->db->single();
        return $result;
    }

    public function UpdateContactInformation($post){
        $this->db->query('UPDATE contact
                             SET Email = :Email,
                             Mobiel = :Mobiel
                             Where id = 1');
        

        $this->db->bind(':Email', $post["Email"], PDO::PARAM_INT);
        $this->db->bind(':Mobiel', $post["Mobiel"], PDO::PARAM_INT);


        return $this->db->execute();
    }

    public function deleteContactInformation($id){
        $this->db->query('DELETE FROM persoon WHERE id =:id');
        $this->db->bind(':id', $id,  PDO::PARAM_INT);
        return $this->db->execute();
    }   

}