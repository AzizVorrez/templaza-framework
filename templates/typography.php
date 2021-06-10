<?php

defined('TEMPLAZA_FRAMEWORK') or exit();

use TemPlazaFramework\Functions;
use TemPlazaFramework\Templates;
use TemPlazaFramework\Fonts;
use TemPlazaFramework\CSS;

$options        = Functions::get_theme_options();

$typographies = array(
    array(
        'id'        => 'typography-body-option',
        'enable'    => (isset($options['typography-body']) && $options['typography-body'] =='custom'?true:false),
        'class'     => 'html,body,.body'
    ),
    array(
        'id'        => 'typography-h1-option',
        'enable'    => (isset($options['typography-h1']) && $options['typography-h1'] =='custom'?true:false),
        'class'     => array(
            'desktop' => 'h1,.h1,.uk-h1',
            'tablet'  => 'h1,.h1,.uk-h1',
            'mobile'  => 'h1,.h1,.uk-h1'
        )
    ),
    array(
        'id'        => 'typography-h2-option',
        'enable'    => (isset($options['typography-h2']) && $options['typography-h2'] =='custom'?true:false),
        'class'     => array(
            'desktop' => 'h2,.h2,.uk-h2',
            'tablet'  => 'h2,.h2,.uk-h2',
            'mobile'  => 'h2,.h2,.uk-h2'
        )
    ),
    array(
        'id'        => 'typography-h3-option',
        'enable'    => (isset($options['typography-h3']) && $options['typography-h3'] =='custom'?true:false),
        'class'     => array(
            'desktop' => 'h3,.h3,.uk-h3',
            'tablet'  => 'h3,.h3,.uk-h3',
            'mobile'  => 'h3,.h3,.uk-h3'
        )
    ),
    array(
        'id'        => 'typography-h4-option',
        'enable'    => (isset($options['typography-h4']) && $options['typography-h4'] =='custom'?true:false),
        'class'     => array(
            'desktop' => 'h4,.h4,.uk-h4',
            'tablet'  => 'h4,.h4,.uk-h4',
            'mobile'  => 'h4,.h4,.uk-h4'
        )
    ),
    array(
        'id'        => 'typography-h5-option',
        'enable'    => (isset($options['typography-h5']) && $options['typography-h5'] =='custom'?true:false),
        'class'     => array(
            'desktop' => 'h5,.h5,.uk-h5',
            'tablet'  => 'h5,.h5,.uk-h5',
            'mobile'  => 'h5,.h5,.uk-h5'
        )
    ),
    array(
        'id'        => 'typography-h6-option',
        'enable'    => (isset($options['typography-h6']) && $options['typography-h6'] =='custom'?true:false),
        'class'     => array(
            'desktop' => 'h6,.h6,.uk-h6',
            'tablet'  => 'h6,.h6,.uk-h6',
            'mobile'  => 'h6,.h6,.uk-h6'
        )
    ),
    array(
        'id'        => 'typography-menu-option',
        'enable'    => (isset($options['typography-menu']) && $options['typography-menu'] =='custom'?true:false),
        'class'     => array(
            'desktop' => '.templaza-nav>li>a,.templaza-sidebar-menu>li>a',
            'tablet'  => '.templaza-nav>li>a,.templaza-sidebar-menu>li>a',
            'mobile'  => '.templaza-nav>li>a,.templaza-sidebar-menu>li>a'
        )
    ),
    array(
        'id'        => 'typography-submenu-option',
        'enable'    => (isset($options['typography-submenu']) && $options['typography-submenu'] =='custom'?true:false),
        'class'     => array(
            'desktop'    => '.templaza-nav .sub-menu > li, .nav-submenu',
            'tablet'     => '.templaza-nav .sub-menu > li, .nav-submenu',
            'mobile'     => '.templaza-nav .nav-submenu-container .nav-submenu > li, .nav-submenu',
        )
    ),
    array(
        'id'        => 'typography-footer-option',
        'enable'    => (isset($options['typography-footer']) && $options['typography-footer'] =='custom'?true:false),
        'class'     => array(
            'desktop'    => '.templaza-footer',
            'tablet'     => '.templaza-footer',
            'mobile'     => '.templaza-footer',
        )
    ),
    array(
        'id'        => 'typography-footer-widget-heading',
        'enable'    => (isset($options['typography-footer']) && $options['typography-footer'] =='custom'?true:false),
        'class'     => array(
            'desktop'    => '.templaza-footer .widgettitle',
            'tablet'     => '.templaza-footer .widgettitle',
            'mobile'     => '.templaza-footer .widgettitle',
        )
    ),
    array(
        'id'        => 'typography-footer-widget-content',
        'enable'    => (isset($options['typography-footer']) && $options['typography-footer'] =='custom'?true:false),
        'class'     => array(
            'desktop'    => '.templaza-footer .textwidget',
            'tablet'     => '.templaza-footer .textwidget',
            'mobile'     => '.templaza-footer .textwidget',
        )
    ),

    // Archive
    array(
        'id'        => 'blog_item_heading',
        'enable'    => true,
        'class'     => array(
            'desktop'    => 'div.templaza-archive .templaza-archive-item .title a',
            'tablet'     => 'div.templaza-archive .templaza-archive-item .title a',
            'mobile'     => 'div.templaza-archive .templaza-archive-item .title a',
        )
    ),
    array(
        'id'        => 'blog_item_content',
        'enable'    => true,
        'class'     => array(
            'desktop'    => 'div.templaza-archive .templaza-archive-item .excerpt',
            'tablet'     => 'div.templaza-archive .templaza-archive-item .excerpt',
            'mobile'     => 'div.templaza-archive .templaza-archive-item .excerpt',
        )
    ),
    // Widget sidebar typography
    array(
        'id'        => 'widget_box_heading',
        'enable'    => true,
        'class'     => array(
            'desktop'    => '.templaza-sidebar .widget-area >.widget .widget-title',
            'tablet'     => '.templaza-sidebar .widget-area >.widget .widget-title',
            'mobile'     => '.templaza-sidebar .widget-area >.widget .widget-title',
        ),
    ),
    array(
        'id'        => 'widget_box_content',
        'enable'    => true,
        'class'     => array(
            'desktop'    => '.templaza-sidebar .widget-area >.widget .widget-content',
            'tablet'     => '.templaza-sidebar .widget-area >.widget .widget-content',
            'mobile'     => '.templaza-sidebar .widget-area >.widget .widget-content',
        ),
    ),

    // Single typography
    array(
        'id'        => 'blog_single_heading_box',
        'enable'    => true,
        'class'     => array(
            'desktop'    => 'div.templaza-single .templaza-single-box .box-title',
            'tablet'     => 'div.templaza-single .templaza-single-box .box-title',
            'mobile'     => 'div.templaza-single .templaza-single-box .box-title',
        )
    ),
    array(
        'id'        => 'blog_single_content',
        'enable'    => true,
        'class'     => array(
            'desktop'    => 'div.templaza-single .templaza-single-content',
            'tablet'     => 'div.templaza-single .templaza-single-content',
            'mobile'     => 'div.templaza-single .templaza-single-content',
        )
    ),
    array(
        'id'        => 'blog_single_h1',
        'enable'    => true,
        'class'     => array(
            'desktop'    => 'div.templaza-single .templaza-single-box h1,div.templaza-single .templaza-single-box .h1'
                .',div.templaza-single .templaza-single-content .h1',
            'tablet'     => 'div.templaza-single .templaza-single-box h1,div.templaza-single .templaza-single-box .h1'
                .',div.templaza-single .templaza-single-content .h1',
            'mobile'     => 'div.templaza-single .templaza-single-box h1,div.templaza-single .templaza-single-box .h1'
                .',div.templaza-single .templaza-single-content .h1',
        )
    ),
    array(
        'id'        => 'blog_single_h2',
        'enable'    => true,
        'class'     => array(
            'desktop'    => 'div.templaza-single .templaza-single-content h2'
                .',div.templaza-single .templaza-single-content .h2',
            'tablet'     => 'div.templaza-single .templaza-single-content h2'
                .',div.templaza-single .templaza-single-content .h2',
            'mobile'     => 'div.templaza-single .templaza-single-content h2'
                .',div.templaza-single .templaza-single-content .h2',
        )
    ),
    array(
        'id'        => 'blog_single_h3',
        'enable'    => true,
        'class'     => array(
            'desktop'    => 'div.templaza-single .templaza-single-content h3'
                .',div.templaza-single .templaza-single-content .h3',
            'tablet'     => 'div.templaza-single .templaza-single-content h3'
                .',div.templaza-single .templaza-single-content .h3',
            'mobile'     => 'div.templaza-single .templaza-single-content h3'
                .',div.templaza-single .templaza-single-content .h3',
        )
    ),
    array(
        'id'        => 'blog_single_h4',
        'enable'    => true,
        'class'     => array(
            'desktop'    => 'div.templaza-single .templaza-single-content h4'
                .',div.templaza-single .templaza-single-content .h4',
            'tablet'     => 'div.templaza-single .templaza-single-content h4'
                .',div.templaza-single .templaza-single-content .h4',
            'mobile'     => 'div.templaza-single .templaza-single-content h4'
                .',div.templaza-single .templaza-single-content .h4',
        )
    ),
    array(
        'id'        => 'blog_single_h5',
        'enable'    => true,
        'class'     => array(
            'desktop'    => 'div.templaza-single .templaza-single-content h5'
                .',div.templaza-single .templaza-single-content .h5',
            'tablet'     => 'div.templaza-single .templaza-single-content h5'
                .',div.templaza-single .templaza-single-content .h5',
            'mobile'     => 'div.templaza-single .templaza-single-content h5'
                .',div.templaza-single .templaza-single-content .h5',
        )
    ),
    array(
        'id'        => 'blog_single_h6',
        'enable'    => true,
        'class'     => array(
            'desktop'    => 'div.templaza-single .templaza-single-content h6'
                .',div.templaza-single .templaza-single-content .h6',
            'tablet'     => 'div.templaza-single .templaza-single-content h6'
                .',div.templaza-single .templaza-single-content .h6',
            'mobile'     => 'div.templaza-single .templaza-single-content h6'
                .',div.templaza-single .templaza-single-content .h6',
        )
    ),array(
        'id'        => 'blog_single_quote',
        'enable'    => true,
        'class'     => array(
            'desktop'    => 'div.templaza-single .templaza-single-box blockquote',
            'tablet'     => 'div.templaza-single .templaza-single-box blockquote',
            'mobile'     => 'div.templaza-single .templaza-single-box blockquote',
        )
    ),
);

