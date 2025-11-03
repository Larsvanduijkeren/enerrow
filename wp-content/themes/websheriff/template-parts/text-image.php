<?php
$order = get_field('order');
$color_theme = get_field('color_theme');
$type = get_field('type');
$workout = get_field('workout');
$title = get_field('title');
$text = get_field('text');
$image = get_field('image');
$button = get_field('button');

if ($type === 'workout' && empty($workout) === false) {
    $title = get_the_title($workout);
    $text = get_field('description', $workout);
    $button = null;
    $image = get_field('image', $workout);
}

$id = get_field('id');
?>

<section
    class="text-image <?php echo $order . ' ' . $color_theme; ?>"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <div class="flex-wrapper">
            <?php if (empty($title) === false) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if (empty($text) === false) {
                echo $text;
            } ?>

            <?php if (empty($button) === false) {
                $class = 'green';

                if ($color_theme === 'green') {
                    $class = 'blue';
                }
                echo sprintf('<a href="%s" target="%s" class="btn %s">%s</a>', $button['url'], $button['target'], $class, $button['title']);
            } ?>
        </div>

        <?php if (empty($image) === false) : ?>
            <span class="image">
                <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
            </span>
        <?php endif; ?>
    </div>
</section>
