<?php
$texts = get_field('texts');
$color = get_field('color');

$id = get_field('id');
?>

<section
    class="marquee <?php echo $color; ?>"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <?php if (empty($texts) === false) : ?>
            <div class="marquee-slider" data-aos="fade-up">
                <?php foreach ($texts as $text) : ?>
                    <div class="text h1">
                        <?php if(empty($text['text']) === false) {
                            echo $text['text'];
                        } ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
