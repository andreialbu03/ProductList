<?php

    // database connection start
    $username = "root";
    $password = "BEdrJMM5qhPK9wiD";
    $dbName="inventory";
    $dbHost = "34.130.124.228";

    $conn = mysqli_connect($dbHost, $username, $password, $dbName);

    // check connection
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
?>