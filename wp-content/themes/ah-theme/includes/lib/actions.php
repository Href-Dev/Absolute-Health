<?php
// Remove actions.
remove_action('wp_head', 'print_emoji_detection_script', 7);

// Add actions.
add_action('wp_footer', 'print_emoji_detection_script', 7);
add_action('wp_enqueue_scripts', 'script_enqueues');
add_action('acf/init', 'acf_add_maps_api_key');
// add_action('acf/init', 'acf_register_blocks');
add_action('admin_head', 'editor_full_width_gutenberg');

// AJAX: Load more posts for listing blocks.
add_action('wp_ajax_ah_load_more_posts', 'ah_load_more_posts');
add_action('wp_ajax_nopriv_ah_load_more_posts', 'ah_load_more_posts');

/**
 * AJAX handler for loading additional posts for listing blocks.
 * Expects:
 * - nonce             : security nonce.
 * - post_type         : post type slug.
 * - posts_per_page    : number of posts per page.
 * - page              : paged value to load.
 * - template_base     : base path segment for card template (e.g. "news", "team").
 * - template_name     : template name/variant (e.g. "card").
 */
function ah_load_more_posts() {
    check_ajax_referer('ah_load_more', 'nonce');

    $post_type      = isset($_POST['post_type']) ? sanitize_text_field(wp_unslash($_POST['post_type'])) : 'post';
    $posts_per_page = isset($_POST['posts_per_page']) ? (int) $_POST['posts_per_page'] : 6;
    $page           = isset($_POST['page']) ? (int) $_POST['page'] : 1;
    $template_base  = isset($_POST['template_base']) ? sanitize_text_field(wp_unslash($_POST['template_base'])) : 'news';
    $template_name  = isset($_POST['template_name']) ? sanitize_text_field(wp_unslash($_POST['template_name'])) : 'card';

    if ($page < 1) {
        $page = 1;
    }

    if ($posts_per_page < 1 || $posts_per_page > 24) {
        $posts_per_page = 6;
    }

    $query_args = array(
        'post_type'      => $post_type,
        'posts_per_page' => $posts_per_page,
        'paged'          => $page,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $posts_query = new WP_Query($query_args);

    if ($posts_query->have_posts()) {
        ob_start();

        while ($posts_query->have_posts()) {
            $posts_query->the_post();
            get_template_part(
                'template-parts/cards/' . $template_base,
                $template_name,
                array(
                    'post_id' => get_the_ID(),
                )
            );
        }

        wp_reset_postdata();

        $html = ob_get_clean();

        wp_send_json_success(
            array(
                'html'       => $html,
                'max_pages'  => (int) $posts_query->max_num_pages,
                'found_posts'=> (int) $posts_query->found_posts,
                'page'       => $page,
            )
        );
    } else {
        wp_reset_postdata();
        wp_send_json_error(
            array(
                'message' => 'No posts found',
            )
        );
    }

    wp_die();
}

/**
 * admin AJAX function example
 * add_action('wp_ajax_example_admin_ajax', 'example_admin_ajax');
 * add_action('wp_ajax_nopriv_example_admin_ajax', 'example_admin_ajax');
 */


 //disable plugin access for non admin users
 function restrict_plugin_access_for_non_admins() {
    if (!current_user_can('administrator')) {
        // Remove plugin menu page for non-admin users
        remove_menu_page('plugins.php');

        // Prevent direct access to plugin admin pages
        if (isset($_GET['page']) && strpos($_GET['page'], 'plugins') !== false) {
            wp_redirect(admin_url());
            exit;
        }
    }
}
add_action('admin_menu', 'restrict_plugin_access_for_non_admins', 100);
