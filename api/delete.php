<?php
    require_once("../debugger.php");
    require_once("../config/connection.php");

    //customers
    $id = $_POST['id'];
    $sql_sel = "SELECT * FROM `customers` WHERE ID={$id}";
    $result = $conn->query($sql_sel);
    $row = $result->fetch_assoc();
    $img_path = $row["image"];

    if ($img_path) {
        $sql_del = "DELETE FROM `customers` WHERE ID={$id}";
        $conn->query($sql_del);

        if ($result) {
            unlink(".".$img_path);
        }

        if($sql_del && $result) {
            echo "TRUE";
        }
    }
?>