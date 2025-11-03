<?php
$title = get_field('title');
$text = get_field('text');
$buttons = get_field('buttons');

$id = get_field('id');


$team_members = [];

$args = [
    'post_type'      => 'team_member',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'asc',
];

$query = new WP_Query($args);
$team_members = $query->posts;
?>

<section
    class="team-archive"
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

        <?php if (empty($team_members) === false) : ?>
            <div class="flex-wrapper">
                <?php foreach ($team_members as $team_member) :
                    $team_image = get_field('image', $team_member);;
                    $team_bio = get_field('biography', $team_member);;
                    ?>
                    <div class="team-member">
                        <?php if (empty($team_image) === false) : ?>
                            <span class="image">
                                <img src="<?php echo $team_image['sizes']['large']; ?>"
                                     alt="<?php echo $team_image['alt']; ?>">
                            </span>
                        <?php endif; ?>

                        <h3><?php echo get_the_title($team_member); ?></h3>

                        <?php if (empty($team_bio) === false) : ?>
                            <p><?php echo $team_bio; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
