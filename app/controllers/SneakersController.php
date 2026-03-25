<?php

class SneakersController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneaker');
    }

    public function index($display = 'none', $message = '', $color = 'success')
    {
        $sneakers = $this->sneakerModel->getSneakers();
        $data = [
            'title'   => 'Sneaker Overzicht',
            'sneakers' => $sneakers,
            'display' => $display,
            'message' => $message,
            'color'   => $color
        ];
        $this->view('sneakers/index', $data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->sneakerModel->create($_POST);
            header("Refresh:2; url=" . URLROOT . "/SneakersController/index");
            $this->index('flex', 'Sneaker is toegevoegd!');
        } else {
            $data = ['title' => 'Nieuwe Sneaker Toevoegen', 'display' => 'none', 'message' => ''];
            $this->view('sneakers/create', $data);
        }
    }

    public function update($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->sneakerModel->updateSneaker($_POST);
            header("Refresh:2; url=" . URLROOT . "/SneakersController/index");
            $this->index('flex', 'Sneaker is bijgewerkt!');
        } else {
            $sneaker = $this->sneakerModel->getSneakerById($id);
            $data = ['title' => 'Sneaker Wijzigen', 'sneaker' => $sneaker, 'display' => 'none', 'message' => ''];
            $this->view('sneakers/update', $data);
        }
    }

    public function delete($id)
    {
        $this->sneakerModel->delete($id);
        header("Refresh:2; url=" . URLROOT . "/SneakersController/index");
        $this->index('flex', 'Sneaker is verwijderd!', 'danger');
    }
}