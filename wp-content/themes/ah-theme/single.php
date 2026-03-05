<?php get_header(); 

$gradient_url = get_template_directory_uri() . '/assets/post-hero-background-img.svg';
$background_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
$title = get_the_title();
$categories = get_the_category();
$category_list = '';
if ($categories) {
    foreach ($categories as $category) {
        $category_list .= $category->name . ', ';
    }
    $category_list = rtrim($category_list, ', ');
}
?>

<section class="site-page">
    <article <?php post_class(); ?>>
        <section
            id="post-hero"
            class="hero-block">
            <div class="image-container">
                <img class="background-image" src="<?php echo $background_url; ?>" alt="<?php echo $title; ?> | Background Image">
                <img class="gradient-overlay" src="<?php echo $gradient_url; ?>" alt="<?php echo $title; ?> | Gradient Overlay">
            </div>
            <div class="site-container">
                <h1 class="h1 heading">
                    <?php the_title(); ?>
                </h1>
                <div class="subtext">
                    <p>
                        <strong>
                            <em>
                                <?php echo $category_list; ?>
                            </em>
                        </strong>
                    </p>
                </div>
            </div>
        </section>
        <section class="post-content">
            <div class="site-container flex items-center justify-between gap-10 flex-column md:flex-row pt-40 md:pt-65 lg:pt-90">
                <p class="left-text">
                    Article by: <strong><?php the_author(); ?></strong>
                </p>
                <p class="right-text">
                    <?php echo get_the_date('F j, Y'); ?>
                </p>
            </div>
        </section>
        <?php
        if (have_posts()) : while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>
        <section class="pagination">
            <div class="site-container">
                <span class="left-section">
                    <?php if ($previous_post = get_previous_post()) : ?>
                        <a href="<?php echo get_permalink($previous_post->ID); ?>" class="prev post-link">
                            <svg width="25" height="41" viewBox="0 0 25 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.6211 1.37883C21.7826 -0.459678 18.8016 -0.459542 16.9629 1.37883L1.37895 16.9628C0.506187 17.8357 0.0490036 18.966 0.00492477 20.1093C-0.0562172 21.3885 0.402075 22.6881 1.37895 23.665L16.962 39.248C18.8006 41.0866 21.7815 41.0866 23.6202 39.248C25.4588 37.4093 25.4588 34.4284 23.6202 32.5898L11.3448 20.3134L23.6211 8.03703C25.4595 6.19834 25.4597 3.21741 23.6211 1.37883Z" fill="#05063E"/>
                            </svg>
                            <span class="link-text">Previous article</span>
                        </a>
                    <?php endif; ?>
                </span>
                
                <span class="middle-section">
                    <?php echo acf_link(get_field('news_listing_page', 'option')); ?>
                </span>

                <span class="right-section">
                    <?php if ($next_post = get_next_post()) : ?>
                        <a href="<?php echo get_permalink($next_post->ID); ?>" class="next post-link">
                            <span class="link-text">Next article</span>
                            <svg width="25" height="41" viewBox="0 0 25 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.37891 39.248C3.21749 41.0866 6.19844 41.0864 8.03711 39.248L23.6211 23.6641C24.4939 22.7912 24.951 21.6609 24.9951 20.5176C25.0563 19.2384 24.598 17.9388 23.6211 16.9619L8.03809 1.37891C6.19943 -0.459759 3.21856 -0.459758 1.37989 1.37891C-0.458777 3.21757 -0.458777 6.19844 1.37989 8.03711L13.6553 20.3135L1.37891 32.5898C-0.459487 34.4285 -0.459669 37.4095 1.37891 39.248Z" fill="#05063E"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </span>
            </div>
        </section>
    </article>
</section>

<?php get_footer(); ?>