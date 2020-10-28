<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <title><?= $title ?></title>
</head>
<body>
<header>
    <?php
    require "view/navbar.php";
    ?>
</header>
<div class="container">
    <?= $content ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>