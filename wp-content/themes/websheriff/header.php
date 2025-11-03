<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="format-detection" content="telephone=no">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
wp_body_open();

$logo = get_field('logo', 'option');
$buttons = get_field('buttons', 'option');
?>

<span class="hamburger">
    <span class="line line-1"></span>
    <span class="line line-2"></span>
</span>

<nav class='mobile-nav'>
    <div class='content'>
        <div class='nav'>
            <div class='flex-wrapper'>
                <?php wp_nav_menu(['theme_location' => 'mobile-nav']); ?>

                <?php if (empty($buttons) === false) : ?>
                    <div class="buttons">
                        <?php foreach ($buttons as $button) : ?>
                            <?php if (empty($button['button']) === false) {
                                echo sprintf('<a href="%s" target="%s" class="btn">%s</a>', $button['button']['url'], $button['button']['target'], $button['button']['title']);
                            } ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<header class='header'>
    <div class='container'>
        <div class='flex-wrapper'>
            <a href='/' class='logo' aria-label="Logo Enerrow">
                <?php if (empty($logo) === false) : ?>
                    <img src='<?php echo $logo['sizes']['large']; ?>' alt='<?php echo $logo['alt']; ?>'>
                <?php endif; ?>
            </a>

            <?php wp_nav_menu(['theme_location' => 'header-nav']); ?>

            <div class="right">
                <?php if (empty($buttons) === false) : ?>
                    <div class="header-buttons">
                        <?php foreach ($buttons as $key => $button) :
                            $class = '';

                            if ($key === 1) {
                                $class = 'blue';
                            }
                            ?>
                            <?php if (empty($button['button']) === false) {
                            echo sprintf('<a href="%s" target="%s" class="btn %s">%s</a>', $button['button']['url'], $button['button']['target'], $class, $button['button']['title']);
                        } ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<main id="main-content" class="page-content" role="main">
