<?php
    include "koneksi.php";
    include "uploadFotoKategori.php";
    $id = $_POST["tid"];
    $nama_kategori = $_POST["tnama_kategori"];
    $keterangan = $_POST["tketerangan"];

    if (upload_foto($_FILES["foto"])) {
        $foto = $_FILES["foto"]["name"];
        $sql = "INSERT INTO tbkategori (id,nama_kategori,keterangan,foto) VALUES ('$id', '$nama_kategori', '$keterangan', '$foto')";
        if ($conn -> query($sql) === TRUE) {
            $conn -> close();
            header("location:listKategori.php");
        }
        else {
            $conn -> close();
            echo "New records failed";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
?>