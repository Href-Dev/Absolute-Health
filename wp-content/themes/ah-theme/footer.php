<?php
$email_address = get_field('email_address', 'option');
$social_media = get_field('social_media', 'option');
$slogan = get_field('slogan', 'option');
$company_name = get_field('company_name', 'option');
$address = get_field('address', 'option');
$copyright_text = get_field('copyright_text', 'option');

?>
<?php if (get_page_template_slug() !== 'page-page-loader-page.php') : ?>
<footer class="site-footer">
    <div class="site-container">
        <?php if ($slogan) : ?>
            <div class="top-container">
                <p class="slogan h2">
                    <?php echo $slogan; ?>
                </p>
            </div>
        <?php endif; ?>
        <div class="mid-container">
            <div class="left-container">
                <?php if ($email_address) : ?>
                    <a class="email-address h3" href="mailto:<?php echo $email_address; ?>">
                        <?php echo $email_address; ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="right-container">
                <?php if ($company_name) : ?>
                    <p class="company-name">
                        <?php echo $company_name; ?>
                    </p>
                <?php endif; ?>
                <?php if ($address) : ?>
                    <p class="address">
                        <?php echo $address; ?>
                    </p>
                <?php endif; ?>
                <p class="copyright-text">
                    © <?php echo get_bloginfo('name'); ?> <?php echo date('Y'); ?><?php if ($copyright_text) echo '  |  '. $copyright_text; ?>
                </p>
            </div>
        </div>
        <div class="bottom-container">
            <?php if ($social_media) : ?>
                <div class="social-media">
                    <?php foreach ($social_media as $item) :
                        $icon = $item['icon'];
                        $url = $item['url'];
                    ?>
                        <a class="social-media-item-link" href="<?php echo $url; ?>">
                            <?php echo acf_img($icon, 'icon'); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php
            echo wp_nav_menu([
                'theme_location' => 'legal_menu',
                'menu_class' => 'site-footer__menu',
                'container' => false
            ]);
            ?>
        </div>
    </div>
</footer>
<?php endif; ?>
</article>
<?php wp_footer(); ?>
</body>

</html>