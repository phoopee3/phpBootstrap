<?php
include('phpBootstrap.class.php');
$bs_header = new phpBootstrap();
$items = [];
$items = [
    [ 'content' => 'alert', 'url' => '/components/alert.php' ],
    [ 'content' => 'badge', 'url' => '/components/badge.php' ],
    [ 'content' => 'breadcrumb', 'url' => '/components/breadcrumb.php' ],
    [ 'content' => 'button', 'url' => '/components/button.php' ],
    [ 'content' => 'dropdown', 'url' => '/components/dropdown.php' ],
    [ 'content' => 'modal', 'url' => '/components/modal.php' ],
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpBootstrap</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <?php $bs_header->nav( [ 'content' => 'phpBootstrap', 'url' => '/' ], $items ); ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                