<?php

class SneakersController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneaker');
    }

    public function index($display='none', $message='')
    {
        $result = $this->sneakerModel->getSneakers();

        $data = [
            'title' => 'Overzicht Sneakers',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        $this->view('Sneakers/index', $data);
    }

    public function delete($Id)
    {
        $result = $this->sneakerModel->delete($Id);

        header('Refresh:3; url=' . URLROOT . '/SneakerController/index');

        $this->index('flex', 'record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title' => 'Nieuwe sneaker toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['type'])
            ) {
                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->sneakerModel->create($_POST);

                header('Refresh:3; URL=' . URLROOT . '/SneakerController/index');
            }
        }

        $this->view('Sneakers/create', $data);
    } 
} 