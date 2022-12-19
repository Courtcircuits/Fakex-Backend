<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $pagetitle;?></title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php

    session_start();     
    require __DIR__ . "/navbar.php";
?>
<main>
    <?php
        require __DIR__ . "/{$cheminVueBody}";
    ?>
</main>
<?php
    require __DIR__ . "/cart.php";
?>
<footer>
    <p>
        Site créé par Alfonso Jimenez, Tristan Radulescu et Damien Mathieu<br>
        Fake X est une contrefaçon de <a href="https://stockx.com">Stock X</a>.
    </p>
</footer>
<script src="./js/script.js"></script>
</body>
</html> 