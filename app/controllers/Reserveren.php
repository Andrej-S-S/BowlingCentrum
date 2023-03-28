<?php

class Reserveren extends Controller
{
    private $reserverenModel;

    public function index()
    {

        $data = [
            'title' => 'Reserveren',
        ];
        $this->view('reserveren/index', $data);
    }

    public function __construct()
    {
        $this->reserverenModel = $this->model('ReserverenModel');
    }



    public function reserverenOverzicht()
    {
        $reserveringen = $this->reserverenModel->getReserveringen();

        $rows = '';
        foreach ($reserveringen as $value) {
            $rows .= "<tr>
                        <td>$value->Datum</td>
                        <td>$value->BeginTijd tot $value->Eindtijd</td>
                        <td>$value->Volwassenen volwassenen $value->Kinderen kinderen</td>
                        <td><a href='" . URLROOT . "/reserveren/update/$value->resId'>update</a></td>
                        <td><a href='" . URLROOT . "/reserveren/annuleerReserveren/$value->resId'>delete</a></td>
                        
                    </tr>
            ";
        }

        $data = [
            'title' => 'Reserveren Overzicht',
            'rows' => $rows
        ];
        $this->view('reserveren/overzicht', $data);
    }

    public function update($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->reserverenModel->updateReservering($_POST);

            header("Location: " . URLROOT . "reserveren/index");
        }
        $row = $this->reserverenModel->getgetReserveringById($id);

        var_dump($row);
        
        echo $row->Datum;

        $data = [
            'Datum' => $row->Datum,
            'BeginTijd' => $row->BeginTijd,
            'Volwassenen' => $row->Volwassenen,
            'Kinderen' => $row->Kinderen,
        ];

        $this->view('reserveren/update', $data);
    }

    public function annuleerReserveren($id = null)
    {
        if ($id == null) {
            header('location: ' . URLROOT . '/reserveren/index');
            exit();
        }
        // $this->view('reserveren/update');


        $this->reserverenModel->deleteReservering($id);
        header('location: ' . URLROOT . '/reserveren/reserverenOverzicht');
    }
}