// Get typographies
$typographies   = apply_filters('templaza-framework/typography/list', $typographies);

// Generate typography styles.
if(count($typographies)) {
    foreach ($typographies as $typo) {

        $enable = isset($typo['enable']) ? (bool)$typo['enable'] : false;
        if ($enable) {
            $typoParams = isset($options[$typo['id']]) ? $options[$typo['id']] : array();
            if (is_array($typo['class'])) {
                $devices = $typo['class'];
            } else {
                $devices['desktop'] = $typo['class'];
                $devices['tablet'] = $typo['class'];
                $devices['mobile'] = $typo['class'];
            }

            if($typo['id'] == 'blog_item_heading'){
                if(isset($typoParams['text-align']) && !empty($typoParams['text-align'])){
//                    Templates::add_inline_style('div.templaza-archive .templaza-archive-item .title{text-align:'.$typoParams['text-align'].'}');
                    $devices['desktop'] = 'div.templaza-archive .templaza-archive-item .title{text-align:'.$typoParams['text-align'].'}';
                    unset($typoParams['text-align']);
                }
            }

            $_styles = Fonts::make_css_style($typoParams, $devices);

            if (count($_styles)) {
                foreach ($_styles as $device => $style) {
                    Templates::add_inline_style($style, $device);
                }
            }
        }
    }
}

