<?php
$image = get_field('image');
$title = get_field('title');
$text = get_field('text');
$deal_title = get_field('deal_title');
$deal_button = get_field('deal_button');
$deal_old_price = get_field('deal_old_price');
$deal_new_price = get_field('deal_new_price');

$id = get_field('id');
?>

<section
    class="cta-deal"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="card">
        <?php if (empty($image) === false) : ?>
            <span class="image">
                <img src="<?php echo $image['sizes']['full']; ?>" alt="<?php echo $image['alt']; ?>">
            </span>
        <?php endif; ?>

        <div class="container">
            <div class="content" data-aos="fade-up">
                <?php if (empty($title) === false) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>

                <?php if (empty($text) === false) {
                    echo $text;
                } ?>

                <div class="deal">
                    <?php if (empty($deal_title) === false) : ?>
                        <h3><?php echo $deal_title; ?></h3>
                    <?php endif; ?>

                    <div class="wrap">
                        <?php if (empty($deal_button) === false) {
                            echo sprintf('<a href="%s" target="%s" class="btn green">%s</a>', $deal_button['url'], $deal_button['target'], $deal_button['title']);
                        } ?>

                        <div class="price">
                            <?php if (empty($deal_new_price) === false) : ?>
                                <span class="new">SAR <?php echo $deal_new_price; ?></span>
                            <?php endif; ?>

                            <?php if (empty($deal_old_price) === false) : ?>
                                <span class="old">SAR <?php echo $deal_old_price; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
