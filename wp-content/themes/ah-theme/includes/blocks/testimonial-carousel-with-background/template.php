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
$testimonials = $data['testimonials'];

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
    <div class="background-container">
        <?php echo acf_img($background_image, 'background-image') ?>
    </div>
    <div class="site-container">
        <div class="testimonials-carousel swiper" data-swiper-type="testimonials">
            <div class="swiper-wrapper">
                <?php foreach ($testimonials as $testimonial) : 
                    $quote = get_field('quote', $testimonial);
                    $quote_author = get_field('quote_author', $testimonial);
                ?>
                    <div class="testimonial swiper-slide">
                        <div class="quote-icon">
                            <svg width="70" height="51" viewBox="0 0 70 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.73 44.27C2.88 46.45 4.55 48.08 6.73 49.17C8.9 50.26 11.35 50.8 14.07 50.8C18.01 50.8 21.21 49.65 23.66 47.33C26.11 45.02 27.33 42.16 27.33 38.76C27.33 35.09 26.11 32.17 23.66 29.99C21.21 27.82 18.22 26.73 14.68 26.73C12.5 26.73 10.7 27.04 9.27 27.65C7.84 28.26 6.58 29.59 5.5 31.63L8.56 31.83C9.51 28.43 11.11 25.34 13.35 22.55C15.59 19.76 18.38 17.11 21.71 14.59C25.04 12.08 28.75 9.66 32.83 7.35L23.87 0C21.29 1.77 18.8 3.74 16.42 5.92C14.04 8.1 11.83 10.41 9.79 12.86C7.75 15.31 6.02 17.79 4.59 20.31C3.16 22.83 2.04 25.41 1.22 28.06C0.4 30.71 0 33.4 0 36.12C0 39.38 0.58 42.11 1.73 44.28M38.15 44.27C39.37 46.45 41.07 48.08 43.25 49.17C45.42 50.26 47.81 50.8 50.39 50.8C54.47 50.8 57.7 49.65 60.08 47.33C62.46 45.02 63.65 42.16 63.65 38.76C63.65 35.09 62.46 32.17 60.08 29.99C57.7 27.82 54.74 26.73 51.21 26.73C49.03 26.73 47.23 27.04 45.8 27.65C44.37 28.26 43.11 29.59 42.03 31.63L44.89 31.83C45.98 28.43 47.64 25.34 49.89 22.55C52.13 19.76 54.89 17.11 58.15 14.59C61.41 12.08 65.09 9.66 69.17 7.35L60.18 0C57.6 1.77 55.11 3.74 52.73 5.92C50.35 8.1 48.17 10.41 46.2 12.86C44.23 15.31 42.49 17.79 41 20.31C39.5 22.83 38.35 25.41 37.53 28.06C36.71 30.71 36.31 33.4 36.31 36.12C36.31 39.38 36.92 42.11 38.15 44.28" fill="white"/>
                            </svg>
                        </div>
                        <?php if ($quote) : ?>
                            <h3 class="quote-text">
                                <?php echo $quote; ?>
                            </h3>
                        <?php endif; ?>
                        <?php if ($quote_author) : ?>
                            <div class="quote-author">
                                <?php echo $quote_author; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>