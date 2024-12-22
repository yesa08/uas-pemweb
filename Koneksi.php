<?php
// Koneksi ke database menggunakan OOP
class Koneksi {
    private $host = "localhost"; // Host database
    private $user = "root"; // Username database
    private $password = ""; // Password database
    private $dbname = "uas_yola"; // Nama database

    private $conn;

    // Fungsi untuk membuka koneksi
    public function __construct() {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->dbname
        );

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

}
?>
