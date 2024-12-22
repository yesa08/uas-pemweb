<?php
include_once 'Controller/MatkulController.php';
include_once 'Controller/SessionCookieController.php';

$session = new SessionCookieController();

$session->startSession(); // Memulai session di awal file

// Cek cookie login status, jika tidak true kembali ke login.php
if ($session->getCookie('login_status') !== 'true') {
    header("Location: login.php");
}

// Menangani aksi delete
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $matkul = new MatkulController();
    if ($matkul->delete($id)) {
        // Set pesan sukses ke session
        $session->setSession('success', 'Mata kuliah berhasil dihapus.');
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus mata kuliah!";
    }
}

// Menangani aksi logout
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'logout') {
    $session->deleteCookie('login_status');
    header("Location: login.php");
    exit();
}

// Mengambil data mata kuliah
$matkul = new MatkulController();
$listMatkul = $matkul->read();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>
    <link rel="stylesheet" href="Style/index.css">
</head>

<body>
    <h1>Data Mata Kuliah</h1>

    <?php
    // Menampilkan pesan jika ada session 'success'
    $session = new SessionCookieController();
    if ($session->getSession('success')) {
        echo "<p>" . $_SESSION['success'] . "</p>";
        $session->destroySession(); // Menghapus pesan setelah ditampilkan
    }
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>Nama Mata Kuliah</th>
                <th>Waktu</th>
                <th>Dosen</th>
                <th>Ruang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listMatkul as $matkul): ?>
                <tr>
                    <td>
                        <?php echo ($matkul['nama']); ?>
                    </td>
                    <td>
                        <?php echo ($matkul['waktu']); ?>
                    </td>
                    <td>
                        <?php echo ($matkul['dosen']); ?>
                    </td>
                    <td>
                        <?php echo ($matkul['ruang']); ?>
                    </td>
                    <td>
                        <a href="update.php?id=<?php echo $matkul['id']; ?>">Ubah</a> |
                        <a href="?action=delete&id=<?php echo $matkul['id']; ?>"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a class="tombol" href="create.php">Tambah Mata Kuliah</a>
    <form method="POST">
        <input type="hidden" name="action" value="logout">
        <button class="tombol_logout" type="submit">Logout</button>
    </form>
</body>

</html>