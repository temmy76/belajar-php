<?php
// super global
// $_GET["nama"] = "Temmy Mahesa Ridwan";
// $_GET["NIM"] = "201524062";

$peripheral = [
    [
        "Laptop" => "Acer TEUING NAON",
        "Mouse" => "NYC Y12K",
        "Headset" => "Headset Conter",
        "Keyboard" => "Keyboard Laptop",
        "Mic" => "Mic Laptop/Headset"
    ],
    [
        "Laptop" => "aSUS X441U",
        "Mouse" => "PANTEK THOR II X16",
        "Headset" => "KZ EDX murmer",
        "Keyboard" => "DA K1 RGB Gaming Keyboard",
        "Mic" => "Mic Laptop/Headset"
    ]
];
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
    <h1>Daftar Peripheral</h1>
    <ul>
    <?php foreach ($peripheral as $phr) :?>
        <li>
            <a href="latihan2.php?laptop=<?= $phr["Laptop"]?>&mouse=<?= $phr["Mouse"] ?>&headset=<?= $phr["Headset"]?>&keyboard=<?= $phr["Keyboard"]?>&mic=<?= $phr["Mic"]?> "><?= $phr["Laptop"]?></a>
        </li>
    <?php endforeach; ?> 
    </ul>

    
</body>
</html>