<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="./public/css/style.css">
        <link rel="stylesheet" href=<?= $css; ?>>

        <script src="./public/js/script.js" defer></script>
        <script src="https://kit.fontawesome.com/ed779ab57c.js" crossorigin="anonymous"></script>

        <title><?= $title; ?></title>
    </head>
    <body>
        <?php include("headerView.php"); ?>

        <?= $content; ?>

        <?php include("footerView.php"); ?>
    </body>

</html>