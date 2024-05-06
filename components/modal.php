<?php
include( '../header.php' );

// include( '../phpBootstrap.class.php' );

?>
<pre><code>
    
$bs = new phpBootstrap();

$bs->modal( content: 'Lorem ipsum dolar sit amet', id: 'myModal', header: 'Hello world' );

$bs->button( content: 'show modal', modal: 'myModal' );

</code></pre>
<?php

$bs = new phpBootstrap();

$bs->modal( content: 'Lorem ipsum dolar sit amet', id: 'myModal', header: 'Hello world' );

$bs->button( content: 'show modal', modal: 'myModal' );

include( '../footer.php' );
