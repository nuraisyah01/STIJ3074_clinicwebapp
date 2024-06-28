<?php
include 'dbconnect.php';

$query = $conn->query("SELECT service_id, service_name, service_description, service_price, service_fulldesc FROM tbl_services");
$services = $query->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($services);
?>
