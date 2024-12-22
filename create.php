<?php
include_once 'Controller/MatkulController.php';
include_once 'Controller/SessionCookieController.php';

session_start(); // Memulai session di awal file
$session = new SessionCookieController();

// Cek cookie login status, jika tidak true kembali ke login.php
if ($session->getCookie('login_status') !== 'true') {
    header("Location: login.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'create') {
    $nama_matkul = $_POST['nama_matkul'];
    $waktu = $_POST['waktu'];
    $dosen = $_POST['dosen'];
    $ruang = $_POST['ruang'];
    $browser = $_SERVER['HTTP_USER_AGENT'];
    $ip = $_SERVER['REMOTE_ADDR'];

    if (empty($nama_matkul) || empty($waktu) || empty($dosen) || empty($ruang)) {
        echo "Semua data harus diisi!";
        exit();
    }

    if(strlen($nama_matkul)<5){
        echo "Nama Mata Kuliah minimal 5 karakter!";
        exit();
    }

    if(strlen($waktu)<5){
        echo "Waktu minimal 5 karakter!";
        exit();
    }

    if(strlen($ruang)<5){
        echo "Ruang minimal 4 karakter!";
        exit();
    }

    $matkul = new MatkulController();
    if ($matkul->create($nama_matkul, $waktu, $dosen, $ruang, $browser, $ip)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menambahkan mata kuliah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
    <link rel="stylesheet" href="Style/create.css">
    <script src="Script/CreateForm.js"></script>
</head>

<body>
    <form method="POST" onsubmit="return CreateForm.validateForm()">
        <h1>Tambah Mata Kuliah</h1>
        <label for="nama_matkul">Nama Mata Kuliah:</label>
        <input type="text" id="nama_matkul" name="nama_matkul"
        onfocus="CreateForm.handleFocus(this)" onblur="CreateForm.handleBlur(this)"
        ><br><br>

        <label for="waktu">Waktu:</label>
        <input type="text" id="waktu" name="waktu"
        onfocus="CreateForm.handleFocus(this)" onblur="CreateForm.handleBlur(this)"
        ><br><br>

        <label for="dosen">Nama Dosen Mata Kuliah:</label>
        <input type="text" id="dosen" name="dosen"
        onfocus="CreateForm.handleFocus(this)" onblur="CreateForm.handleBlur(this)"
        ><br><br>

        <label for="ruang">Ruang Mata Kuliah:</label>
        <input type="text" id="ruang" name="ruang"
        onfocus="CreateForm.handleFocus(this)" onblur="CreateForm.handleBlur(this)"
        ><br><br>

        <input type="hidden" name="action" value="create">

        <button type="submit">Tambah</button>
        <div id="error-messages" style="color: red;"></div> <!-- Menampilkan pesan error -->
    </form>
</body>

</html>