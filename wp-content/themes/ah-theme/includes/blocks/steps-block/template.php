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
$steps = $data['steps'];

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
        <?php if ($heading) : ?>
            <div class="h2 heading-container">
                <?php echo $heading; ?>
            </div>
        <?php endif; ?>
        <?php if ($steps) : ?>
            <div class="steps-container">
                <?php foreach ($steps as $step) : ?>
                    <div class="single-step">
                        <?php if ($step['step_number_icon']) : ?>
                            <div class="step-icon">
                                <?php echo acf_img($step['step_number_icon'], 'step-icon'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($step['subtext']) : ?>
                            <div class="subtext">
                                <?php echo $step['subtext']; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>