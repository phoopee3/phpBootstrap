<?php

class phpBootstrap {

    /**
     * Alert
     * @param string $content
     * @param string $type
     * @param boolean $dismissable
     */
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

    /**
     * Button
     * @param string $content
     * @param string $type
     * @param string $modal
     */
    public function button( $content, $type = 'primary', $modal = null ) {
        $atts = '';
        if ( $modal ) {
            $atts = "data-bs-toggle=\"modal\" data-bs-target=\"#$modal\"";
        }
        ?>
        <button type="button" class="btn btn-<?php echo $type; ?>" <?php echo $atts; ?>>
            <?php echo $content; ?>
        </button>
        <?php
    }

    /**
     * Modal
     * @param string $content
     * @param string $id
     * @param string $header
     * @param string $footer
     */
    public function modal( $content, $id, $header = '', $footer = '') {
        $header_content = '';
        if ( $header ) {
            $header_content = "<div class=\"modal-header\"><h5 class=\"modal-title\">$header</h5><button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button></div>";
        }
        $footer_content = '';
        if ( $footer ) {
            $footer_content = "<div class=\"modal-footer\">$footer</div>";
        }
        ?>
        <div class="modal fade" id="<?php echo $id; ?>" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <?php echo $header_content; ?>
                    <div class="modal-body">
                        <?php echo $content; ?>
                    </div>
                    <?php echo $footer_content; ?>
                </div>
            </div>
        </div>
        <?php
    }
}