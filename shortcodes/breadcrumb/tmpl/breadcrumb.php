<?php

defined('TEMPLAZA_FRAMEWORK') or exit();

use TemPlazaFramework\Functions;
use TemPlazaFramework\Templates;

extract(shortcode_atts(array(
    'tz_id'  => '',
    'tz_class'  => '',
    'enable_breadcrumb_single'    => false,
), $atts));

if (is_single() && $enable_breadcrumb_single == false){
    return;
}
$tz_class = '';
?>
<div<?php echo !empty($tz_id)?' id="'.esc_attr__($tz_id).'"':''; ?> class="<?php echo esc_attr__($tz_class); ?>">
<?php
get_template_part( 'template-parts/breadcrumb' );
?>
</div>
