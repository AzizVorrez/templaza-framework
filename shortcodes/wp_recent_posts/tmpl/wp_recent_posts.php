<?php

defined('TEMPLAZA_FRAMEWORK') or exit();

use TemPlazaFramework\Functions;
use TemPlazaFramework\Templates;

$options    = Functions::get_theme_options();

//$menu    = isset($atts['nav_menu'])?$atts['nav_menu']:'';
//if ($menu){
    $type = 'WP_Widget_Recent_Posts';
    $args = array();

global $wp_widget_factory;
// to avoid unwanted warnings let's check before using widget

if ( is_object( $wp_widget_factory ) && isset( $wp_widget_factory->widgets, $wp_widget_factory->widgets[ $type ] ) ) {
    ?>

<div<?php echo isset($atts['tz_id'])?' id="'.$atts['tz_id'].'"':''; ?> class="<?php
    echo isset($atts['tz_class'])?trim($atts['tz_class']):''; ?>">
<!--    <aside id="widget-area---><?php //echo $atts['id']; ?><!--" class="widget-area">-->
    <?php the_widget( $type, $atts, $args ); ?>
<!--    </aside>-->
</div>
<?php } ?>
