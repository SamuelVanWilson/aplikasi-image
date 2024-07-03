<?php
$db = mysqli_connect("localhost", "root", "", "ujian_aplikasi");

function query($query){
    global $db;
    $result = mysqli_query($db, $query);

    return $result;
}

function tampilkan($query){
    global $db;
    $result = query($query);
    $dataSemua = [];

    while ($data = mysqli_fetch_assoc($result)) {
        $dataSemua[] = $data;
    }
    return $dataSemua;
}

function searchBar($key){
    return tampilkan("SELECT * FROM informasi WHERE keyword LIKE '%$key%' ");
}

function daftar($data){
    global $db;
    $username = htmlspecialchars(trim($data["username"]));
    $email = htmlspecialchars(trim($data["email"]));
    $password = $data["pass"];
    $confirmPass = $data["konfirmPass"];
    $periksaUsername = tampilkan("SELECT username FROM data_user WHERE username = '$username'");
    $periksaEmail = tampilkan("SELECT email FROM data_user WHERE email = '$email'");

    if (empty($username) || empty($email) || empty($password)) {
        echo '
        <script>
            alert("Belom ada yang di isi, periksa kembali!")
        </script>
        ';
        return false;
    }

    if ($periksaEmail) {
        echo '
        <script>
            alert("Email ini sudah terdaftar")
        </script>
        ';
        return false;
    }

    if ($periksaUsername) {
        echo '
        <script>
            alert("Nama user sudah digunakan, silahkan cari yang lain")
        </script>
        ';
        return false;
    }

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        echo '
        <script>
            alert("Email tidak valid, periksa kembali!")
        </script>
        ';
        return false;
    }

    if ($password !== $confirmPass) {
        echo '
        <script>
            alert("Password belum cocok, perikas kembali")
        </script>
        ';
        return false;
    }

    $password = password_hash($data["pass"], PASSWORD_DEFAULT);
    $query = query("INSERT INTO data_user VALUES ('', '$username', '$email', '$password', 'default.png')");
    return true;
}

function login($data){
    global $db;
    $email = htmlspecialchars(trim($data["email"]));
    $password = $data["pass"];
    
    $cekData = tampilkan("SELECT * FROM data_user WHERE email = '$email'");
    $cekID = $cekData[0]['id'];

    $_SESSION['id'] = $cekID;

    if (!$cekData) {
        echo '
        <script>
            alert("Email tidak ditemukan")
        </script>
        ';
        return false;
    }
    if(!password_verify($password, $cekData[0]["password"])){
        echo '
        <script>
            alert("Password salah")
        </script>
        ';
        return false;
    }

    return true;
}

function remember($data){
    session_start();
    $email = htmlspecialchars(trim($data["email"]));
    
    $cekData = tampilkan("SELECT * FROM data_user WHERE email = '$email'");
    $cekID = $cekData[0]['id'];
    $cekPASS = $cekData[0]['password'];

    $_SESSION['id'] = $cekID;


    setcookie("id", $cekID, time() + 3600 * 24 * 7);
    setcookie("key", hash("sha256", $cekPASS), time() + 3600 * 24 * 7);

    if ($_SESSION["id"] && $_SESSION["key"]) {
        $key = $_SESSION["key"];

        if ($key == hash("sha256", $cekPASS)) {
            return true;
        }
    }
}

function ubahData($data) {
    global $db;
    $idUser = $_SESSION['id'];
    $dataUser = tampilkan("SELECT * FROM data_user WHERE id = $idUser");

    $namaBaru = htmlspecialchars(trim($data["nama"]));
    $namaLama = $dataUser[0]['username'];
    $gambarLama = $dataUser[0]['gambar'];

    if ($_FILES['gambar']['name']) {
        $gambar = uploadGambar();
        if ($gambarLama != 'default.png') {
            unlink('img/' . $gambarLama);
        }
    } else {
        $gambar = $gambarLama;
    }



    $result = query("UPDATE data_user SET username = '$namaBaru', gambar = '$gambar' WHERE id = '$idUser' ");
    $ubahAuthorPostingan = query("UPDATE informasi SET author = '$namaBaru' WHERE author = '$namaLama' ");

    return $result;
}

function uploadGambar() {
    $namaGambar = $_FILES['gambar']['name'];
    $ukuranGambar = $_FILES['gambar']['size'];
    $errGambar = $_FILES['gambar']['error'];
    $tmpGambar = $_FILES['gambar']['tmp_name'];

    if ($errGambar == 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu');</script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $explodeGambar = explode('.', $namaGambar);
    $validasiGambar = strtolower(end($explodeGambar));

    if (!in_array($validasiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('File yang diupload bukan gambar (jpg/jpeg/png)');</script>";
        return false;
    }

    if ($ukuranGambar > 1000000) {
        echo "<script>alert('Ukuran gambar terlalu besar (maksimum 1MB)');</script>";
        return false;
    }

    $namaGambarBaru = uniqid() . '.' . $validasiGambar;
    move_uploaded_file($tmpGambar, 'img/' . $namaGambarBaru);

    return $namaGambarBaru;
}

function tambahPostingan($data) {
    global $db;
    $idUser = $_SESSION['id'];
    $dataUser = tampilkan("SELECT * FROM data_user WHERE id = '$idUser'");
    $username = $dataUser[0]['username'];

    $caption = htmlspecialchars(trim($data['deskripsi']));
    $keyword = htmlspecialchars(trim($data['keyword']));
    $gambar = uploadGambar();
    
    if (empty($caption)) {
        echo "<script>alert('Caption Tidak Boleh Kosong');</script>";
        return false;
    }

    if (empty($keyword)) {
        echo "<script>alert('Gunakan keyword sebagai algoritma web kami');</script>";
        return false;
    }

    $query = query("INSERT INTO informasi (gambar, deskripsi, keyword, author) VALUES ('$gambar', '$caption', '$keyword', '$username')");
    return $query;
}
?>