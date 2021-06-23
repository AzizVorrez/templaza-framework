<?php

namespace TemPlazaFramework;

defined('TEMPLAZA_FRAMEWORK') or exit();

use TemPlazaFramework\Templates;

if(!class_exists('TemPlazaFramework\Template_Function')){
    class Template_Function{
        public function __construct(){
            $this -> hook();
        }
        public function hook(){
            add_filter('user_contactmethods', array($this, 'templaza_modify_contact_methods'));
            add_filter('wp_kses_allowed_html', array($this, 'templaza_wpkses_post_tags'), 10, 2);
            add_filter('upload_mimes', array($this, 'templaza_mime_types'));
            add_filter('edit_post_link', array($this, 'templaza_edit_post_link'),10,3);
            add_action('templaza_get_postviews',array($this,'templaza_getPostViews'));
            add_action('templaza_set_postviews',array($this,'templaza_setPostViews'));
            add_action('templaza_get_commentcount_post',array($this,'templaza_getCommentCountPost'));
            add_action('templaza_breadcrumb',array($this,'templaza_breadcrumbs'));
            add_action('templaza_share_post',array($this,'templaza_get_share_social'));
            add_action('templaza_pagination',array($this,'templaza_pagination'));
            add_action('templaza_gallery_post',array($this,'templaza_get_gallery_post'));
            add_action('templaza_image_post',array($this,'templaza_get_image_post'));
            add_action('templaza_video_post',array($this,'templaza_get_video_post'));
            add_action('templaza_audio_post',array($this,'templaza_get_audio_post'));
            add_action('templaza_title_post',array($this,'templaza_get_title_post'));
            add_action('templaza_meta_post',array($this,'templaza_get_meta_post'));
            add_action('templaza_link_post',array($this,'templaza_get_link_post'));
            add_action('templaza_quote_post',array($this,'templaza_get_quote_post'));
            add_action('templaza_excerpt_post',array($this,'templaza_get_excerpt_post'));
            add_action('templaza_readmore_post',array($this,'templaza_get_readmore_post'));
            add_action('templaza_single_title_post',array($this,'templaza_single_get_title_post'));
            add_action('templaza_single_meta_post',array($this,'templaza_single_get_meta_post'));
            add_action('templaza_single_tag_post',array($this,'templaza_single_get_tag_post'));
            add_action('templaza_single_next_post',array($this,'templaza_single_get_next_post'));
            add_action('templaza_single_author_post',array($this,'templaza_single_get_author_post'));
            add_action('templaza_single_related_post',array($this,'templaza_single_get_related_post'));
        }
        public function templaza_modify_contact_methods($profile_fields)
        {
            $profile_fields['job'] = 'Job';
            $profile_fields['facebook'] = __('Facebook URL','templaza-elements');
            $profile_fields['twitter'] = __('Twitter URL','templaza-elements');
            $profile_fields['instagram'] = __('Instagram URL','templaza-elements');
            $profile_fields['dribbble'] = __('Dribbble URL','templaza-elements');
            $profile_fields['linkedin'] = __('Linkedin URL','templaza-elements');
            $profile_fields['pinterest'] = __('Pinterest URL','templaza-elements');
            $profile_fields['youtube'] = __('Youtube URL','templaza-elements');
            $profile_fields['vimeo'] = __('Vimeo URL','templaza-elements');
            $profile_fields['flickr'] = __('Flickr URL','templaza-elements');
            $profile_fields['tumblr'] = __('Tumblr URL','templaza-elements');
            $profile_fields['whatsapp'] = __('WhatsApp URL','templaza-elements');
            return $profile_fields;
        }

        public function templaza_getPostViews($postID)
        {
            $count_key = 'post_views_count';
            $count = get_post_meta($postID, $count_key, true);
            if ($count == '') { // If such views are not
                delete_post_meta($postID, $count_key);
                add_post_meta($postID, $count_key, '0');
                echo esc_html__('View: 0','templaza-elements'); // return value of 0
            }else{
                echo esc_html__('Views:','templaza-elements').' '.$count;
            }
        }

        function templaza_setPostViews($postID)
        {
            $count_key = 'post_views_count';
            $count = get_post_meta($postID, $count_key, true);
            if ($count == '') {
                $count = 0;
                delete_post_meta($postID, $count_key);
                add_post_meta($postID, $count_key, '0');
            } else {
                $count++; // Incremental view
                update_post_meta($postID, $count_key, $count); // update count
            }
        }

        public function templaza_getCommentCountPost()
        {
            $templaza_comment_count = wp_count_comments(get_the_ID());
            $templaza_cm_total = $templaza_comment_count->total_comments;
            if ($templaza_cm_total == ''|| $templaza_cm_total==0) {
                echo esc_html__('Comment: 0','templaza-elements');
            }else{
                echo esc_html__('Comments:','templaza-elements').' '.$templaza_cm_total;
            }
        }

        public function templaza_wpkses_post_tags( $tags, $context ) {
            if ( 'post' === $context ) {
                $tags['iframe'] = array(
                    'src'             => true,
                    'height'          => true,
                    'width'           => true,
                    'frameborder'     => true,
                    'allowfullscreen' => true,
                );
            }

            return $tags;
        }

        public function templaza_mime_types( $mimes ){
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        }

        public function templaza_pagination() {
            the_posts_pagination( array(
                'type' => 'plain',
                'mid_size' => 2,
                'prev_text' => ent2ncr('<i class="fa fa-angle-double-left"></i>'),
                'next_text' => ent2ncr('<i class="fa fa-angle-double-right"></i>'),
                'screen_reader_text' => '',
            ) );
        }
        public function templaza_edit_post_link($link, $post_id, $text) {
            if ( is_admin() ) {
                return $link;
            }

            $edit_url = get_edit_post_link( $post_id );

            if ( ! $edit_url ) {
                return;
            }

            $text = sprintf(
                wp_kses(
                /* translators: %s: Post title. Only visible to screen readers. */
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'templaza-elements' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title( $post_id )
            );

            return '<span class="post-edit"><i class="fas fa-edit"></i><a href="' . esc_url( $edit_url ) . '">' . $text . '</a></span>';
        }

        public function templaza_get_share_social () {
            Templates::load_my_layout('template-parts.content-share',true,false);
        }

        public function templaza_breadcrumbs() {
            Templates::load_my_layout('template-parts.breadcrumb_html');
        }

        public function templaza_get_gallery_post() {
            Templates::load_my_layout('template-parts.content-gallery',true,false);
        }

        public function templaza_get_image_post() {
            Templates::load_my_layout('template-parts.content-image',true,false);
        }

        public function templaza_get_video_post() {
            Templates::load_my_layout('template-parts.content-video',true,false);
        }

        public function templaza_get_audio_post() {
            Templates::load_my_layout('template-parts.content-audio',true,false);
        }

        public function templaza_get_title_post() {
            Templates::load_my_layout('template-parts.content-title',true,false);
        }

        public function templaza_get_meta_post() {
            Templates::load_my_layout('template-parts.content-meta',true,false);
        }

        public function templaza_get_link_post() {
            Templates::load_my_layout('template-parts.content-link',true,false);
        }

        public function templaza_get_quote_post() {
            Templates::load_my_layout('template-parts.content-quote',true,false);
        }

        public function templaza_get_excerpt_post() {
            Templates::load_my_layout('template-parts.content-excerpt',true,false);
        }

        public function templaza_get_readmore_post() {
            Templates::load_my_layout('template-parts.content-readmore',true,false);
        }

        public function templaza_single_get_title_post() {
            Templates::load_my_layout('template-parts.content-single-title',true,false);
        }

        public function templaza_single_get_meta_post() {
            Templates::load_my_layout('template-parts.content-single-meta',true,false);
        }

        public function templaza_single_get_tag_post() {
            Templates::load_my_layout('template-parts.content-single-tag',true,false);
        }

        public function templaza_single_get_next_post() {
            Templates::load_my_layout('template-parts.content-single-next-preview',true,false);
        }

        public function templaza_single_get_author_post() {
            Templates::load_my_layout('template-parts.content-single-author',true,false);
        }

        public function templaza_single_get_related_post() {
            Templates::load_my_layout('template-parts.content-single-related',true,false);
        }


    }

    $templaza_template_function = new Template_Function();

}
