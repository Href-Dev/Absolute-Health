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
$case_studies = $data['case_studies'];

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
            <div class="heading-container h2">
                <?php echo $heading; ?>
            </div>
        <?php endif; ?>
        <?php if ($case_studies) : ?>
            <div class="case-studies-container">
                <?php foreach ($case_studies as $case_study) :
                    get_template_part('template-parts/cards/cs-alt', 'card', array('post_id'=>$case_study));
                endforeach;
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>