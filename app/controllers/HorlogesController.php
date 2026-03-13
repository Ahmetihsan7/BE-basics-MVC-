<?php

class HorlogesController extends BaseController
{
    private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('Horloge');
    }

    public function index($display='none', $message='')
    {
        $result = $this->horlogeModel->getHorloges();

        $data = [
            'title' => 'Overzicht Horloges',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        $this->view('Horloges/index', $data);
    }

    public function delete($Id)
    {
        $result = $this->horlogeModel->delete($Id);

        header('Refresh:3; url=' . URLROOT . '/HorlogeController/index');

        $this->index('flex', 'record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title' => 'Nieuwe horloge toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['materiaal']) ||
                empty($_POST['gewicht']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['waterdichtheid']) ||
                empty($_POST['type'])
            ) {
                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->horlogeModel->create($_POST);

                header('Refresh:3; URL=' . URLROOT . '/HorlogeController/index');
            }
        }

        $this->view('Horloges/create', $data);
    }
}