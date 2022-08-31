<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Trains</title>
    <style>
        body{
            background-image: url('assets/image/background.png');
            background-position: center;
            background-size: fixed;
        }
    </style>
</head>
<body>
    <?php
    
	require 'server/config.php';
	session_start();
    @include "pages/templates/header.php";
    @include "pages/navbar/navbar.php";
    ?>
    <div class="mt-5">
        <?php
        @include "card-jadwal.php"
        ?>

    </div>

</body>
</html>