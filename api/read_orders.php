<?php
require_once('./debugger.php');
require_once './config/connection.php';
//### READ ORDERS DATA
    $sql = "SELECT * FROM `orders`";
    //execute the query
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {?>    
                <div class="wrap bordered-container created order_item" id="order_item_<?= $row['ID']; ?>">
                    <form class="container created-item" action="" method="POST" enctype="multipart/form-data" id="order_<?= $row['ID']; ?>">
                        <div>
                            <fieldset>
                                <label for="iname">
                                    <span>Product:</span>
                                </label>
                                <input type='text' value="<?= $row['name']; ?>" name='product'>
                            </fieldset>
                            <fieldset>
                                <label for="iname">
                                    <span>Description:</span>
                                </label>
                                <input type='text' value="<?= $row['description']; ?>" name='description'>
                            </fieldset>
                            <fieldset>
                                <label for="iname">
                                    <span>Price:</span>
                                </label>
                                <input type='text' value="<?= $row['price']; ?>" name='price'>
                            </fieldset>
                            <fieldset>
                                <label for="image" class="flex column">
                                    <span>Image:</span>
                                    <img src="<?= $row['image']; ?>" alt="cutomer_image" class="cutomer_image">
                                </label>
                                <input type='file' name='image' class="image_file" id="img_<?= $row['ID'];?>">
                            </fieldset>
                        </div>
                        <fieldset>
                            <div class="flex half-container m-auto j-cent">
                                <input class="hidden-button" type='hidden' value="<?= $row['ID'] ?>" name='current_order'>
                                <input class="button delete-button delete-order" type="submit" data-val="<?= $row['ID']; ?>" value="Delete" name="delete">
                                <div class="button edit-button"><span>Edit</span></div>
                                <input class="button save-button update-order" type="submit" value="Save" name="save" data-val="<?= $row['ID']; ?>">
                                <div class="button finish-button"> Finish </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
    <?php
        }
    }