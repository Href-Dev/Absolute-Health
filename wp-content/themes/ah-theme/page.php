<?php get_header(); ?>
<article <?php post_class('blocks'); ?>>
  <?php 
    if (have_posts()) : while (have_posts()) : the_post();
      the_content(); 
    endwhile; endif;

  ?>

  <!-- <div class="news-container hidden">
    <div class="site-container flex items-center justify-center">
      <div class="inner-container max-w-[1180px] grid md:grid-cols-2 gap-x-24">
        <?php get_template_part('template-parts/cards/news', 'card', array('post_id'=>106)); ?>
      </div>
    </div>
  </div>
  -->
  <div class="cs-container hidden">
    <div class="site-container flex items-center justify-center">
      <div class="inner-container max-w-[1440px] grid gap-24">
        <?php get_template_part('template-parts/cards/cs', 'card', array('post_id'=>109)); ?>
        <?php get_template_part('template-parts/cards/cs', 'card', array('post_id'=>109)); ?>
      </div>
    </div>
  </div>

  <div class="cs-alt-container hidden">
    <div class="site-container flex items-center justify-center">
      <div class="inner-container max-w-[1440px] grid md:grid-cols-2 lg:grid-cols-4 gap-24">
        <?php get_template_part('template-parts/cards/cs-alt', 'card', array('post_id'=>109)); ?>
        <?php get_template_part('template-parts/cards/cs-alt', 'card', array('post_id'=>109)); ?>
        <?php get_template_part('template-parts/cards/cs-alt', 'card', array('post_id'=>109)); ?>
        <?php get_template_part('template-parts/cards/cs-alt', 'card', array('post_id'=>109)); ?>
      </div>
    </div>
  </div>
  <!--

  <div class="cs-alt-container hidden">
    <div class="site-container flex items-center justify-center">
      <div class="inner-container max-w-[1440px] grid md:grid-cols-2 lg:grid-cols-3 gap-24">
        <?php get_template_part('template-parts/cards/team', 'card', array('post_id'=>99)); ?>
        <?php get_template_part('template-parts/cards/team', 'card', array('post_id'=>99)); ?>
        <?php get_template_part('template-parts/cards/team', 'card', array('post_id'=>99)); ?>
      </div>
    </div>
  </div> -->
</article>

<?php get_footer(); ?>
