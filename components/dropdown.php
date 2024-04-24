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



include( '../footer.php' );
