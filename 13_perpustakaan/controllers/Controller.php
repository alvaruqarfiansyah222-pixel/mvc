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
    public function view($v, $d = [])
    {
        extract($d);
        include "views/$v.php";
    }

    // Dashboard
    public function dashboard()
    {
        $this->view('dashboard', [
            's' => $this->m->stats(),
            'data' => $this->m->pinjaman()
        ]);
    }

    // Data Buku
    public function buku($a = '')
    {
        if ($a == 'save') {
            $this->m->saveBuku($_POST);

            header('Location: ?page=buku');
            exit;
        }

        if ($a == 'delete') {
            $this->m->delBuku($_GET['id']);

            header('Location: ?page=buku');
            exit;
        }

        $this->view('buku', [
            'data' => $this->m->buku(),
            'edit' => $a == 'edit'
                ? $this->m->getBuku($_GET['id'])
                : null
        ]);
    }

    // Data Anggota
    public function anggota($a = '')
    {
        if ($a == 'save') {
            $this->m->saveAnggota($_POST);

            header('Location: ?page=anggota');
            exit;
        }

        if ($a == 'delete') {
            $this->m->delAnggota($_GET['id']);

            header('Location: ?page=anggota');
            exit;
        }

        $this->view('anggota', [
            'data' => $this->m->anggota(),
            'edit' => $a == 'edit'
                ? $this->m->getAnggota($_GET['id'])
                : null
        ]);
    }

    // Peminjaman
    public function peminjaman($a = '')
    {
        if ($a == 'save') {
            $this->m->pinjam($_POST);

            header('Location: ?page=peminjaman');
            exit;
        }

        if ($a == 'kembali') {
            $this->m->kembali($_GET['id']);

            header('Location: ?page=peminjaman');
            exit;
        }

        $this->view('peminjaman', [
            'data' => $this->m->pinjaman(),
            'buku' => $this->m->buku(),
            'anggota' => $this->m->anggota()
        ]);
    }

    // Laporan
    public function laporan()
    {
        $this->view('laporan', [
            'data' => $this->m->pinjaman()
        ]);
    }
}