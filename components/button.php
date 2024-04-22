<?php

include( '../header.php' );

include( '../phpBootstrap.class.php' );

?>
<pre><code>
    
$bs = new phpBootstrap();

$bs->button( 'primary button' );

$bs->button( content: "secondary", type: "secondary" );

</code></pre>
<?php

$bs = new phpBootstrap();

$bs->button( 'primary button' );

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
    $bs->button( content: "$type button", type: $type );
}

include( '../footer.php' );
