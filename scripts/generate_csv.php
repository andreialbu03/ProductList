<?php

    include_once 'db.php';

    $sql = "select * from inventoryList";
    $result = $conn->query($sql);
    $data = array();

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=inventory.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('prod_id', 'quantity', 'name', 'description'));

    if (count($data) > 0) {
        foreach ($data as $row) {
            fputcsv($output, $row);
        }
    }

?>