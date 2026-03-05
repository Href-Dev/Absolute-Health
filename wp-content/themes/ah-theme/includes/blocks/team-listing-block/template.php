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

// Default query configuration for the team listing block.
$post_type      = 'team-member';
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

$team_members = new WP_Query(
    array(
        'post_type'      => $post_type,
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
        'orderby'        => 'date',
        'order'          => 'DESC',
    )
);

?>

<!-- Our front-end template -->
 <?php if ($team_members->have_posts()) : ?>
    <section
        id="<?php echo $block_id; ?>" 
        class="<?php echo $class_name; ?>"
    >
        <div class="site-container">
            <?php if ($heading) : ?>
                <div class="h2 heading">
                    <?php echo $heading; ?>
                </div>
            <?php endif; ?>
            <div
                class="team-members ajax-post-listing-container"
                data-post-type="<?php echo esc_attr($post_type); ?>"
                data-posts-per-page="<?php echo esc_attr($posts_per_page); ?>"
                data-current-page="<?php echo esc_attr($paged); ?>"
                data-max-pages="<?php echo esc_attr($team_members->max_num_pages); ?>"
                data-template-base="<?php echo esc_attr('team'); ?>"
                data-template-name="<?php echo esc_attr('card'); ?>"
            >
                <div class="post-listing-grid">
                    <?php while ($team_members->have_posts()) : $team_members->the_post(); ?>
                        <?php get_template_part('template-parts/cards/team', 'card', array('post_id'=>get_the_ID())); ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>