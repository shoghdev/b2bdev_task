<?php
    require_once('./debugger.php');
    require_once './config/connection.php';

    //#### READ CUSTOMERS DATA
    $sql = "SELECT * FROM `customers`";
    //execute the query
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {?>    
                <div class="wrap bordered-container item" id="created_<?= $row['ID']; ?>">
                    <form class="container created-item" action="" method="POST" enctype="multipart/form-data" id="customer_<?= $row['ID']; ?>">
                        <div>
                            <fieldset>
                                <label for="iname">
                                    <span>Name:</span>
                                </label>
                                <input type='text' value="<?= $row['name']; ?>" name='customer_name'>
                            </fieldset>
                            <fieldset>
                                <label for="image" class="flex column">
                                    <span>Image:</span>
                                    <img src="<?= $row['image']; ?>" alt="cutomer_image" class="cutomer_image">
                                </label>
                                <input type='file' name='image' class="image_file" id="img_<?= $row['ID'];?>" value="<?= $row['image'];?>">
                            </fieldset>
                        </div>
                        <fieldset>
                            <div class="flex half-container m-auto j-cent">
                                <input class="hidden-button" type='hidden' value="<?= $row['ID'] ?>" name='current'>
                                <input class="button delete-button" type="submit" data-value="<?= $row['ID']; ?>" value="Delete" name="delete">
                                <div class="button edit-button"><span>Edit</span></div>
                                <input class="button save-button" type="submit" value="Save" name="save" data-val="<?= $row['ID']; ?>">
                                <div class="button finish-button"> Finish </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
    <?php
        }
    } 