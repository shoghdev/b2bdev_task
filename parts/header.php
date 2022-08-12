<?php
    require_once("./debugger.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $globals['title']?></title>
    <link rel="icon" type="image/x-icon" href="./img/coder.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php 
        $menu = [
            [
                'name' => 'Home',
                'link' => 'index.php'
            ],
            [
                'name' => 'Customers',
                'link' => 'customers.php'
            ],
            [
                'name' => 'Orders',
                'link' => 'orders.php'
            ],
        ]
    ?>
    <header>
        <div class="row">
            <div class="wrap m-auto">
                <nav>
                    <ul class="flex">
                        <?php 
                            foreach($menu as $key => $item ) {
                                $active = '';
                                if($key === $globals['menu'])
                                    $active = 'active';
                                    echo    '<li><a href="' . $item["link"] . '" class="' . $active . '">' . $item["name"] . '</a></li>';                                
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>