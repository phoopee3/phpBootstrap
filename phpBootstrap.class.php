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

    public function breadcrumb( $items = [] ) {
        $item_length = count( $items );
        if ( $item_length ) {
            ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php for( $i = 0; $i < $item_length; $i++ ) {
                        $item = $items[$i];
                        $class = '';
                        $atts = '';
                        if ( $i == $item_length - 1 ) {
                            $class = 'active';
                            $atts = 'aria-current="page"';
                        }
                        ?>
                        <li class="breadcrumb-item <?php echo $class; ?>" <?php echo $atts; ?>>
                            <?php if ( isset( $item['url'] ) && $item['url'] ) { ?>
                                <a href="<?php echo $item['url']; ?>">
                            <?php } ?>
                            <?php echo $item['content']; ?>
                            <?php if ( isset( $item['url'] ) && $item['url'] ) { ?>
                                </a>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ol>
            </nav>
            <?php
        }
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
     * link
     * @param string $content
     * @param string $url
     */
    public function link( $content, $url = '#' ) {
        ?>
        <a href="<?php echo $url; ?>"><?php echo $content; ?></a>
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