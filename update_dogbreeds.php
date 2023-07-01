<?php
require("koneksi_dogbreeds.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $id = $_POST["id"];
   $nama = $_POST["nama"];
   $foto = $_POST["foto"];
   $ukuran = $_POST["ukuran"];
   $deskripsi = $_POST["deskripsi"];
   
   $perintah = "UPDATE tbl_dogbreeds SET nama = '$nama', foto='$foto', ukuran = '$ukuran', deskripsi = '$deskripsi' 
    WHERE id = '$id'";
   $eksekusi = mysqli_query($connect, $perintah);
   $cek = mysqli_affected_rows($connect);
   
   if($cek > 0 ){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Mengubah Data";
   }else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada Kesalahan. Gagal Mengubah Data";
   }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}

echo json_encode ($response);
mysqli_close($connect);