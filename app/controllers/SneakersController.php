<?php

class SneakersController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneaker');
    }

    public function index()
    {
        $result = $this->sneakerModel->getSneakers();

        $data = [
            'title' => 'Overzicht Sneakers',
            'result' => $result,
            'message' => '',
            'display' => 'none'
        ];

        $this->view('sneakers/index', $data);
    }

    public function delete($id)
    {
        $this->sneakerModel->deleteSneaker($id);

        header('Location: ' . URLROOT . '/SneakersController/index');
    }
}