<?php
    $connection = mysqli_connect("localhost", "root", "", "project");

    @session_start();
    if ($_SESSION["NAME"] == "")
    {
        header("location: index.php");
    }
?>