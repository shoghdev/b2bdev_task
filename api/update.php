<?php
    require_once("../debugger.php");
    require_once('../uploads.php');
    require_once("../config/connection.php");

    $name = $_POST['customer_name'];
    $id = $_POST['current'];
   
   
    $sql = "UPDATE `customers` SET `name`='$name',`image`='$target_file' WHERE ID='{$id}'";
    $conn->query($sql);

    $sql = "SELECT * FROM `customers` WHERE ID='{$id}";
    //execute the query
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
            $new_id = $row['ID'];
            $new_name = $row['name'];
            $image = $row['image'];   
    echo $html = <<<HTML
    <div class="wrap bordered-container" id="$new_id">
                    <form class="container created-item" action="" method="POST" enctype="multipart/form-data" id="customer_$new_id">
                        <div>
                            <fieldset>
                                <label>
                                    <span>Name:</span>
                                </label>
                                <input type='text' value="$new_name" name='customer_name'>
                            </fieldset>
                            <fieldset>
                                <label for="image" class="flex column">
                                    <span>Image:</span>
                                    <img src="{$image}" alt="cutomer_image" class="cutomer_image">
                                </label>
                                <input type='file' name='image' class="image_file" id="img_$new_id" value="{$image}">
                            </fieldset>
                        </div>
                        <fieldset>
                            <div class="flex half-container m-auto j-cent">
                                <input class="hidden-button" type='hidden' value="{$new_id}" name='current'>
                                <input class="button delete-button" type="submit" data-value="{$new_id}" value="Delete" name="delete">
                                <div class="button edit-button"><span>Edit</span></div>
                                <input class="button save-button" type="submit" value="Save" name="save" data-val="{$new_id}">
                                <div class="button finish-button"> Finish </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <script src="./js/custom.js"></script>
    HTML;
    }