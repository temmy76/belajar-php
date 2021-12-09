<?php 
    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    function query ($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];

        while ( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data){ // dari post
        global $conn;

        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);
    
        $query = "INSERT INTO mahasiswa
                VALUES 
                ('','$nama','$nim', '$email', '$jurusan', '$gambar')
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function hapus ($id) {
        global $conn;
        $queryH = "DELETE FROM mahasiswa WHERE id = $id";
        mysqli_query($conn, $queryH);
        return mysqli_affected_rows($conn);
    }


?>