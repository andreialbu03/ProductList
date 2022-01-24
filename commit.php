<?php

    include_once 'db.php';

    $operation = $_POST['operation'];
    $prod_id = $_POST['prod_id'];
    $quantity = $_POST['quantity'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    switch ($operation) {
        // Delete operation
        case 1:
            $sql = "Delete from inventoryList where prod_id = '$prod_id';";
            $conn->query($sql);
            echo $operation;
            break;

        // Insert operation
        case 2:
            $sql = "Insert into inventoryList (quantity, name, description) values ($quantity, '$name', '$description');";
            $conn->query($sql);
            echo $operation;
            break;

        // edit/update operation
        case 3:
            $sql = "Update inventoryList Set quantity = $quantity, name = '$name', description = '$description' where prod_id = '$prod_id';";
            $conn->query($sql);
            echo $operation;
            break;
    }
    
    header("Location: index.php?commit=success");

?>