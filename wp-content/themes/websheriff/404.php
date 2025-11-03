<?php get_header();

$custom_404 = get_page_by_path('pagina-niet-gevonden-404');

if ($custom_404) {
    echo apply_filters('the_content', $custom_404->post_content);
} else { ?>
    <section class="not-found">
        <div class="container">
            <div class="content">
                <h1>404</h1>
                <p>This page could not be found because it doesn't exist.</p>

                <a href="/" class="btn">
                    Return to homepage
                </a>
            </div>
        </div>
    </section>
    <?php
}
get_footer(); ?>
