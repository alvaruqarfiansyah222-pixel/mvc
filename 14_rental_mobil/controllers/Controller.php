<?php

require_once 'models/Model.php';

class Controller
{
    private $m;

    public function __construct()
    {
        $this->m = new Model();
    }

    // Menampilkan view
    public function v($x, $d = [])
    {
        extract($d);

        include "views/$x.php";
    }


    // =========================
    // DASHBOARD
    // =========================

    public function dashboard()
    {
        $this->v('dashboard', [
            's' => $this->m->stats(),
            'data' => $this->m->list()
        ]);
    }


    // =========================
    // DATA MOBIL
    // =========================

    public function mobil($a = '')
    {
        if ($a == 'save') {

            $this->m->saveMobil($_POST);

            header('Location: ?page=mobil');
            exit;
        }

        if ($a == 'delete') {

            $this->m->delMobil($_GET['id']);

            header('Location: ?page=mobil');
            exit;
        }

        $this->v('mobil', [
            'data' => $this->m->mobil(),
            'edit' => $a == 'edit'
                ? $this->m->getMobil($_GET['id'])
                : null
        ]);
    }


    // =========================
    // DATA PELANGGAN
    // =========================

    public function pelanggan($a = '')
    {
        if ($a == 'save') {

            $this->m->savePelanggan($_POST);

            header('Location: ?page=pelanggan');
            exit;
        }

        if ($a == 'delete') {

            $this->m->delPelanggan($_GET['id']);

            header('Location: ?page=pelanggan');
            exit;
        }

        $this->v('pelanggan', [
            'data' => $this->m->pelanggan(),
            'edit' => $a == 'edit'
                ? $this->m->getPelanggan($_GET['id'])
                : null
        ]);
    }


    // =========================
    // RENTAL MOBIL
    // =========================

    public function rental($a = '')
    {
        if ($a == 'save') {

            $this->m->sewa($_POST);

            header('Location: ?page=rental');
            exit;
        }

        if ($a == 'selesai') {

            $this->m->selesai($_GET['id']);

            header('Location: ?page=rental');
            exit;
        }

        $this->v('rental', [
            'data' => $this->m->list(),
            'mobil' => $this->m->tersedia(),
            'pelanggan' => $this->m->pelanggan()
        ]);
    }


    // =========================
    // LAPORAN
    // =========================

    public function laporan()
    {
        $this->v('laporan', [
            'data' => $this->m->list()
        ]);
    }
}