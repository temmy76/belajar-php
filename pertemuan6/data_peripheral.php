<?php
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
    <title>My Peripheral</title>
</head>
<body>
    <h1>History Data Peripheral Temmy</h1>
    <?php foreach ($peripheral as $phr  ) :?>
    <ul>
            <li><?= $phr["Laptop"] ?></li>
            <li><?= $phr["Mouse"] ?></li>
            <li><?= $phr["Headset"] ?></li>
            <li><?= $phr["Keyboard"] ?></li>
            <li><?= $phr["Mic"] ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>