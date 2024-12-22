<?php
include_once 'Koneksi.php';

class MatkulController {
    private $conn;
    private $table = 'matkul';

    // Konstruktor untuk menginisialisasi koneksi database
    public function __construct() {
        $this->conn = (new Koneksi())->getConnection();
    }

    // Fungsi untuk membuat mata kuliah baru (Create)
    public function create($nama_matkul, $waktu, $dosen, $ruang, $browser, $ip) {
        $sql = "INSERT INTO $this->table (nama, waktu, dosen, ruang, browser, ip) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssssss", $nama_matkul, $waktu, $dosen, $ruang, $browser, $ip);
            return $stmt->execute();
        }
        return false;
    }

    // Fungsi untuk mengambil semua data mata kuliah (Read)
    public function read() {
        $sql = "SELECT * FROM $this->table";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fungsi untuk mengambil satu mata kuliah berdasarkan ID (Read - by ID)
    public function readById($id) {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }
        return null;
    }

    // Fungsi untuk mengupdate data mata kuliah (Update)
    public function update($id, $nama_matkul, $waktu, $dosen, $ruang, $browser, $ip) {
        $sql = "UPDATE $this->table SET nama = ?, waktu = ?, dosen = ?, ruang = ?, browser = ?, ip = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssssssi", $nama_matkul, $waktu, $dosen, $ruang, $browser, $ip, $id);
            return $stmt->execute();
        }
        return false;
    }

    // Fungsi untuk menghapus data mata kuliah (Delete)
    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        }
        return false;
    }
}
?>
