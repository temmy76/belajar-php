<?php 
    require 'fungsi.php';

    $id = $_GET["id"];

    if (hapus($id) > 0){
        echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    }else {
        echo "
        <script>
            alert('Data gagal ditambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    }

?>