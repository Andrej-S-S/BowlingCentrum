<?php
class ContactInformation extends Controller 
{
    private $contactInformationModel;

    public function __construct()
    {
       $this->contactInformationModel = $this->model('ContactInformationModel'); 
    }

    public function index() 
    {

        $contact = $this->contactInformationModel->getAllContactInformation();

        var_dump($contact);
       // exit();
        $rows = '';
        foreach ($contact as $value)
        {
          $rows .= "<tr>
                  <td>$value->Voornaam $value->TussenVoegsel $value->Achternaam</td>
                  <td>$value->Email</td>
                  <td>$value->Mobiel</td>
                  <td>$value->IsVolwassen</td>
                  <td><a href='" . URLROOT . "/contactinformation/update/$value->Id'>update</a></td>
                  <td><a href='" . URLROOT . "/contactinformation/delete/$value->Id'>delete</a></td>
                </tr>";
        }


        $data = ['title' => 'Contact', 'rows' => $rows];

        var_dump($data);
        // exit();
        $this->view('contactinformation/index', $data);
    }

    public function update() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  

          $data = [ 
            'Email' => $_POST['Email'],
            'Mobiel' => $_POST['Mobiel']
          ];

          $this->contactInformationModel->updateContactInformation($data);
          header("Location:" . URLROOT . "/ContactInformation/index");
        } 
        else {
          // $row = $this->contactInformationModel->getContactInformationById(1);

          $contacten = $this->contactInformationModel->getContactInformationById(1);

          var_dump($contacten);

          $data = [
            'Voornaam' => $contacten->Voornaam,
            'Tussenvoegsel' => $contacten->TussenVoegsel,
            'Achternaam' => $contacten->Achternaam,
            'Email' => $contacten->Email,
            'Mobiel' => $contacten->Mobiel,
            'IsVolwassen' => $contacten->IsVolwassen,
          ];

          // exit;
          // $data = ['title' => 'update', 'row' => $row];
          $this->view("contactinformation/update", $data);
        }
      }

      public function delete($id) {
        $this->contactInformationModel->deleteContactInformation($id);
    
        $data =[
          'deleteStatus' => "Het record met id = $id is verwijdert"
        ];  
        header("Refresh:3; url=" . URLROOT . "/contactinformation/index");
      }

}