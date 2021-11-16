<?php
// check apakah data ada tau tidak ada
if(!isset($_GET["laptop"]) ||
    !isset($_GET["mouse"]) ||
    !isset($_GET["headset"]) ||
    !isset($_GET["keyboard"]) ||
    !isset($_GET["mic"])){
    // redirect 
    header("Location: latihan1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peripheral</title>
</head>
<body>
    <h1>Detail Peripheral</h1>
    <ul>
        <li><?= $_GET["laptop"]?></li>
        <li><?= $_GET["mouse"]?></li>
        <li><?= $_GET["headset"]?></li>
        <li><?= $_GET["keyboard"]?></li>
        <li><?= $_GET["mic"]?></li>
    </ul>

    <a href="latihan1.php">Kembali ke halaman sebelumnya</a>
</body>
</html>