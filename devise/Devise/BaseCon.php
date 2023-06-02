<?php

//psr-4 autoloading dengan namespace
namespace xel\framework\Devise;
require_once __DIR__."/../../vendor/autoload.php";

//library untuk mengaktifkan variable global $_env untuk menampung data yang sudah di definisikan pada file .env
use Dotenv\Dotenv;

//library PDO mysql berserta beberapa tools perlengkapan lainnya
use PDO;
use PDOException;

//class koneksi database dengan pdo
class BaseCon {
    //attirbute koneksi pdo
    private $pdo;

    public function __construct()
    {

        $dotenv = Dotenv::createImmutable(__DIR__.'/../..');
        $dotenv->load();
        
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $database = $_ENV['DB_DATABASE'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        try {
            $this->pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error connecting to database: " . $e->getMessage();
        }
        

    }

    //testing 
    public function getPdo(){
        return $this->pdo;
    }

}


