<?php
/*
Plugin Name: HGF Facebook Video Channel
Description: Creates custom post type for video channel
Plugin URI: http://operationhope.org
Author: Operation HOPE
Author URI: http://operationhope.org
Version: 1.0
License: GPL2
*/

/*

    Copyright (C) 2016  Operation HOPE

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


    /**
    * Registers a new post type
    * @uses $wp_post_types Inserts new post type object into the list
    *
    * @param string  Post type key, must not exceed 20 characters
    * @param array|string  See optional args description above.
    * @return object|WP_Error the registered post type object, or an error object
    */
function hgf_video_channel_create_post_type()
{
    
    $labels = array(
    'name'                => __('Channel', 'hgf_video'),
    'singular_name'       => __('Video', 'hgf_video'),
    'add_new'             => _x('Add New Video', 'hgf_video', 'hgf_video'),
    'add_new_item'        => __('Add New Video', 'hgf_video'),
    'edit_item'           => __('Edit Video', 'hgf_video'),
    'new_item'            => __('New Video', 'hgf_video'),
    'view_item'           => __('View Video', 'hgf_video'),
    'search_items'        => __('Search Channel', 'hgf_video'),
    'not_found'           => __('No Channel found', 'hgf_video'),
    'not_found_in_trash'  => __('No Channel found in Trash', 'hgf_video'),
    'parent_item_colon'   => __('Parent Video:', 'hgf_video'),
    'menu_name'           => __('Channel', 'hgf_video'),
    );
    
    $args = array(
    'labels'                   => $labels,
    'hierarchical'        => false,
    'description'         => 'description',
    'taxonomies'          => array('category', 'Channel'),
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => null,
    'menu_icon'           => 'dashicons-format-video',
    'show_in_nav_menus'   => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'has_archive'         => true,
    'query_var'           => true,
    'can_export'          => true,
    'rewrite'             => array('slug' => 'Channel'),
    'capability_type'     => 'post',
    'supports'            => array(
        'title', 'editor', 'author', 'thumbnail',
        'excerpt','custom-fields', 'trackbacks', 'comments',
        'revisions', 'page-attributes', 'post-formats'
        )
    );
    
    register_post_type('hgf_video', $args);
}
    
add_action('init', 'hgf_video_channel_create_post_type');

function hgf_video_channel_flush_rewrites()
{
    hgf_video_channel_create_post_type();
    flush_rewrite_rules();
}

register_deactivation_hook(__FILE__, 'hgf_video_channel_flush_rewrites');
register_activation_hook(__FILE__, 'hgf_video_channel_flush_rewrites');

