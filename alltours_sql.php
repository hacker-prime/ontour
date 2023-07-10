<?php


// https://phpdelusions.net/mysqli_examples/prepared_select
$sql = "SELECT * FROM tours";
$stmt = $con->prepare($sql); 
$stmt->execute();
$result = $stmt->get_result();
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// var_dump($data);



?>