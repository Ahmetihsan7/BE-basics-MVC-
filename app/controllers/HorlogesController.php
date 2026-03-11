<?php

class HorlogesController extends BaseController
{
    private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('Horloge');
    }

    public function index()
    {
        $result = $this->horlogeModel->getHorloges();

        $data = [
            'title' => 'Overzicht Horloges',
            'result' => $result,
            'message' => '',
            'display' => 'none'
        ];

        $this->view('horloges/index', $data);
    }

    public function delete($id)
    {
        $this->horlogeModel->deleteHorloge($id);

        header('Location: ' . URLROOT . '/HorlogesController/index');
    }
}