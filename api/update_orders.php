<?php
    require_once("../debugger.php");
    require_once('../uploads.php');
    require_once("../config/connection.php");

    $id = $_POST['current'];
    $product = $_POST['product'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    
    $sql = "UPDATE `orders` SET `name`='$name',`description`='$desc', `price`='$price', `image`, `image`='$target_file' WHERE ID='{$id}'";
    $conn->query($sql);

    $sql = "SELECT * FROM `orders` WHERE ID='{$id}";
    //execute the query
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
            $new_id = $row['ID'];
            $new_product = $row['product'];
            $new_des = $row['description'];
            $new_price = $row['price'];
            $image = $row['image'];   
    echo $html = <<<HTML
     <div class="wrap bordered-container created order_item" id="order_item_{$new_id}">
                    <form class="container created-item" action="" method="POST" enctype="multipart/form-data" id="order_{$new_id}">
                        <div>
                            <fieldset>
                                <label for="iname">
                                    <span>Product:</span>
                                </label>
                                <input type='text' value="{$image}" name='product'>
                            </fieldset>
                            <fieldset>
                                <label for="iname">
                                    <span>Description:</span>
                                </label>
                                <input type='text' value="{$new_des}" name='description'>
                            </fieldset>
                            <fieldset>
                                <label for="iname">
                                    <span>Price:</span>
                                </label>
                                <input type='text' value="{$new_price}" name='price'>
                            </fieldset>
                            <fieldset>
                                <label for="image" class="flex column">
                                    <span>Image:</span>
                                    <img src="{$new_image}" alt="cutomer_image" class="cutomer_image">
                                </label>
                                <input type='file' name='image' class="image_file" id="{$new_image}">
                            </fieldset>
                        </div>
                        <fieldset>
                            <div class="flex half-container m-auto j-cent">
                                <input class="hidden-button" type='hidden' value="{$new_id}" name='current_order'>
                                <input class="button delete-button delete-order" type="submit" data-val="{$new_id}" value="Delete" name="delete">
                                <div class="button edit-button"><span>Edit</span></div>
                                <input class="button save-button update-order" type="submit" value="Save" name="save" data-val="{$new_id}">
                                <div class="button finish-button"> Finish </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
    <script src="./js/custom.js"></script>
    HTML;
    }