<?php

class HorlogesController extends BaseController {
    private $horlogeModel;

    public function __construct() {
        $this->horlogeModel = $this->model('Horloge');
    }

    public function index($display='none', $message='', $color='success') {
        $result = $this->horlogeModel->getHorloges();
        $data = [
            'title' => 'Overzicht Horloges',
            'display' => $display,
            'message' => $message,
            'color' => $color,
            'result' => $result
        ];
        $this->view('Horloges/index', $data);
    }

    public function create() {
        $data = ['title' => 'Nieuwe horloge toevoegen', 'display' => 'none', 'message' => ''];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->horlogeModel->create($_POST);
            header('Refresh:2; URL=' . URLROOT . '/HorlogesController/index');
            $this->index('flex', 'De gegevens zijn opgeslagen');
            return;
        }
        $this->view('Horloges/create', $data);
    }

    public function update($id = null) {
        $data = ['title' => 'Wijzig Horloge', 'display' => 'none', 'message' => '', 'color' => 'success'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->horlogeModel->updateHorloge($_POST);
            header("Refresh:2; url=" . URLROOT . "/HorlogesController/index");
            $this->index('flex', 'Het record is succesvol bijgewerkt');
            return;
        }

        $data['horloge'] = $this->horlogeModel->getHorlogeById($id);
        $this->view('Horloges/update', $data);
    }

    public function delete($id) {
        $this->horlogeModel->delete($id);
        header('Refresh:2; url=' . URLROOT . '/HorlogesController/index');
        $this->index('flex', 'Record is verwijderd', 'danger');
    }
}