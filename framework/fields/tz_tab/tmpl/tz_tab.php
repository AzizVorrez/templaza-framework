<?php

defined('TEMPLAZA_FRAMEWORK') or exit;

use TemPlazaFramework\Enqueue;

if(isset($this->field) &&  !empty($this->field)){

    // No errors please
    $defaults    = array(
        'indent'   => '',
        'style'    => '',
        'class'    => '',
        'title'    => '',
        'subtitle' => '',
    );
    $this->field = wp_parse_args( $this->field, $defaults );

    $tab_titles     = '';
    $tab_contents   = '';

    if(isset($this -> field['tabs']) && count($this -> field['tabs'])){

        $args   = $this -> parent -> args;
        $args['opt_name']   .= uniqid('__'.$this -> field['id'].'-');
        $opt_name   = $args['opt_name'];
        $args['show_import_export'] = false;
        Redux::set_args($opt_name, $args);

        foreach($this -> field['tabs'] as $k => $tab){
            $tab_titles     .= '<li><a href="#tz_tab-'.$tab['id'].'">'.$tab['title'].'</a></li>';

            $tab['title']   = '';

            Redux::set_section($opt_name, $tab);

        }
        Redux::init($opt_name);
        \Templaza_API::load_my_fields($opt_name);

        $redux  = Redux::instance($opt_name);

        foreach($redux -> sections as $k => $tab){
            $tab_contents   .= '<div id="tz_tab-'.$tab['id'].'">';

            if(isset($tab['fields']) && count($tab['fields'])){
                foreach ($tab['fields'] as $field) {
                    add_filter("redux/options/{$opt_name}/field/{$field['id']}", function($_field)use($field){
                        $_field['name'] = $_field['id'];
                        return $_field;
                    });
                }
            }
            add_filter("redux/{$this -> parent -> args['opt_name']}/repeater", function($repeater_data) use($opt_name){
                $repeater_data['opt_names'][]   = $opt_name;
                return $repeater_data;
            });

            $redux -> _register_settings();
            $enqueue    = new Enqueue($redux);
            $enqueue -> init();

            $tab['class'] = isset($tab['class']) ? ' ' . $tab['class'] : '';
            $tab_contents .= '<div id="'.$this -> field['type'].'_' . $k . '_section_group' . '" class="redux-group-tab' . esc_attr($tab['class']) . '" data-rel="'.$this -> field['type'].'_' . $k . '">';
            $tab_contents .= '<div class="redux-container"  data-opt-name="'.$opt_name.'">';

            ob_start();
            do_settings_sections( $redux->args['opt_name'] . $k . '_section_group' );
            $tab_contents   .= ob_get_contents();
            ob_end_clean();

            $tab_contents .= '</div>';
            $tab_contents .= '</div>';
            $tab_contents   .= '</div>';
        }
    }

    echo '<div id="tz_tab-'.$this -> field['id'].'-tab" class="tzfrm-ui-tab" data-fl-tz_layout-tab>
                    <ul>'.$tab_titles.'</ul>
                    '.$tab_contents.'
                </div>';
}
