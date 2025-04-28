<?php
session_start();

// Menyimpan pilihan tema dalam session
if (isset($_POST['theme'])) {
    $_SESSION['theme'] = $_POST['theme'];
}

// Kembali ke halaman sebelumnya setelah memilih tema
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
