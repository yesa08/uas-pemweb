<?php
include_once 'Controller/SessionCookieController.php';

$session = new SessionCookieController();
$session->startSession(); // Memulai session di awal file

// Handle form submission for login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $katasandi = $_POST['katasandi'];

    if (empty($email) || empty($katasandi)) {
        echo "Semua data harus diisi!";
        exit();
    }

    if(strlen($email)<5){
        echo "Email minimal 5 karakter!";
        exit();
    }

    if(strlen($katasandi)<5){
        echo "Katasandi minimal 5 karakter!";
        exit();
    }

    // Cek email katasandi
    if ($email === 'yesaviola@gmail.com' && $katasandi === 'yesaviola') {
        // Sukses set cookie
        $session->setCookie('login_status', 'true', time() + 3600);
        header("Location: index.php");
        exit();
    } else {
        // Gagal set session
        $session->setSession('login_failed', 'Email atau kata sandi salah.');
        header("Location: login.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Style/login.css">
    <script src="Script/LoginForm.js"></script>
</head>

<body>
    <form method="POST" onsubmit="return LoginForm.validateForm()">
        <h1>Login</h1>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email"
        onfocus="LoginForm.handleFocus(this)" onblur="LoginForm.handleBlur(this)"
        ><br><br>

        <label for="katasandi">Katasandi:</label>
        <input type="password" id="katasandi" name="katasandi"
        onfocus="LoginForm.handleFocus(this)" onblur="LoginForm.handleBlur(this)"
        ><br><br>

        <input type="hidden" name="action" value="create">
        <button type="submit">Login</button>
        <?php
        // Menampilkan pesan jika ada session 'login_failed'
        $session = new SessionCookieController();
        if ($session->getSession('login_failed')) {
            echo "<p style='color: red'>" . $session->getSession('login_failed') . "</p>";
            $session->destroySession(); // Menghapus pesan setelah ditampilkan
        }
        ?>
        <div id="error-messages" style="color: red;"></div> <!-- Menampilkan pesan error -->
    </form>
</body>

</html>