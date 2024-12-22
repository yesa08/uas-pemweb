<?php
include_once 'Controller/MatkulController.php';
include_once 'Controller/SessionCookieController.php';

$session = new SessionCookieController();

$session->startSession(); // Memulai session di awal file

// Cek cookie login status, jika tidak true kembali ke login.php
if($session->getCookie('login_status') !== 'true') {
    header("Location: login.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'];
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
    if ($matkul->update($id, $nama_matkul, $waktu, $dosen, $ruang, $browser, $ip)) {
        // Redirect ke index.php setelah berhasil mengubah data
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal mengubah mata kuliah!";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $matkul = new MatkulController();
    $matkulData = $matkul->readById($id);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Mata Kuliah</title>
    <link rel="stylesheet" href="Style/update.css">
    <script src="Script/UpdateForm.js"></script>
</head>

<body>
    <form method="POST" onsubmit="return UpdateForm.validateForm()">
        <h1>Ubah Mata Kuliah</h1>
        <input type="hidden" name="id" value="<?php echo isset($matkulData['id']) ? $matkulData['id'] : ''; ?>"
        onfocus="UpdateForm.handleFocus(this)" onblur="UpdateForm.handleBlur(this)"
        >
        
        <label for="nama_matkul">Nama Mata Kuliah:</label>
        <input type="text" id="nama_matkul" name="nama_matkul"
        value="<?php echo isset($matkulData['nama']) ? $matkulData['nama'] : ''; ?>"
        onfocus="UpdateForm.handleFocus(this)" onblur="UpdateForm.handleBlur(this)"
        ><br><br>
        
        <label for="waktu">Waktu:</label>
        <input type="text" id="waktu" name="waktu"
        value="<?php echo isset($matkulData['waktu']) ? $matkulData['waktu'] : ''; ?>"
        onfocus="UpdateForm.handleFocus(this)" onblur="UpdateForm.handleBlur(this)"
        ><br><br>

        <label for="dosen">Nama Dosen Mata Kuliah:</label>
        <input type="text" id="dosen" name="dosen"
        value="<?php echo isset($matkulData['dosen']) ? $matkulData['dosen'] : ''; ?>"
        onfocus="UpdateForm.handleFocus(this)" onblur="UpdateForm.handleBlur(this)"
        ><br><br>

        <label for="ruang">Ruang Mata Kuliah:</label>
        <input type="text" id="ruang" name="ruang"
        value="<?php echo isset($matkulData['ruang']) ? $matkulData['ruang'] : ''; ?>"
        onfocus="UpdateForm.handleFocus(this)" onblur="UpdateForm.handleBlur(this)"
        ><br><br>
        
        <input type="hidden" name="action" value="update">
        <button type="submit">Ubah</button>
        <div id="error-messages" style="color: red;"></div> <!-- Menampilkan pesan error -->
    </form>
</body>

</html>