<?php

defined('ADVANCED_PRODUCT') or exit();

use Advanced_Product\AP_Functions;
use Advanced_Product\Helper\AP_Helper;
use Advanced_Product\Helper\AP_Custom_Field_Helper;

?>
<?php
$msrp   = get_field('ap_price_msrp', get_the_ID());
$price  = get_field('ap_price', get_the_ID());

$f_value            = get_field('unit-price', get_the_ID());
$call2buy_value     = get_field('call-to-buy', get_the_ID());
$price_notice_value = get_field('price-notice', get_the_ID());
$call2buy = AP_Custom_Field_Helper::get_custom_field_option_by_field_name('call-to-buy');
if (!empty($price)) {

    $html = '<p class="uk-background-primary uk-padding-small uk-light ap-pricing">';
    $html .= sprintf('<span class="ap-price uk-h3"><b> %s</b> %s </span>',
        esc_html__(' ', 'templaza-framework'), AP_Helper::format_price($price));
    if (!empty($msrp)/* && $show_price_msrp*/) {
        $html .= sprintf('<span class="ap-price-msrp"> %s  %s </span>',
            esc_html__('MSRP:', 'templaza-framework'), AP_Helper::format_price($msrp));
    }
    $html .= '</p>';

    ?>
    <label class="single-price-label"><?php esc_html_e('PRICE:','templaza-framework');?></label>
    <span class="price">
        <?php
        echo esc_html(AP_Helper::format_price($price));
        ?>
    </span>
    <?php if($f_value){ ?>
    <span class="meta">
            <?php echo esc_html($f_value);?>
    </span>
    <?php } ?>
    <?php
    if($price_notice_value){
        ?>
        <div class="price_notice uk-text-meta">
            <?php echo esc_html($price_notice_value);?>
        </div>
        <?php
    }
} ?>