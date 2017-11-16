<?php
/*
Plugin Name: Slabb Theme Plugin
Plugin URI: 
Description: Create Custom taxonomy and Custom post types for the Slabb Theme
Version: 1.0
Author: GrawixThemes
Author URI: http://slabb-wp.themes.grawix.com/
License: GPLv2
Text domain: slabb
Domain Path: /languages
*/

/*  Copyright 2017  GrawixThemes

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
    
require_once( ABSPATH . '/wp-admin/includes/taxonomy.php' );
require_once( plugin_dir_path( __FILE__ ) . '/includes/slabb-custom-posts.php' );


// create custom taxonomy
add_action( 'init', 'slabb_add_tax', 0 );
function slabb_add_tax() {
    $labels = array(
        'name'                   => esc_html__( 'Projects categories', 'slabb' ),
        'singular_name'          => esc_html__( 'Projects category', 'slabb' ),
        'menu_name'              => esc_html__( 'Categories', 'slabb' ),
        'all_items'              => esc_html__( 'Categories', 'slabb' ),
        'parent_item'            => esc_html__( 'Parent Projects category', 'slabb' ),
        'parent_item_colon'      => esc_html__( 'Parent Project category:', 'slabb' ),
        'new_item_name'          => esc_html__( 'New category', 'slabb' ),
        'add_new_item'           => esc_html__( 'Add new category', 'slabb' ),
        'edit_item'              => esc_html__( 'Edit new category', 'slabb' ),
        'update_item'            => esc_html__( 'Update category', 'slabb' ),
        'search_items'           => esc_html__( 'Search', 'slabb' ),
        'add_or_remove_items'    => esc_html__( 'Add or remove category', 'slabb' ),
        'choose_from_most_used'  => esc_html__( 'Find from most used', 'slabb' ),
        'not_found'              => esc_html__( 'Not found', 'slabb' )
    );
    $args = array(
        'labels'                 => $labels,
        'hierarchical'           => true,
        'public'                 => true,
    );
    register_taxonomy( 'slabb_projects_tax', array( 'slabb_project' ), $args );
}

// create custom posts
add_action( 'init', 'slabb_custom_posts' );
function slabb_custom_posts(){
    slabb_project_post_type();
    slabb_testimonial_post_type();
    slabb_package_post_type();
    slabb_service_post_type();
};

function slabb_show_contactform(){
    
    $slabb_form = '<form id="form-message" class="form">';
    $slabb_form .= '<div class="form__item">';
    $slabb_form .= '<input id="contacts-author" class="name required input input_placeholder" type="text" name="name">';
    $slabb_form .= '<label class="label_placeholder label_required" for="contacts-author">%1$s</label>';
    $slabb_form .= '</div>';
    $slabb_form .= ' <div class="form__item">';
    $slabb_form .= '<input id="contacts-email" class="email required input input_placeholder" type="email" name="email">';
    $slabb_form .= '<label class="label_placeholder label_required" for="contacts-email">%2$s</label>';
    $slabb_form .= '</div>';
    $slabb_form .= '<div class="form__item">';
    $slabb_form .= '<textarea id="contacts-message" class="message input input_placeholder" name="message"></textarea>';
    $slabb_form .= '<label class="label_placeholder" for="contacts-message">%3$s</label>';
    $slabb_form .= '</div>';
    $slabb_form .= '<div class="form__item">';
    $slabb_form .= '<button class="btn btn_cta btn_wide btn_test" type="submit">%4$s</button>';
    $slabb_form .= '</div>';
    $slabb_form .= '</form>';

    return $slabb_form;
};

function slabb_show_popupform(){
    $slabb_form = '<form class="form">';
    $slabb_form .= '<div class="form__item">';
    $slabb_form .= '<input id="contacts-author_p" class="name required input input_placeholder" type="text" name="name">';
    $slabb_form .= '<label class="label_placeholder label_required" for="contacts-author_p">%1$s</label>';
    $slabb_form .= '</div>';
    $slabb_form .= '<div class="form__item">';
    $slabb_form .= '<input id="contacts-email_p" class="email required input input_placeholder" type="email" name="email">';
    $slabb_form .= '<label class="label_placeholder label_required" for="contacts-email_p">%2$s</label>';
    $slabb_form .= '</div>';
    $slabb_form .= '<div class="form__item">';
    $slabb_form .= '<input id="contacts-subject" class="subject required input input_placeholder" type="text" name="subject">';
    $slabb_form .= '<label class="label_placeholder label_required" for="contacts-subject">%3$s</label>';
    $slabb_form .= '</div>';
    $slabb_form .= '<div class="form__item">';
    $slabb_form .= '<textarea id="contacts-message_p" class="message input input_placeholder" name="message"></textarea>';
    $slabb_form .= '<label class="label_placeholder" for="contacts-message_p">%4$s</label>';
    $slabb_form .= '</div>';
    $slabb_form .= '<div class="form__item">';
    $slabb_form .= '<button class="btn btn_cta btn_wide" type="submit">%5$s</button>';
    $slabb_form .= '</div>';
    $slabb_form .= '</form>';

    return $slabb_form;
};


// sendmail handler
add_action( 'wp_ajax_sendmail', 'slabb_sendmail_contact' );
add_action( 'wp_ajax_nopriv_sendmail', 'slabb_sendmail_contact' );
function slabb_sendmail_contact(){
    $slabb_settings_options    = fw_get_db_settings_option();
    $slabb_recepient           = $slabb_settings_options['email'];
    $slabb_subject             = esc_html__( 'New contact from ', 'slabb' ) . get_bloginfo( 'name' );
    $slabb_charset             = get_bloginfo( 'charset' );

    $slabb_visitor_name        = sanitize_text_field( $_POST['name'] );
    $slabb_visitor_email       = sanitize_email( $_POST['email'] );
    $slabb_visitor_message     = sanitize_text_field( $_POST['message'] );
    $slabb_visitor_subject     = sanitize_text_field( $_POST['subject'] );
    $slabb_subject             = ( $slabb_visitor_subject ) ? $slabb_visitor_subject : $slabb_subject;

       
    $slabb_recepient   = ( empty( $slabb_recepient ) ) ? get_bloginfo( 'admin_email' ) : $slabb_recepient;
    $slabb_message     = ( empty( $slabb_visitor_message ) ) ? esc_html__( 'no message' , 'slabb' ) : $slabb_visitor_message;

    $slabb_msg = esc_html__( 'Name: ', 'slabb' ) .  $slabb_visitor_name . '<br><br>';
    $slabb_msg .= esc_html__( 'Email: ', 'slabb' ) .  $slabb_visitor_email . '<br><br>';
    $slabb_msg .= esc_html__( 'Message: ', 'slabb' ) .  $slabb_message;
    
    add_filter( 'wp_mail_from', 'slabb_from_email' );
    add_filter( 'wp_mail_from_name', 'slabb_from_name' );
    function slabb_from_name( $name ) { return get_bloginfo('name'); };
    function slabb_from_email( $email ) {
        $slabb_opt              = fw_get_db_settings_option();
        $slabb_replace_email    =  ( !empty( $slabb_opt['email'] ) ) ? $slabb_opt['email'] : get_bloginfo( 'admin_email' );
        return $slabb_replace_email; 
  };

    wp_mail( $slabb_recepient, $slabb_subject, $slabb_msg, "X-Mailer: PHP/" . phpversion() . "\r\n" . "Content-type: text/html; charset=\"UTF-8\"");
      wp_die();   
};

// add Open Graph markup for Facebook share button
add_action( 'wp_head', 'slabb_add_opengraph' );
function slabb_add_opengraph(){

     $slabb_og_markup  = '<meta property="og:title" content="' . esc_html( get_the_title() ) . '"/>';
     $slabb_og_markup  .= '<meta property="og:type" content="website"/>';
     $slabb_og_markup  .= '<meta property="og:url" content="' . esc_html( get_permalink() ) . '"/>';
     $slabb_og_markup  .= '<meta property="og:image" content="' . esc_url( get_the_post_thumbnail_url() ) . '"/>';
     $slabb_og_markup  .= '<meta property="og:site_name" content="' . esc_html( get_bloginfo() ) . '"/>';
     $slabb_og_markup  .= '<meta property="og:description" content="' . esc_html( get_the_excerpt() ) . '"/>';
     $slabb_og_markup  .= '<meta property="og:locale" content="' . esc_html( get_locale() ) . '">';
         
     $slabb_string = wp_unslash( $slabb_og_markup );
       $slabb_allowed_html = array(
          'meta' => array(
              'property'  => true,
              'content'   => true,
            ),
       ); 
                          
    echo ( wp_kses( $slabb_string, $slabb_allowed_html ) );
 
};

?>