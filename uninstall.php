<?php

/*  @package DaltonPlugin
 *
 *
 * @category Core
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

// $books = get_posts(array('posts_type' => 'book', 'numberposts' => -1));

// foreach ($books as $book) {
//     wp_delete_post($book->ID, true);
// }
//access data via sql
global $wpdb;

$wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book'");

$wpdb->query('DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT if FROM wp_posts )');

$wpdb->query('DELETE FROM wp_term_relationships WHERE post_id NOT IN (SELECT if FROM wp_posts )');
