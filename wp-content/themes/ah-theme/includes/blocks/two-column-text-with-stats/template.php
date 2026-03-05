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

$subtext = $data['subtext'];
$stats = $data['stats'];

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
        <div class="left-container subtext">
            <?php echo $subtext; ?>
        </div>
        <div class="right-container">
            <div class="stats-carousel swiper" data-swiper-type='small-stats-carousel'>
                <div class="swiper-wrapper" data-animate>
                    <?php foreach ($stats as $stat) : ?>
                        <div class="swiper-slide">
                            <?php get_template_part('template-parts/components/single-stat', null, $stat); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php echo get_template_part('template-parts/components/swiper-pag', false, array('pagination_colour' => null)); ?>
        </div>
    </div>
</section>