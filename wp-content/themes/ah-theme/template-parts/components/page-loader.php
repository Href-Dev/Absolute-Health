<?php  

$page_loader_fields = get_field('page_loader_fields', 'option');
$main_colours_background = null;
$first_background_image = null;
$second_background_image = null;
$left_heading_1 = null;
$left_subtext_1 = null;
$right_subtext_2 = null;
$centred_text_3 = null;
$image_1_4 = null;
$image_2_4 = null;
$left_text_4 = null;
$right_text_4 = null;
$top_image_6 = null;
$bottom_image_6 = null;

if ($page_loader_fields) {
    $main_colours_background = $page_loader_fields['main_colours_background'];
    $first_background_image = $page_loader_fields['first_background_image'];
    $second_background_image = $page_loader_fields['second_background_image'];
    $left_heading_1 = $page_loader_fields['left_heading_1'];
    $left_subtext_1 = $page_loader_fields['left_subtext_1'];
    $right_subtext_2 = $page_loader_fields['right_subtext_2'];
    $centred_text_3 = $page_loader_fields['centred_text_3'];
    $image_1_4 = $page_loader_fields['image_1_4'];
    $image_2_4 = $page_loader_fields['image_2_4'];
    $left_text_4 = $page_loader_fields['left_text_4'];
    $right_text_4 = $page_loader_fields['right_text_4'];
    $top_image_6 = $page_loader_fields['top_image_6'];
    $bottom_image_6 = $page_loader_fields['bottom_image_6'];

    $page_link_top_left = $page_loader_fields['page_link_top_left'];
    $page_link_bottom_left = $page_loader_fields['page_link_bottom_left'];
    $page_link_top_right = $page_loader_fields['page_link_top_right'];
    $page_link_bottom_right = $page_loader_fields['page_link_bottom_right'];
}
?>

<div class="page-loader-container stage-13">
    <?php if ($main_colours_background) : ?>
        <div class="background background--colours">
            <?php echo acf_img($main_colours_background, 'image image--colours') ?>
        </div>
    <?php endif; ?>
    <?php if ($first_background_image) : ?>
        <div class="background background--spiral">
            <?php echo acf_img($first_background_image, 'image image--spiral') ?>
        </div>
    <?php endif; ?>
    <?php if ($second_background_image) : ?>
        <div class="background background--petals">
            <?php echo acf_img($second_background_image, 'image image--petals') ?>
        </div>
    <?php endif; ?>
    <div class="page-loader">
        <div class="dots-container active">
            <span class="dot dot-left"></span>
            <span class="dot dot-right"></span>
            <span class="dot dot-top"></span>
            <span class="line line-2"></span>
            <?php echo acf_link($page_link_top_left, 'h1 link-el link-el__tl'); ?>
            <?php echo acf_link($page_link_bottom_left, 'h1 link-el link-el__bl'); ?>
            <?php echo acf_link($page_link_top_right, 'h1 link-el link-el__tr'); ?>
            <?php echo acf_link($page_link_bottom_right, 'h1 link-el link-el__br'); ?>
        </div>
    </div>
    <div class="stage-4">
        <div class="site-container">
            <div class="text-container">
                <?php if ($left_heading_1) : ?>
                    <h1 class="heading large">
                        <strong><em>
                            <?php echo $left_heading_1; ?>   
                        </em></strong>
                    </h1>
                <?php endif; ?>
                <?php if ($left_subtext_1) : ?>
                    <div class="subtext h3">
                        <?php echo $left_subtext_1; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="stage-5">
        <div class="site-container">
            <div class="text-container">
                <?php if ($right_subtext_2) : ?>
                    <div class="subtext h3">
                        <?php echo $right_subtext_2; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="stage-6">
        <div class="site-container">
            <div class="text-container">
                <?php if ($centred_text_3) : ?>
                    <h2 class="h1 x-large">
                        <strong><em>
                        <?php echo $centred_text_3; ?> 
                        </em></strong>
                    </h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="stage-7">
        <div class="site-container">
            <div class="image-container image-top">
                <?php echo acf_img($image_1_4, 'image image--top') ?>
            </div>
            <div class="image-container image-bottom">
                <?php echo acf_img($image_2_4, 'image image--bottom') ?>
            </div>
        </div>
    </div>
    <div class="stage-8">
        <div class="site-container">
            <h2 class="text-container">
                <?php if ($left_text_4) : ?>
                    <span class="left-text h1 x-large">
                        <?php echo $left_text_4; ?>
                    </span>
                <?php endif; ?>
                <?php if ($right_text_4) : ?>
                    <span class="right-text h1 x-large">
                        <?php echo $right_text_4; ?>
                    </span>
                <?php endif; ?>
            </h2>
        </div>
    </div>
    <div class="stage-9">
        <div class="site-container">
            <div class="images-container">
                <?php echo acf_img($top_image_6, 'image image--top') ?>
                <?php echo acf_img($bottom_image_6, 'image image--bottom') ?>
            </div>
        </div>
    </div>
</div>