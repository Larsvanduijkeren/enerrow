<?php
$title_logo = get_field('title_logo');
$color_theme = get_field('color_theme');
$image_size = get_field('image_size');
$image = get_field('image');
$title = get_field('title');
$text = get_field('text');
$buttons = get_field('buttons');

$tiktok = get_field('tiktok', 'option');
$instagram = get_field('instagram', 'option');
$linkedin = get_field('linkedin', 'option');

$id = get_field('id');
?>

<section
    class="hero <?php echo $color_theme . ' ' . $image_size; ?>"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="card" data-aos="fade-up">
        <div class="container">
            <div class="flex-wrapper">
                <div class="content">
                    <?php if (empty($title_logo) === false) : ?>
                            <img class="logo" src="<?php echo $title_logo['sizes']['medium']; ?>"
                                 alt="<?php echo $title_logo['alt']; ?>">
                    <?php endif; ?>

                    <?php if (empty($title) === false) : ?>
                        <h1><?php echo $title; ?></h1>
                    <?php endif; ?>

                    <?php if (empty($text) === false) {
                        echo $text;
                    } ?>

                    <div class="meta-wrapper">
                        <?php if (empty($buttons) === false) : ?>
                            <div class="buttons">
                                <?php foreach ($buttons as $button) : ?>
                                    <?php if (empty($button['button']) === false) {
                                        echo sprintf('<a href="%s" target="%s" class="btn %s">%s</a>', $button['button']['url'], $button['button']['target'], $button['icon'], $button['button']['title']);
                                    } ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($image_size === 'large') : ?>
                            <div class="social">
                                <?php if (empty($tiktok) === false) : ?>
                                    <a href="<?php echo $tiktok; ?>" aria-label="tiktok social url" class="tiktok"></a>
                                <?php endif; ?>

                                <?php if (empty($instagram) === false) : ?>
                                    <a href="<?php echo $instagram; ?>" aria-label="instagram social url"
                                       class="instagram"></a>
                                <?php endif; ?>

                                <?php if (empty($linkedin) === false) : ?>
                                    <a href="<?php echo $linkedin; ?>" aria-label="linkedin social url"
                                       class="linkedin"></a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (empty($image) === false) : ?>
                    <span class="image">
                        <img src="<?php echo $image['sizes']['full']; ?>" alt="<?php echo $image['alt']; ?>">
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
