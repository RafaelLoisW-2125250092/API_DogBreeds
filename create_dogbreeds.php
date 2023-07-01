<?php
require("koneksi_dogbreeds.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $nama = $_POST["nama"];
   $foto = $_POST["foto"];
   $ukuran = $_POST["ukuran"];
   $deskripsi = $_POST["deskripsi"];
   
   $perintah = "INSERT INTO tbl_dogbreeds(nama, foto, ukuran, deskripsi) VALUES('$nama', '$foto', '$ukuran', '$deskripsi')";
   $eksekusi = mysqli_query($connect, $perintah);
   $cek = mysqli_affected_rows($connect);
   
   if($cek > 0 ){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menyimpan Data";
   }else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada Kesalahan. Gagal Menyimpan Data";
   }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}

echo json_encode ($response);
mysqli_close($connect);