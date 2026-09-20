<?php
class DataBukuController {
    private DataBukuModel $model;

    public function __construct(DataBukuModel $model) {
        $this->model = $model;
    }

    private function clean(array $post): array {
        $data = [];
        foreach (["judul", "penulis", "kategori", "stok"] as $key) {
            $data[$key] = trim($post[$key] ?? '');
        }
        
        return $data;
    }

    public function index(): void {
        $rows = $this->model->all();
        require 'views/index.php';
    }

    public function create(): void {
        $row = null;
        $error = '';
        require 'views/form.php';
    }

    public function store(): void {
        try {
            $this->model->create($this->clean($_POST));
            header('Location: index.php');
            exit;
        } catch (Throwable $e) {
            $row = $_POST;
            $error = $e->getMessage();
            require 'views/form.php';
        }
    }

    public function edit(): void {
        $row = $this->model->find((int)($_GET['id'] ?? 0));
        $error = '';
        require 'views/form.php';
    }

    public function update(): void {
        try {
            $this->model->update((int)$_POST['id'], $this->clean($_POST));
            header('Location: index.php');
            exit;
        } catch (Throwable $e) {
            $row = $_POST;
            $error = $e->getMessage();
            require 'views/form.php';
        }
    }

    public function delete(): void {
        $this->model->delete((int)($_GET['id'] ?? 0));
        header('Location: index.php');
        exit;
    }
}
