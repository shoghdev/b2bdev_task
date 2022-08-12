<?php
    require_once("../debugger.php");
    require_once("../config/connection.php");

    //orders
    $sql_sel = "SELECT * FROM `orders` WHERE ID={$_POST['id']}";
    $result = $conn->query($sql_sel);
    $row = $result->fetch_assoc();
    $img_path = $row["image"];

    if ($img_path) {
        $sql_del = "DELETE FROM `orders` WHERE ID={$_POST['id']}";
        $conn->query($sql_del);

        if ($result) {
            unlink(".".$img_path);
        }

        if($sql_del && $result) {
            echo "TRUE";
        }
    }
?>