<?php
$title = get_field('title');
$text = get_field('text');
$buttons = get_field('buttons');
$map_title = get_field('map_title');
$phone_number = get_field('phone_number');
$email_address = get_field('email_address');
$location = get_field('location');
$latitude = get_field('latitude');
$longitude = get_field('longitude');
$route_link = get_field('route_link');

$id = get_field('id');
?>

<section
    class="contact"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <div class="card">
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
        </div>

        <div class="flex-wrapper">
            <div class="content">
                <?php if (empty($map_title) === false) : ?>
                    <h2><?php echo $map_title; ?></h2>
                <?php endif; ?>

                <h3 class="h4">Contact</h3>
                <?php if (empty($phone_number) === false) : ?>
                    <a href="tel:<?php echo $phone_number; ?>" class="phone">
                        <?php echo $phone_number; ?>
                    </a>
                <?php endif; ?>

                <?php if (empty($email_address) === false) : ?>
                    <a href="mailto:<?php echo $email_address; ?>" class="email">
                        <?php echo $email_address; ?>
                    </a>
                <?php endif; ?>

                <?php if (empty($location) === false) : ?>
                    <h3 class="h4">Location</h3>
                    <?php echo $location; ?>
                <?php endif; ?>

                <?php if(empty($route_link) === false) : ?>
                    <a href="<?php echo $route_link; ?>" class="route blue btn" target="_blank">
                        Route to the studio
                    </a>
                <?php endif; ?>
            </div>

            <div class="map">
                <h3>Map</h3>
            </div>
        </div>
    </div>
</section>
