<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto</title>
    <link rel="stylesheet" href="css/style.css">
    <?php
    session_start();
    // Cek jika session tema sudah ada dan terapkan tema tersebut
    if (isset($_SESSION['theme']) && $_SESSION['theme'] == 'dark') {
        echo '<link rel="stylesheet" href="css/dark-theme.css">';
    } else {
        echo '<link rel="stylesheet" href="css/light-theme.css">';
    }
    ?>
</head>
<body>
    <h2>Selamat Datang di Galeri Foto!</h2>

    <!-- Form untuk memilih tema -->
    <form method="POST" action="set-theme.php">
        <label for="theme">Pilih Tema: </label>
        <select name="theme" id="theme">
            <option value="light" <?php if (isset($_SESSION['theme']) && $_SESSION['theme'] == 'light') echo 'selected'; ?>>Terang</option>
            <option value="dark" <?php if (isset($_SESSION['theme']) && $_SESSION['theme'] == 'dark') echo 'selected'; ?>>Gelap</option>
        </select>
        <button type="submit">Terapkan</button>
    </form>

    <a href="upload.php">Unggah Foto</a> | <a href="galeri.php">Lihat Galeri</a>
</body>
</html>
