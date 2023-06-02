<?php

    // Bundle class untuk integrasi dengan beberapa library
    namespace xel\framework\Basedata;
    //digunakan untuk integrasi dengan class koneksi dengan database
    use xel\framework\Devise\BaseCon;
    use xel\framework\Helper\Xgenquery as autoquery;

    //Autoloader psr-4 untuk mengizinkan pemanggilan dan penggunaan file class menggunakan namespace
    require_once __DIR__."/../../vendor/autoload.php";

    // Mengaktifkan error status pada kode php yang di blok ketika masalah bug terdapat pada 500 internal server error
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //parrent class Basedata
    class Basedata {
        //attribute untuk menampung koneksi database yang digunakan sebagai pointer untuk melakukan running progam.
        protected $conn;
        protected $Xgen;

        // sebagai fungsi yang pertama kali dijalankan
        protected function __construct()
        {
            //instance dari koneksi database pada kelas Basecon
            $this->conn = new BaseCon();
            //Auto Query
            $this->Xgen = new autoquery();
        }

        // fungsi instane untuk konseksi yang sudah di validasi untuk koneksi database
        protected function verivied(){
            return $this->conn->getPdo();
        }
    }
