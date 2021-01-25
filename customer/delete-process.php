<?php

    include_once 'connect.php';
    $result = mysqli_query($conn,"SELECT * FROM incident");


    $sql = "DELETE FROM incident WHERE number='" . $_GET['number'] . "'";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>