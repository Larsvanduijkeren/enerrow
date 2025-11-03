<?php
$footer_text = get_field('footer_text', 'option');
$footer_button = get_field('footer_button', 'option');
$newsletter_shortcode = get_field('newsletter_shortcode', 'option');

$footer_title_1 = get_field('footer_title_1', 'option');
$footer_title_2 = get_field('footer_title_2', 'option');
$footer_title_3 = get_field('footer_title_3', 'option');
$footer_title_4 = get_field('footer_title_4', 'option');
$tiktok = get_field('tiktok', 'option');
$instagram = get_field('instagram', 'option');
$linkedin = get_field('linkedin', 'option');
?>
</main>

<footer class='footer'>
    <div class="card">
        <div class='container'>
            <div class="flex-wrapper">
                <div class="col">
                    <?php if (empty($footer_title_1) === false) : ?>
                        <h4><?php echo $footer_title_1; ?></h4>
                    <?php endif; ?>

                    <?php if (empty($footer_text) === false) {
                        echo $footer_text;
                    } ?>

                    <?php if (empty($footer_button) === false) {
                        echo sprintf('<a href="%s" target="%s" class="btn green forward-arrow">%s</a>', $footer_button['url'], $footer_button['target'], $footer_button['title']);
                    } ?>
                </div>

                <div class="col">
                    <?php if (empty($footer_title_2) === false) : ?>
                        <h4><?php echo $footer_title_2; ?></h4>
                    <?php endif; ?>

                    <?php wp_nav_menu(['theme_location' => 'footer-nav-1']); ?>
                </div>

                <div class="col">
                    <?php if (empty($footer_title_3) === false) : ?>
                        <h4><?php echo $footer_title_3; ?></h4>
                    <?php endif; ?>

                    <?php wp_nav_menu(['theme_location' => 'footer-nav-1']); ?>
                </div>

                <div class="col">
                    <?php if (empty($footer_title_4) === false) : ?>
                        <h4><?php echo $footer_title_4; ?></h4>
                    <?php endif; ?>

                    <?php if (empty($newsletter_shortcode) === false) {
                        echo do_shortcode($newsletter_shortcode);
                    } ?>

                    <div class="social">
                        <?php if (empty($tiktok) === false) : ?>
                            <a href="<?php echo $tiktok; ?>" aria-label="tiktok social url" class="tiktok"></a>
                        <?php endif; ?>

                        <?php if (empty($instagram) === false) : ?>
                            <a href="<?php echo $instagram; ?>" aria-label="instagram social url" class="instagram"></a>
                        <?php endif; ?>

                        <?php if (empty($linkedin) === false) : ?>
                            <a href="<?php echo $linkedin; ?>" aria-label="linkedin social url" class="linkedin"></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="copyright-wrapper">
                <span class="text">
                    &copy; EnerStudios <?php echo date('Y'); ?>
                </span>

                <?php wp_nav_menu(['theme_location' => 'copyright-nav']); ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
