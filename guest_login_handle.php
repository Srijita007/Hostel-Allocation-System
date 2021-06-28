<?php
    $connection = mysqli_connect("localhost", "root", "", "project");

    if (isset($_REQUEST["login"]))
    {
        $query = "SELECT * FROM students WHERE Email = '".$_REQUEST["email"]."';";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        $fetch = mysqli_fetch_object($result);
        if ($count > 0)
        {
            @session_start();
            $_SESSION["NAME"] = $fetch->Name;
            $_SESSION["Email"] = $fetch->Email;
            $_SESSION["A_ID"] = $fetch->S_id;
            $_SESSION["ROOM"] = $fetch->Room_no;
            header("location: student_detail.php");
        }
        else 
        {
            header("location: guest_login.php");
        }
    }
    if (isset($_REQUEST["logout"]))
    {
        @session_start();
        @session_destroy();
        header("location: index.php");
    }
?>