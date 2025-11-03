<?php
$order = get_field('order');
$color_theme = get_field('color_theme');
$type = get_field('type');
$workout = get_field('workout');
$title = get_field('title');
$text = get_field('text');
$image = get_field('image');
$button = get_field('button');
$usps = null;

if ($type === 'workout' && empty($workout) === false) {
    $title = get_the_title($workout);
    $text = get_field('description', $workout);
    $usps = get_field('usps', $workout);
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
    <div class="container wide">
        <div class="flex-wrapper">
            <div class="content" data-aos="fade-up">
                <?php if (empty($title) === false) : ?>
                    <h2 class="h3"><?php echo $title; ?></h2>
                <?php endif; ?>

                <?php if (empty($text) === false) {
                    echo $text;
                } ?>

                <?php if (empty($usps) === false) : ?>
                    <div class="usps">
                        <?php foreach ($usps as $usp) : ?>
                            <div class="usp">
                                <?php if (empty($usp['icon']) === false) : ?>
                                    <img src="<?php echo $usp['icon']['sizes']['medium']; ?>"
                                         alt="<?php echo $usp['icon']['alt']; ?>">
                                <?php endif; ?>
                                <?php if (empty($usp['title']) === false) : ?>
                                    <span class="usp-title"><?php echo $usp['title']; ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (empty($button) === false) {
                    $class = 'green';

                    if ($color_theme === 'green') {
                        $class = 'blue';
                    }
                    echo sprintf('<a href="%s" target="%s" class="btn %s">%s</a>', $button['url'], $button['target'], $class, $button['title']);
                } ?>
            </div>

            <?php if (empty($image) === false) : ?>
                <span class="image" data-aos="fade-up">
                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                </span>
            <?php endif; ?>
        </div>
    </div>
</section>
