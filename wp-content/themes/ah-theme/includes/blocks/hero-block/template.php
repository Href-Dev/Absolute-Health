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

$background_image = $data['background_image'];
$gradient_overlay = $data['gradient_overlay'];
$heading = $data['heading'];
$subtext = $data['subtext'];

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
    <div class="image-container">
        <?php echo acf_img($background_image, 'background-image'); ?>
        <?php echo acf_img($gradient_overlay, 'gradient-overlay'); ?>
    </div>
    <div class="site-container">
        <?php if ($heading) : ?>
            <h1 class="h1 heading"><em><?php echo $heading; ?></em></h1>
        <?php endif; ?>
        <?php if ($subtext) : ?>
            <div class="subtext">
                <?php echo $subtext; ?>
            </div>
        <?php endif; ?>
    </div>
</section>