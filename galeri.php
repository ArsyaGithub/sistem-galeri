<?php
include 'includes/config.php';

$sql = "SELECT * FROM foto ORDER BY tanggal_upload DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h2>Galeri Foto</h2>

    <div class="card-container">
        <?php
        if ($result->num_rows > 0) {
            // Menampilkan setiap foto dalam bentuk card
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<img src='uploads/" . $row['nama_file'] . "' alt='Foto'>";
                echo "<p>" . htmlspecialchars($row['deskripsi']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Tidak ada foto yang diunggah.</p>";
        }
        ?>

    </div>

</body>
</html>

<?php
$conn->close();
?>
