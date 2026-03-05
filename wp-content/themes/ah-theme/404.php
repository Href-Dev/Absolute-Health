<?php get_header(); 



$gradient_url = get_template_directory_uri() . '/assets/post-hero-background-img.svg';
?>

<div class="site-page">
    <section
      id="post-hero"
      class="hero-block has-background colour--purple-bg">
      <div class="image-container">
          <img class="gradient-overlay" src="<?php echo $gradient_url; ?>" alt="<?php echo $title; ?> | Gradient Overlay">
      </div>
      <div class="site-container">
          <h1 class="h1 heading">
            <strong><em>404: Page Not Found</em></strong>
          </h1>
          <div class="subtext">
              <p>
              Oops! The page you are looking for doesn't exist or has been moved.<br>
              </p>
              <p>Please check the page link is correct, or return to the homepage.
              </p>
              <a class="btn btn--white mt-24" href="/">Back home</a>
          </div>
      </div>
  </section>
</div>

<?php get_footer(); ?>
