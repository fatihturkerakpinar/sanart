<?php
session_start();
include("db_baglan.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $konu_id = intval($_POST['konu_id']);

   
    $sql = "DELETE FROM konular WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $konu_id);
    if ($stmt->execute()) {
        echo "Konu başarıyla silindi.";
    } else {
        echo "Konu silinirken bir hata oluştu: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
header("Location: admin-konular.php");
    exit();
?>