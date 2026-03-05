<?php 

/**
 * Controls the cards for the case study card
 */
$post_id = $args['post_id'] ?? "";
$image_url = get_field('image', $post_id)['url'] ?? get_the_post_thumbnail_url($post_id);
$title = get_the_title($post_id);
$excerpt = get_field('subtext', $post_id) ?? get_the_excerpt($post_id);
$categories = get_the_terms($post_id, 'case-study-category');
$permalink = get_the_permalink($post_id);
$background_colour = get_field('colour', $post_id);
$category = null;
if (is_array($categories) && count($categories) > 0) {
    $category = $categories[0]->name;
}
?>
<div class="card card--cs" data-animate="fade-up">
    <div class="text-container <?php echo $background_colour; ?>-bg">
        <?php if ($category) : ?>
            <p class="category">
                <strong><em><?php echo $category; ?></em></strong>
            </p>
        <?php endif; ?>
        <h4 class="h4 title"><?php echo $title; ?></h4>
        <div class="subtext">
            <p><?php echo $excerpt; ?></p>
        </div>
        <a href="<?php echo $permalink; ?>" class="btn btn--dark">
            Read More
        </a>
    </div>
    <a href="<?php echo $permalink; ?>" class="image-container">
        <img class="image" src="<?php echo $image_url; ?>" alt="<?php echo $title; ?>">
    </a>
</div>
