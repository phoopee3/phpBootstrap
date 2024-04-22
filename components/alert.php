<?php

include( '../header.php' );

include( '../phpBootstrap.class.php' );

?>
<pre><code>
    
$bs = new phpBootstrap();

$bs->alert( 'A simple primary alert - check it out!' );

$bs->alert( content: "A simple secondary alert - check it out!", type: "secondary" );

</code></pre>
<?php

$bs = new phpBootstrap();

$bs->alert( 'A simple primary alert - check it out!' );

$alerts = [
    'secondary',
    'success',
    'danger',
    'warning',
    'info',
    'light',
    'dark',
];

foreach( $alerts as $type ) {
    $bs->alert( content: "A simple $type alert - check it out!", type: $type );
}

?>
<pre><code>
$bs->alert( content: 'A simple primary alert - check it out!', dismissible: true );
</code></pre>
<?php

$bs->alert( content: 'A simple primary alert - check it out!', dismissible: true );

$alerts = [
    'secondary',
    'success',
    'danger',
    'warning',
    'info',
    'light',
    'dark',
];

foreach( $alerts as $type ) {
    $bs->alert( content: "A simple $type alert - check it out!", type: $type, dismissible: true );
}



include( '../footer.php' );
