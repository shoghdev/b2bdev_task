<?php
require_once("../debugger.php");
require_once('../uploads.php');
require_once('../config/connection.php');
//### add new order data to database

$product = $_POST['product'];
$desc = $_POST['desc'];
$price = $_POST['price'];

if ($product !== "") {
    $sql = "INSERT INTO  `orders` (`name`, `description`, `price`, `image`) VALUES ('$product','$desc', '$price', '$target_file')";
}

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo $html = <<<HTML
    <div class="wrap bordered-container" id="$last_id">
                    <form class="container created-item" action="" method="POST" enctype="multipart/form-data" id="customer_$last_id">
                    <div>
                            <fieldset>
                                <label for="iname">
                                    <span>Product:</span>
                                </label>
                                <input type='text' value="{$product}" name='product'>
                            </fieldset>
                            <fieldset>
                                <label for="iname">
                                    <span>Description:</span>
                                </label>
                                <input type='text' value="{$desc}" name='description'>
                            </fieldset>
                            <fieldset>
                                <label for="iname">
                                    <span>Price:</span>
                                </label>
                                <input type='text' value="{$price}" name='price'>
                            </fieldset>
                            <fieldset>
                                <label for="image" class="flex column">
                                    <span>Image:</span>
                                    <img src="{$target_file}" alt="cutomer_image" class="cutomer_image">
                                </label>
                                <input type='file' name='image' class="image_file" id="img_$last_id">
                            </fieldset>
                        </div>
                        <fieldset>
                            <div class="flex half-container m-auto j-cent">
                                <input class="hidden-button" type='hidden' value="{$last_id}" name='current'>
                                <input class="button delete-button delete-order" type="submit" data-val="{$last_id}" value="Delete" name="delete">
                                <div class="button edit-button"><span>Edit</span></div>
                                <input class="button save-button none update-order" type="submit" value="Save" name="save" data-val="{$last_id}">
                                <div class="button cancel-button none"> Cancel </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <script src="./js/custom.js"></script>
    HTML;
}  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
