<?php 

/* 
Template Slug: page-page-loader-page
Template Name: Page Loader Page Template
*/

get_header(); ?>
<article <?php post_class('blocks'); ?>>
  <?php
  if (have_posts()) : while (have_posts()) : the_post();
    the_content();
  endwhile; endif;

  get_template_part('template-parts/components/page-loader');
  ?>
</article>

<?php get_footer(); ?>
