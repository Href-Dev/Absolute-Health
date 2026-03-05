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

$flipped_layout = $data['flipped_layout'];
$heading = $data['heading'];
$subtext = $data['subtext'];
$image = $data['image'];

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
    <div class="site-container <?php echo $flipped_layout ? 'flipped-layout' : ''; ?>" data-animate>
        <div class="image-container">
            <?php echo acf_img($image, 'image'); ?>
        </div>
        <div class="text-container">
            <?php if ($heading) : ?>
                <div class="h2 heading-container">
                    <?php echo $heading; ?>
                </div>
            <?php endif; ?>
            <?php if ($subtext) : ?>
                <div class="subtext">
                    <?php echo $subtext; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>