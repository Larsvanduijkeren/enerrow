<?php
$title = get_field('title');
$text = get_field('text');
$buttons = get_field('buttons');
$plans = get_field('plans');

$id = get_field('id');
?>

<section
    class="pricing"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="card">
        <div class="container">
            <div class="content">
                <?php if (empty($title) === false) : ?>
                    <h1><?php echo $title; ?></h1>
                <?php endif; ?>

                <?php if (empty($text) === false) {
                    echo $text;
                } ?>

                <?php if (empty($buttons) === false) : ?>
                    <div class="buttons">
                        <?php foreach ($buttons as $button) : ?>
                            <?php if (empty($button['button']) === false) {
                                echo sprintf('<a href="%s" target="%s" class="btn blue %s">%s</a>', $button['button']['url'], $button['button']['target'], $button['icon'], $button['button']['title']);
                            } ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (empty($plans) === false) : ?>
                <div class="plans">
                    <div class="control">
                        <span class="label">Monthly</span>
                        <span class="toggle">
                            <span class="ball"></span>
                        </span>
                        <span class="label">Yearly</span>
                    </div>

                    <?php if (empty($plans) === false) : ?>
                        <div class="plans-wrapper">
                            <?php foreach ($plans as $plan) : ?>
                                <div class="plan">
                                    <div class="group">
                                        <?php if (empty($plan['title']) === false) : ?>
                                            <h3><?php echo $plan['title']; ?></h3>
                                        <?php endif; ?>

                                        <?php if (empty($plan['description']) === false) : ?>
                                            <p><?php echo $plan['description']; ?></p>
                                        <?php endif; ?>

                                        <?php if (empty($plan['monthly_price']) === false) : ?>
                                            <span
                                                class="monthly-price"><span>&euro;</span><?php echo $plan['monthly_price']; ?></span>
                                        <?php endif; ?>

                                        <?php if (empty($plan['yearly_price']) === false) : ?>
                                            <span class="yearly-price"><span>&euro;</span><?php echo $plan['yearly_price']; ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (empty($plan['features']) === false) : ?>
                                        <?php foreach ($plan['features'] as $feature) : ?>
                                            <div class="group">
                                                <?php if (empty($feature['feature']) === false) {
                                                    echo $feature['feature'];
                                                } ?>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
