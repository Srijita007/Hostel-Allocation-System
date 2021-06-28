<?php
    $connection = mysqli_connect("localhost", "root", "", "project");

    if (isset($_REQUEST["login"]))
    {
        $query = "SELECT * FROM Admin WHERE Email = '".$_REQUEST["email"]."' AND Password = '".$_REQUEST["password"]."' AND Status = 'Available';";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        $fetch = mysqli_fetch_object($result);
        if ($count > 0)
        {
            @session_start();
            $_SESSION["NAME"] = $fetch->Name;
            $_SESSION["Email"] = $fetch->Email;
            $_SESSION["A_ID"] = $fetch->ID;
            header("location: admin.php");
        }
        else 
        {
            header("location: login.php");
        }
    }
    if (isset($_REQUEST["logout"]))
    {
        @session_start();
        @session_destroy();
        header("location: index.php");
    }
?>