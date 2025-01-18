<?php
include '../../config/koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  
    $subject = $_POST["subject"];
    $pertanyaan = $_POST["pertanyaan"];
    $id_pasien = $_SESSION['id'];
    $id_dokter = $_POST['id_dokter'];

    $query = "INSERT INTO konsultasi (subject,pertanyaan,id_pasien,id_dokter) VALUES ('$subject', '$pertanyaan','$id_pasien','$id_dokter')";
    if (mysqli_query($mysqli, $query)) {
        // Jika berhasil, redirect kembali ke halaman utama atau sesuaikan dengan kebutuhan Anda
        // header("Location: ../../index.php");
        // exit();
        echo '<script>';
        echo 'alert("Jadwal berhasil ditambahkan!");';
        echo 'window.location.href = "../../jadwalPeriksa.php";';
        echo '</script>';
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
    
}

// Tutup koneksi
mysqli_close($mysqli);
?>