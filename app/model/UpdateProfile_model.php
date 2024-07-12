<?php 

class UpdateProfile_model {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function update_user($data ,$id, $fotoLama){
        $query = 'UPDATE users_profile SET nama = :nama, foto = :foto, banner = :banner, deskripsi = :deskripsi WHERE id = :id';
        $nama = htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8');
        $banner = htmlspecialchars($data['banner'], ENT_QUOTES, 'UTF-8');
        $deskripsi = htmlspecialchars($data['deskripsi'], ENT_QUOTES, 'UTF-8');


        if ($_FILES['gambar']['name']) {
            $fotoBaru = $this->upload_gambar($_FILES);
            $fotoSekarang = $fotoBaru;
            if ($fotoLama != 'user.png'){
                unlink($_SERVER['DOCUMENT_ROOT'] . '/aplikasi-image/public/img/' . $fotoLama);
            }
        }else {
            $fotoSekarang = $fotoLama;
        }
        $this->db->query($query);
        $this->db->bind(':nama', $nama);
        $this->db->bind(':banner', $banner);
        $this->db->bind(':foto', $fotoSekarang);
        $this->db->bind(':deskripsi', $deskripsi);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return true;
    }

    public function upload_gambar($gambar){
        $namaGambar = $gambar['gambar']['name'];
        $ukuranGambar = $gambar['gambar']['size'];
        $errorGambar = $gambar['gambar']['error'];
        $tmpGambar = $gambar['gambar']['tmp_name'];

        if ($errorGambar == 4) {
            echo "<script>alert('Pilih gambar terlebih dahulu');</script>";
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $pisahkanEkstensi = explode('.', $namaGambar);
        $validasiGambar = strtolower(end($pisahkanEkstensi));

        if (!in_array($validasiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('File yang diupload bukan gambar (jpg/jpeg/png)');</script>";
            return false;
        }

        if ($ukuranGambar > 1000000) {
            echo "<script>alert('Ukuran gambar terlalu besar (maksimum 1MB)');</script>";
            return false;
        }

        $namaGambarBaru = uniqid() . '.' . $validasiGambar;
        move_uploaded_file($tmpGambar, $_SERVER['DOCUMENT_ROOT'] . '/aplikasi-image/public/img/' . $namaGambarBaru);

        return $namaGambarBaru;
    }
}