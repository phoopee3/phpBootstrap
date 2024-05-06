<?php

include( './header.php' );

$components = [
    'alert',
    'badge',
    'breadcrumb',
    'button',
    'dropdown',
    'modal',
];

echo "<ul>";

foreach( $components as $component ) {
    echo "<li><a href='components/$component.php'>$component</a></li>";
}

echo "</ul>";

include( './footer.php' );
