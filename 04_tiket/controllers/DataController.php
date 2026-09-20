<?php
class DataController {
    private $model;
    public function __construct($model) { $this->model=$model; }

    private function calculate(array $post): array {
        $data=[];
        foreach (['nama', 'kategori', 'jumlah'] as $k) $data[$k] = trim($post[$k] ?? '');
        $harga_map=['Reguler'=>25000,'VIP'=>50000,'VVIP'=>100000]; $harga=$harga_map[$data['kategori']]??0; $total=$harga*(int)$data['jumlah'];
        return [$data, $harga, $total];
    }

    public function index() { $rows=$this->model->all(); require 'views/index.php'; }
    public function create() { $row=null; $error=''; require 'views/form.php'; }
    public function store() {
        try {
            [$data,$harga,$total]=$this->calculate($_POST);
            $data['harga_per_orang']=$harga; $data['total']=$total;
            if ('04_tiket'==='02_rental') { $data['harga_per_hari']=$harga; unset($data['harga_per_orang']); }
            if ('04_tiket'==='04_tiket') { $data['harga']=$harga; unset($data['harga_per_orang']); }
            if ('04_tiket'==='05_booking_hotel') { $data['harga_per_malam']=$harga; unset($data['harga_per_orang']); }
            $this->model->create($data); header('Location: index.php'); exit;
        } catch (Throwable $e) { $error=$e->getMessage(); $row=$_POST; require 'views/form.php'; }
    }
    public function edit() { $row=$this->model->find((int)($_GET['id']??0)); $error=''; require 'views/form.php'; }
    public function update() {
        try {
            [$data,$harga,$total]=$this->calculate($_POST);
            $data['harga_per_orang']=$harga; $data['total']=$total;
            if ('04_tiket'==='02_rental') { $data['harga_per_hari']=$harga; unset($data['harga_per_orang']); }
            if ('04_tiket'==='04_tiket') { $data['harga']=$harga; unset($data['harga_per_orang']); }
            if ('04_tiket'==='05_booking_hotel') { $data['harga_per_malam']=$harga; unset($data['harga_per_orang']); }
            $this->model->update((int)$_POST['id'],$data); header('Location: index.php'); exit;
        } catch (Throwable $e) { $row=$this->model->find((int)$_POST['id']); $error=$e->getMessage(); require 'views/form.php'; }
    }
    public function delete() { $this->model->delete((int)($_GET['id']??0)); header('Location: index.php'); exit; }
}
