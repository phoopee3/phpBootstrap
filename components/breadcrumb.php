<?php

include( '../header.php' );

include( '../phpBootstrap.class.php' );

?>
<pre><code>
    
$bs = new phpBootstrap();

$items = [
    [
        'url' => '/',
        'content' => 'Home',    
    ],
    [
        'content' => 'About',    
    ],
];

$bs->breadcrumb( $items );

</code></pre>
<?php

$bs = new phpBootstrap();

$items = [
    [
        'url' => '/',
        'content' => 'Home',    
    ],
    [
        'content' => 'About',    
    ],
];

$bs->breadcrumb( $items );

include( '../footer.php' );
