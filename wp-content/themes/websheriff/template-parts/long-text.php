<?php
$size = get_field('size');
$title = get_field('title');
$text = get_field('text');
?>

<section
    class="long-text <?php echo $size; ?>"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <div class="content" data-aos="fade-up">
            <?php if (empty($title) === false) : ?>
                <h1 class="h2"><?php echo $title; ?></h1>
            <?php endif; ?>

            <?php if (empty($text) === false) {
                echo $text;
            } ?>
        </div>
    </div>
</section>
