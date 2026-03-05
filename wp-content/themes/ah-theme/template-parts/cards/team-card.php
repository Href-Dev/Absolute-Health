<?php 

/**
 * Controls the cards for the case study card
 */
$post_id  = $args['post_id'] ?? "";
$image_url = get_field('image', $post_id)['url'] ?? get_the_post_thumbnail_url($post_id);
$title    = get_the_title($post_id);
$subtext  = get_field('subtext', $post_id);
$role     = get_field('role', $post_id);
?>
<div class="card card--team" data-animate="fade-up">
    <div class="image-container">
        <img class="image" src="<?php echo $image_url; ?>" alt="<?php echo $title; ?>">
    </div>

    <div class="card-overlay">
        <div class="text-container" data-team-card-overlay>
            <h4 class="h4 title">
                <?php echo $title; ?>
            </h4>

            <?php if ($role) : ?>
                <p class="role">
                    <strong><em><?php echo $role; ?></em></strong>
                </p>
            <?php endif; ?>

            <?php if ($subtext) : ?>
                <div class="subtext" data-team-card-subtext>
                    <?php echo $subtext; ?>
                </div>
            <?php endif; ?>

            <?php if ($subtext) : ?>
                <button class="card-toggle" type="button" data-team-card-toggle>
                    <span class="label-read">Read more</span>
                    <span class="label-close">X</span>
                </button>
            <?php endif; ?>
        </div>
    </div>
</div>
