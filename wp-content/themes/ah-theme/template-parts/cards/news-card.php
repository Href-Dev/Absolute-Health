<?php 

/**
 * Controls the cards for the case study card
 */
$post_id = $args['post_id'] ?? "";
$image_url = get_field('image', $post_id)['url'] ?? get_the_post_thumbnail_url($post_id);
$title = get_the_title($post_id);
$categories = get_the_category($post_id);
$permalink = get_the_permalink($post_id);
$background_colour = get_field('colour', $post_id);
$category = null;
if (is_array($categories) && count($categories) > 0) {
    $category = $categories[0]->name;
}
?>
<div class="card card--news" data-animate="fade-up">
    <a href="<?php echo $permalink; ?>" class="image-container">
        <img class="image" src="<?php echo $image_url; ?>" alt="<?php echo $title; ?>">
    </a>
    <div class="text-container <?php echo $background_colour; ?>-bg">
        <?php if ($category) : ?>
            <p class="category">
                <strong><em><?php echo $category; ?></em></strong>
            </p>
        <?php endif; ?>
        <h4 class="h4 title"><?php echo $title; ?></h4>
        <a href="<?php echo $permalink; ?>" class="btn btn--dark">Read More</a>
    </div>
</div>