$designs    = array(
    // Widget Sidebar Design
    array(
        'enable'    => true,
        'class'     => '.templaza-sidebar .widget-area >.widget',
        'options' => array(
            'widget_box_bg',
            'widget_box_border',
            'widget_box_border_radius',
            'widget_box_padding',
            'widget_box_margin',
            'widget_box_shadow',
        ),
    ),
    array(
        'enable'    => true,
        'class'     => '.templaza-sidebar .widget-area >.widget.style2 .widget-title',
        'options' => array(
            'widget_box_heading2_margin',
            'widget_box_heading2_bg',
        ),
    ),
    // Archive
    array(
        'enable'    => true,
        'class'     => 'div.templaza-archive .templaza-archive-item',
        'options' => array(
            'blog_item_bg',
            'blog_item_border',
            'blog_item_padding',
            'blog_item_margin',
            'blog_item_border_radius',
            'blog_item_shadow',
        ),
    ),
    // Single
    array(
        'enable'    => true,
        'class'     => 'div.templaza-single .templaza-single-box blockquote',
        'options' => array(
            'blog_single_quote_bg',
        ),
    ),
    array(
        'enable'    => true,
        'class'     => 'div.templaza-single .templaza-single-box',
        'options' => array(
            'blog_single_bg',
            'blog_single_border',
            'blog_single_padding',
            'blog_single_margin',
            'blog_single_border_radius',
            'blog_single_shadow',
        ),
    ),

);

