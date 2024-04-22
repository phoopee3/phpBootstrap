<?php

class phpBootstrap {

    public function alert( $content, $type = "primary", $dismissible = false ) {
        $class = $type;
        if ( $dismissible ) {
            $class .= " alert-dismissible fade show";
        }
        ?>
        <div class="alert alert-<?php echo $class; ?>" role="alert">
            <?php echo $content; ?>
            <?php if ( $dismissible ) { ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php } ?>
        </div>
        <?php
    }
}