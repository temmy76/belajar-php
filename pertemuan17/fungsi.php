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
        
        //upload gambar
        $gambar = upload();
        if (!$gambar){
            return false;
        }
    
        $query = "INSERT INTO mahasiswa
                VALUES 
                ('','$nama','$nim', '$email', '$jurusan', '$gambar')
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function upload (){
        
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpFile = $_FILES['gambar']['tmp_name'];

        // check apakah tidak ada gambar yang di kirim
        if ( $error === 4 ){
            echo "<script> 
                    alert('Pilih Gambar terlebih dahulu');
                </script>";
            return false;
        }

        // check apakah yang di upload adalah gambar 
        $extensiGambarValid =  ['jpg', 'jpeg', 'png'];
        $extensiGambar = explode('.', $namaFile);
        $extensiGambar = strtolower(end($extensiGambar));

        if( !in_array($extensiGambar, $extensiGambarValid)){
            echo "<script> 
                    alert('Yang anda upload bukan gambar');
                </script>";
            return false;
        }

        // check jika ukurannya terlalu besar
        if($ukuranFile > 1000000){
            echo "<script> 
                    alert('Ukuran Gambar terlalu besar');
                </script>";
            return false;
        }

        // lolos pengecheckan, gambar siap diuplaod
        // generate nama gambar baru
        $namaFilebaru = uniqid();
        $namaFilebaru .= ".";
        $namaFilebaru .= $extensiGambar;

        move_uploaded_file($tmpFile, 'img/' . $namaFilebaru);

        return $namaFilebaru;
    }

    function hapus ($id) {
        global $conn;
        $queryH = "DELETE FROM mahasiswa WHERE id = $id";
        mysqli_query($conn, $queryH);
        return mysqli_affected_rows($conn);
    }

    function ubah ($data){
        global $conn;

        $id = $data["id"];
        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        // check apakah user menginputkan gambar baru atau tidak
        if($_FILES['gambar']['error'] === 4){
            $gambar = $gambarLama;
        } else {
            $gambarLama = "img/$gambarLama";
            unlink($gambarLama);
            $gambar = upload();
        }
    
        $query = "UPDATE mahasiswa SET 
                    nim = '$nim',
                    nama = '$nama',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'
                  WHERE id = $id
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function cari ($keyword){
        $query = "SELECT * FROM mahasiswa 
                    WHERE
                  nama LIKE '%$keyword%' OR 
                  nim LIKE '%$keyword%' OR 
                  email  LIKE '%$keyword%' OR 
                  jurusan LIKE '%$keyword%'
                   ";
        return query($query);
    }

    function regsitrasi ($data){
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        // check username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)){
            echo "<script> 
                    alert('Username yang dimasukan sudah terdaftar');
                </script>";
            return false;
        }

        //check konfirmasi passowrd
        if($password !== $password2){
            echo "<script> 
                    alert('konfirmasi password tidak sesuai!!');
                </script>";
            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        // tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

        return mysqli_affected_rows($conn);
    }
?>