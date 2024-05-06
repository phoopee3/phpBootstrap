<?php

include( '../header.php' );

// include( '../phpBootstrap.class.php' );

?>
<pre><code>
    
$bs = new phpBootstrap();

$bs->button( 'primary button' );

$bs->button( content: "secondary", type: "secondary" );

</code></pre>
<?php

$bs = new phpBootstrap();

$bs->badge( 'primary badge' );

echo "<hr>";

$types = [
    'secondary',
    'success',
    'danger',
    'warning',
    'info',
    'light',
    'dark',
    'link',
];

foreach( $types as $type ) {
    $bs->badge( content: "$type badge", type: $type );
}

echo "<hr>";

$bs->badge( "rounded pill", "primary", "rounded-pill" );

include( '../footer.php' );
