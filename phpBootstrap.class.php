<?php

class phpBootstrap {

    /**
     * add attributes
     * @param array|string $source The source variable
     * @param array|string $additional The additional data to append to $source
     * @return array
     */
    public static function add_attributes( $source, $additional ) {
        if ( is_string( $additional ) ) {
            $source = [ " " => "$additional" ];
        } else if ( is_array( $additional ) ) {
            foreach( $additional as $key => $value ) {
                $source[$key] = $value;
            }
        }
        return $source;
    }

    public static function render_attributes( $atts ) {
        if ( is_null ( $atts ) ) {
            return;
        }
        $temp = [];
        foreach( $atts as $key => $value ) {
            if ( $key == " " ) {
                $temp[] = $value;
            } else {
                $temp[] = "$key=\"$value\"";
            }
        }
        return implode( ' ', $temp );
    }
    
    /**
     * add classes
     * @param array|string $source The source variable
     * @param array|string $additional The additional data to append to $source
     * @return array
     */
    public static function add_classes( $source, $additional ) {
        if ( is_string( $source ) ) {
            $source = [ $source ];
        }
        if ( is_string( $additional ) ) {
            $additional = [ $additional ];
        } else if ( is_array( $additional ) ) {
            if ( is_null( $source ) ) {
                $source = [];
            }
            foreach( $additional as $value ) {
                $source[] = $value;
            }
        }
        return $source;
    }

    /**
     * Parse classes
     * @param array $classes
     */
    public static function render_classes( $classes ) {
        return implode( ' ', $classes );
    }

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

    public function badge( $content, $type = "primary", $classes = null, $attributes = null ) {
        $classes = self::add_classes( $classes, ["badge","text-bg-$type"]);
        ?><span class="<?php echo self::render_classes( $classes ); ?>"><?php echo $content; ?></span><?php
    }

    /**
     * Breadcrumb
     * @param array $items An array of items with keys 'url' and 'content'
     */
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
     * @param array|string $classes
     * @param array|string $atts
     * @param string $modal
     */
    public function button( $content, $type = 'primary', $classes = null, $atts = null, $modal = null ) {
        
        if ( $modal ) {
            $atts = self::add_attributes( $atts, [
                "data-bs-toggle" => "modal",
                "data-bs-target" => "#$modal",
            ] );
        }

        $classes = self::add_classes( $classes, ["btn", "btn-$type"] );

        ?>
        <button type="button" class="<?php echo self::render_classes( $classes ); ?>" <?php echo self::render_attributes( $atts ); ?>>
            <?php echo $content; ?>
        </button>
        <?php
    }

    public function get_button( $content, $type = 'primary', $classes = null, $atts = null, $modal = null ) {
        ob_start();
        self::button( $content, $type, $classes, $atts, $modal );
        return ob_get_clean();
    }

    /**
     * Dropdown
     * @param string $content Button text
     * @param array $items An array of items with keys 'url' and 'content'
     * @param string $type Class defining the button type
     * @param boolean $split
     */
    public function dropdown( $content, $items = [], $type = 'primary', $split = false ) {
        $div_class = 'dropdown';
        if ( $split ) {
            $div_class = 'btn-group';
        }
        ?>
        <div class="<?php echo $div_class; ?>">
            <?php if ( $split ) { ?>
                <button type="button" class="btn btn-<?php echo $type; ?>"><?php echo $content; ?></button>
                <button type="button" class="btn btn-<?php echo $type; ?> dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
            <?php } else { ?>
                <button class="btn btn-<?php echo $type; ?> dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $content; ?>
                </button>
            <?php } ?>
            <?php
            $item_length = count( $items );
            if ( $item_length ) {
                ?>
                <ul class="dropdown-menu">
                    <?php foreach( $items as $item ) { ?>
                        <li>
                            <?php if ( $item['content'] == '--' ) { ?>
                                <li><hr class="dropdown-divider"></li>
                            <?php } else {
                                if ( isset( $item['url'] ) && $item['url'] ) { ?>
                                    <a class="dropdown-item" href="<?php echo $item['url']; ?>">
                                <?php } ?>
                                <?php echo $item['content']; ?>
                                <?php if ( isset( $item['url'] ) && $item['url'] ) { ?>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <?php
    }

    /**
     * link
     * @param string $content
     * @param string $url
     */
    public function link( $content, $url = '#', $classes = [], $attributes = [] ) {
        ?>
        <a href="<?php echo $url; ?>" class="<?php echo self::render_classes( $classes ); ?>" <?php echo self::render_attributes( $attributes ); ?>><?php echo $content; ?></a>
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

    public function nav( $brand = [ 'content' => '', 'url' => ''], $items = [], $id = 'navbar' ) {
        ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <?php if ( isset( $brand ) && is_array( $brand ) && $brand['content'] ) {
                    if ( $brand['url'] ) { ?><a class="navbar-brand" href="<?php echo $brand['url']; ?>"><?php }
                    echo $brand['content'];
                    if ( $brand['url'] ) { ?></a><?php }
                } ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $id; ?>" aria-controls="<?php echo $id; ?>" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="<?php echo $id; ?>">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php foreach( $items as $item ) { ?>
                            <li class="nav-item">
                                <?php echo self::link( $item['content'], $item['url'], ['nav-link','active'], $item['attributes'] ?? [] ); ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
    }
}