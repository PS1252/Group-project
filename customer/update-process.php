<?php

include_once 'connect.php';


if(isset($_POST['update']))
{

    mysqli_query($conn,"UPDATE incident set description='" . $_POST['message'] ."'  where number= '" .$_POST['no']."' ");
    $message = "Record Modified Successfully";
    }
		mysqli_close($conn);
?>
