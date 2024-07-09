<?php
ob_start();
include 'db_baglan.php';
session_start();


$search_query = isset($_GET['query']) ? $_GET['query'] : '';


$sql = "SELECT id AS item_id, baslik AS title FROM konular WHERE baslik LIKE ?";
$stmt = $conn->prepare($sql);
$search_param = "%" . $search_query . "%";
$stmt->bind_param("s", $search_param);

$stmt->execute();
$result = $stmt->get_result();


$results = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
}
$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($results);
?>