<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - <?= $post_title; ?></title>
</head>
<body>
<?php require('header.php'); ?>

<h1><?= $post_title; ?></h1>

<p><?= $post_content; ?></p>
</body>
</html>