// Generate design styles.
if(count($designs)) {
    $styles    = array();

    foreach($designs as $design){
        $enable = isset($design['enable']) ? (bool)$design['enable'] : false;
        if ($enable) {
            $wd_css = '';
//            if (is_array($design['class'])) {
//                $devices = $design['class'];
//            } else {
//                $devices['desktop'] = $design['class'];
//                $devices['tablet']  = $design['class'];
//                $devices['mobile']  = $design['class'];
//            }

//            if(isset($design['id']) && !empty($design['id'])) {
//
//                $typoParams = isset($options[$design['id']]) ? $options[$design['id']] : array();
////                $wd_css     .= Templates::make_css_design_style($typoParams)
////                $_styles    = Fonts::make_css_style($typoParams, $devices);
////                $styles     = count($styles)?($styles + $_styles):$_styles;
//                $wd_css = Templates::make_css_design_style($design['options'], $options);
//
//            }elseif(isset($design['options']) && count($design['options'])){
                if($index = array_search('widget_box_shadow', $design['options'])){
                    $box_shadow = isset($options['widget_box_shadow'])?$options['widget_box_shadow']:'';
                    $wd_css .= CSS::box_shadow($box_shadow);
                    unset($design['options'][$index]);
                }elseif($index = array_search('blog_item_shadow', $design['options'])){
                    $box_shadow = isset($options['blog_item_shadow'])?$options['blog_item_shadow']:'';
                    $wd_css .= CSS::box_shadow($box_shadow);
                    unset($design['options'][$index]);
                }elseif($index = array_search('blog_single_shadow', $design['options'])){
                    $box_shadow = isset($options['blog_single_shadow'])?$options['blog_single_shadow']:'';
                    $wd_css .= CSS::box_shadow($box_shadow);
                    unset($design['options'][$index]);
                }
                $wd_css .= Templates::make_css_design_style($design['options'], $options);

                if(!empty($wd_css)){
                    Templates::add_inline_style($design['class'].'{'.$wd_css.'}');
                }
//            }
        }
    }
}

