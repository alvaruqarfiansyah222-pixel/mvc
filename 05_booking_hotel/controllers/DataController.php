<?php
class DataController {
    private $model;
    public function __construct($model) { $this->model=$model; }

    private function calculate(array $post): array {
        $data=[];
        foreach (['nama', 'tipe_kamar', 'malam', 'orang'] as $k) $data[$k] = trim($post[$k] ?? '');
        $harga_map=['Standard'=>200000,'Deluxe'=>350000,'Suite'=>600000]; $harga=$harga_map[$data['tipe_kamar']]??0; $total=$harga*(int)$data['malam'];
        return [$data, $harga, $total];
    }

    public function index() { $rows=$this->model->all(); require 'views/index.php'; }
    public function create() { $row=null; $error=''; require 'views/form.php'; }
    public function store() {
        try {
            [$data,$harga,$total]=$this->calculate($_POST);
            $data['harga_per_orang']=$harga; $data['total']=$total;
            if ('05_booking_hotel'==='02_rental') { $data['harga_per_hari']=$harga; unset($data['harga_per_orang']); }
            if ('05_booking_hotel'==='04_tiket') { $data['harga']=$harga; unset($data['harga_per_orang']); }
            if ('05_booking_hotel'==='05_booking_hotel') { $data['harga_per_malam']=$harga; unset($data['harga_per_orang']); }
            $this->model->create($data); header('Location: index.php'); exit;
        } catch (Throwable $e) { $error=$e->getMessage(); $row=$_POST; require 'views/form.php'; }
    }
    public function edit() { $row=$this->model->find((int)($_GET['id']??0)); $error=''; require 'views/form.php'; }
    public function update() {
        try {
            [$data,$harga,$total]=$this->calculate($_POST);
            $data['harga_per_orang']=$harga; $data['total']=$total;
            if ('05_booking_hotel'==='02_rental') { $data['harga_per_hari']=$harga; unset($data['harga_per_orang']); }
            if ('05_booking_hotel'==='04_tiket') { $data['harga']=$harga; unset($data['harga_per_orang']); }
            if ('05_booking_hotel'==='05_booking_hotel') { $data['harga_per_malam']=$harga; unset($data['harga_per_orang']); }
            $this->model->update((int)$_POST['id'],$data); header('Location: index.php'); exit;
        } catch (Throwable $e) { $row=$this->model->find((int)$_POST['id']); $error=$e->getMessage(); require 'views/form.php'; }
    }
    public function delete() { $this->model->delete((int)($_GET['id']??0)); header('Location: index.php'); exit; }
}
