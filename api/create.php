<?php
require_once("../debugger.php");
require_once('../uploads.php');
require_once('../config/connection.php');

//### add new customer data to database
$name =$_POST['name'];

if ($name !== "") {
    $sql = "INSERT INTO  `customers` (`name`, `image`) VALUES ('$name', '$target_file')";
} 


if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo $html = <<<HTML
    <div class="wrap bordered-container" id="$last_id">
                    <form class="container created-item" action="" method="POST" enctype="multipart/form-data" id="customer_$last_id">
                        <div>
                            <fieldset>
                                <label>
                                    <span>Name:</span>
                                </label>
                                <input type='text' value="$name" name='customer_name'>
                            </fieldset>
                            <fieldset>
                                <label for="image" class="flex column">
                                    <span>Image:</span>
                                    <img src="{$target_file}" alt="cutomer_image" class="cutomer_image">
                                </label>
                                <input type='file' name='image' class="image_file" id="img_$last_id" value="{$target_file}">
                            </fieldset>
                        </div>
                        <fieldset>
                            <div class="flex half-container m-auto j-cent">
                                <input class="hidden-button" type='hidden' value="{$last_id}" name='current'>
                                <input class="button delete-button" type="submit" data-value="{$last_id}" value="Delete" name="delete">
                                <div class="button edit-button"><span>Edit</span></div>
                                <input class="button save-button" type="submit" value="Save" name="save" data-val="{$last_id}">
                                <div class="button finish-button"> Finish </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <script src="./js/custom.js"></script>
    HTML;
}  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
