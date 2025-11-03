<?php
$title = get_field('title');
$text = get_field('text');
$button = get_field('button');
$device_image = get_field('device_image');

$id = get_field('id');
?>

<section
    class="cta-device"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="card" data-aos="fade-up">
        <div class="container">
            <div class="content" >
                <?php if (empty($title) === false) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>

                <?php if (empty($text) === false) {
                    echo $text;
                } ?>

                <?php if (empty($button) === false) {
                    echo sprintf('<a href="%s" target="%s" class="btn forward-arrow blue">%s</a>', $button['url'], $button['target'], $button['title']);
                } ?>
            </div>
        </div>

        <?php if (empty($device_image) === false) : ?>
            <img src="<?php echo $device_image['sizes']['large']; ?>" alt="<?php echo $device_image['alt']; ?>">
        <?php endif; ?>
    </div>
</section>
