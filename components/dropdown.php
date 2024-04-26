<?php

include( '../header.php' );

include( '../phpBootstrap.class.php' );

?>
<pre><code>
    
$bs = new phpBootstrap();

$items = [
    [
        'url' => '/components/alert.php',
        'content' => 'Alert',
    ],
    [
        'url' => '/components/button.php',
        'content' => 'Button',
    ],
    [
        'content' => '--',    
    ],
    [
        'url' => '/components/modal.php',
        'content' => 'Modal',
    ],
];

$bs->dropdown( 'Dropdown button', $items );

$bs->dropdown( 'Dropdown button', $items, 'danger' );

$bs->dropdown( 'Dropdown button', $items, split: true );

$bs->dropdown( 'Dropdown button', $items, 'success', true );
</code></pre>

<?php

$bs = new phpBootstrap();

$items = [
    [
        'url' => '/components/alert.php',
        'content' => 'Alert',
    ],
    [
        'url' => '/components/button.php',
        'content' => 'Button',
    ],
    [
        'content' => '--',    
    ],
    [
        'url' => '/components/modal.php',
        'content' => 'Modal',
    ],
];

$bs->dropdown( 'Dropdown button', $items );
echo "<br>";
$bs->dropdown( 'Dropdown button', $items, 'danger' );
echo "<br>";
$bs->dropdown( 'Dropdown button', $items, split: true );
echo "<br><br>";
$bs->dropdown( 'Dropdown button', $items, 'success', true );


include( '../footer.php' );
