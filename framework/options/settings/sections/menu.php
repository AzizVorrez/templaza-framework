<?php

defined('TEMPLAZA_FRAMEWORK') or exit();

use TemPlazaFramework\Functions;

Templaza_API::set_section('settings',
    array(
        'title'  => __( 'Menu', $this -> text_domain ),
        'id'     => 'menus',
//        'desc'   => __( 'Here you can set your preferences for the template header(Logo, Menu and Menu Elements).', $this -> text_domain ),
        'icon'   => 'fas fa-bars',
    //    'subsection' => true,
        'fields' => array(
        ),
    )
);

Templaza_API::set_section('settings',
    array(
        'title'      => __( 'Main Menu', $this -> text_domain ),
        'id'         => 'menus-main-menu',
        'desc'       => __( 'These settings control design for main menu', $this -> text_domain ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'     => 'main-menu-padding',
                'type'   => 'spacing',
                'mode'   => 'padding',
                'all'    => false,
                'allow_responsive'    => true,
                'units'  => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'title'  => esc_html__('Padding', $this -> text_domain),
                'default' => array(
                    'units' => 'px',
                ),
            ),
            array(
                'id'     => 'main-menu-margin',
                'type'   => 'spacing',
                'mode'   => 'margin',
                'all'    => false,
                'allow_responsive'    => true,
                'units'  => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'title'  => esc_html__('Margin', $this -> text_domain),
                'default' => array(
                    'units' => 'px',
                ),
            ),
        ),
    )
);

Templaza_API::set_section('settings',
	array(
		'title'      => __( 'Drop-down Menu', $this -> text_domain ),
		'id'         => 'menus-dropdown-menu',
		'desc'       => __( 'These settings control design for drop down menu', $this -> text_domain ),
		'subsection' => true,
		'fields'     => array(
			array(
				'id'     => 'dropdown-menu-padding',
				'type'   => 'spacing',
				'mode'   => 'padding',
				'all'    => false,
                'allow_responsive'    => true,
				'units'  => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
				'title'  => esc_html__('Padding', $this -> text_domain),
			),
			array(
				'id'     => 'dropdown-menu-margin',
				'type'   => 'spacing',
				'mode'   => 'margin',
				'all'    => false,
                'allow_responsive'    => true,
				'units'  => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
				'title'  => esc_html__('Margin', $this -> text_domain),
			),
		),
	)
);

Templaza_API::set_section('settings',
    array(
        'title'      => __( 'Sticky Menu', $this -> text_domain ),
        'id'         => 'menus-sticky-menu',
        'desc'       => __( 'These settings control design for sticky menu', $this -> text_domain ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'     => 'sticky-menu-padding',
                'type'   => 'spacing',
                'mode'   => 'padding',
                'all'    => false,
                'allow_responsive'    => true,
                'units'  => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'title'  => esc_html__('Padding', $this -> text_domain),
            ),
            array(
                'id'     => 'sticky-menu-margin',
                'type'   => 'spacing',
                'mode'   => 'margin',
                'all'    => false,
                'allow_responsive'    => true,
                'units'  => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'title'  => esc_html__('Margin', $this -> text_domain),
            ),
        ),
    )
);