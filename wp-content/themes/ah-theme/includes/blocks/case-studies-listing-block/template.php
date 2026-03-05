<?php
/**
 * Block Name: My First Block
 *
 * Description: Displays my very first block.
 */

/**
 * Block object provided by Wordpress
 */
$block = $args['block'] ?? false;

/**
 * Data passed to the block template as an arg and extracted
 * into variables
 */
$data = $args['data'];

$heading = $data['heading'];

// Default query configuration for the news listing block.
$post_type      = 'case-study';
$posts_per_page = 6;
$paged          = 1;

/**
 * Unique block identifier added to the block
 */
$block_id = $args['block_id'] ?? false;

/**
 * The block class names we passed to the
 * argument for the block
 */
$class_name = $args['class_name'];


if ($block && $block_id && isset($block['ghostkit']['styles']) && $spacings = $block['ghostkit']['styles']) {
    addGhostKitSpacings($spacings, $block_id);
}


?>

<!-- Our front-end template -->
<section
    id="<?php echo $block_id; ?>" 
    class="<?php echo $class_name; ?>"
>
    <div class="site-container">
        <?php if($heading): ?>
            <h2 class="mb-48"><?php echo $heading; ?></h2>
        <?php endif; ?>
        <?php
            $news_posts = new WP_Query(array(
                'post_type'      => $post_type,
                'posts_per_page' => $posts_per_page,
                'paged'          => $paged,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));
        ?>
        <div
            id="case-studies-post-listing-container"
            class="case-studies-post-listing-container ajax-post-listing-container"
            data-post-type="<?php echo esc_attr($post_type); ?>"
            data-posts-per-page="<?php echo esc_attr($posts_per_page); ?>"
            data-current-page="<?php echo esc_attr($paged); ?>"
            data-max-pages="<?php echo esc_attr($news_posts->max_num_pages); ?>"
            data-template-base="<?php echo esc_attr('cs'); ?>"
            data-template-name="<?php echo esc_attr('card'); ?>"
        >
            <?php if($news_posts->have_posts()): ?>
                <div class="post-listing-grid">
                    <?php while($news_posts->have_posts()): $news_posts->the_post(); ?>
                        <?php get_template_part('template-parts/cards/cs', 'card', [
                            'post_id' => get_the_ID(),
                        ]); ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php else: ?>
                <div class="no-posts">
                    <p>No posts found</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>