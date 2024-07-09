<?php
session_start(); 

include "db_baglan.php";

$kullanici_adi = $_POST['kullanici_adi'];
$sifre = $_POST['sifre'];

$sql = "SELECT * FROM kullanicilar WHERE kullanici_adi=?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Hazırlık hatası: " . $conn->error);
}

$stmt->bind_param("s", $kullanici_adi);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($sifre, $user['sifre'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['kullanici_adi'] = $user['kullanici_adi'];
        $_SESSION['soyad'] = $user['soyad'];
        $_SESSION['ad'] = $user['ad'];
        $_SESSION['dogum_tarihi'] = $user['dogum_tarihi'];

       
        
        header("Location: odev.php");

        exit();
    } else {
        echo '<script>alert("Şifreniz Hatalı");</script>';
        exit();
    }
} else {
   
    header("Location: odev.php");
    exit();
}

$stmt->close();
$conn->close();
?>

