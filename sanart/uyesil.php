<?php
session_start();
include("db_baglan.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $userId = $_POST['user_id'];

   
    $sql = "DELETE FROM kullanicilar WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        echo "Kullanıcı başarıyla silindi.";
    } else {
        echo "Hata: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
    
    
    header("Location: admin-anasayfa.php");
    exit();
}
?>