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



$args = array(
    'post_type' => 'team-member',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
);

$team_members = new WP_Query($args);

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
            <div class="team-members">
                <?php while ($team_members->have_posts()) : $team_members->the_post(); ?>
                    <?php get_template_part('template-parts/cards/team', 'card', array('post_id'=>get_the_ID())); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>