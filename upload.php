<?php
include 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_file = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    $deskripsi = $_POST['deskripsi'];

    // Menentukan folder tempat foto akan disimpan
    $folder = "uploads/";

    // Memindahkan file ke folder
    if (move_uploaded_file($tmp_name, $folder . $nama_file)) {
        // Menyimpan informasi foto ke database
        $sql = "INSERT INTO foto (nama_file, deskripsi) VALUES ('$nama_file', '$deskripsi')";

        if ($conn->query($sql) === TRUE) {
            echo "Foto berhasil diunggah!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Upload Foto</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="foto">Pilih Foto:</label>
        <input type="file" name="foto" required><br><br>
        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Unggah Foto">
    </form>
</body>
</html>
