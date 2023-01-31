<?php

defined('ADVANCED_PRODUCT') or exit();

use Advanced_Product\AP_Functions;
use Advanced_Product\Helper\AP_Custom_Field_Helper;

// Get custom fields
use TemPlazaFramework\Functions;
if ( !class_exists( 'TemPlazaFramework\TemPlazaFramework' )){
    $templaza_options = array();
}else{
    $templaza_options = Functions::get_theme_options();
}
$fields     = AP_Custom_Field_Helper::get_custom_fields_display_flag_by_product_id('show_in_listing',get_the_ID());
if(!empty($fields)){
?>
<div class="ap-specification uk-grid-column-small uk-grid-row-collapse ap-specification-style5 uk-child-width-1-2" data-uk-grid>
    <?php foreach($fields as $field){
        $f_attr             = AP_Custom_Field_Helper::get_custom_field_option_by_id($field -> ID);
        $f_value            = (!empty($f_attr) && isset($f_attr['name']))?get_field($f_attr['name']):null;
        $f_icon     = isset($f_attr['icon'])?$f_attr['icon']:'';
        $show_icon  = get_field('ap_show_archive_custom_field_icon', 'option');
        if($f_value){
            ?>
            <div class="ap-spec-item" >
                <span class="ap-field-label"><?php
                    if( !empty($f_icon) && $show_icon){
                        if($f_icon['type'] == 'uikit-icon'){
                            ?>
                            <i data-uk-icon="icon:<?php echo $f_icon['icon']; ?>;"></i>
                            <?php
                        }else {
                            ?>
                            <i class="<?php echo $f_icon['icon']; ?>"></i>
                            <?php
                        }
                    }
                    echo esc_html($f_attr['label']); esc_html_e(': ','templaza-framework')?></span>
                <?php
                $html   = apply_filters('advanced-product/field/value_html/type='.$f_attr['type'], '', $f_value, $f_attr, $field);
                if(!empty($html)){
                    echo wp_kses($html,'post');
                }elseif(is_array($f_value)){
                    $f_value    = array_values($f_value);
                    ?>
                    <span class="ap-spec-value"><?php echo esc_html(join(',', $f_value)); ?></span>
                    <?php
                }else{
                    ?>
                    <span class="ap-spec-value"><?php
                        echo esc_html($f_value); ?>
                    </span>
                    <?php
                }
                ?>
            </div>
        <?php
        }
    } ?>
</div>
<?php }?>
