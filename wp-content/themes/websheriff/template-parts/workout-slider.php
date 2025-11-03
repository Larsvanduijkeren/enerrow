<?php
$workouts = get_field('workouts');

$id = get_field('id');
?>

<section
    class="workout-slider"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <?php if (empty($workouts) === false) : ?>
            <div class="slider">
                <?php foreach ($workouts as $workout) :
                    $workout_description = get_field('description', $workout);
                    $workout_booking_link = get_field('booking_link', $workout);
                    $workout_stats = get_field('stats', $workout);
                    $workout_usps = get_field('usps', $workout);
                    ?>
                    <div class="workout">
                        <div class="flex-wrapper">
                            <div class="content" data-aos="fade-up">
                                <h2><?php echo get_the_title($workout); ?></h2>
                                <?php if (empty($workout_description) === false) {
                                    echo $workout_description;
                                } ?>

                                <?php if (empty($workout_booking_link) === false) {
                                    echo sprintf('<a href="%s" target="%s" class="btn blue calendar">%s</a>', $workout_booking_link['url'], $workout_booking_link['target'], $workout_booking_link['title']);
                                } ?>
                            </div>

                            <div class="info" data-aos="fade-up">
                                <?php if (empty($workout_stats) === false) : ?>
                                    <div class="stats">
                                        <?php foreach ($workout_stats as $stat) : ?>
                                            <div class="stat">
                                                <?php if (empty($stat['stat']) === false) : ?>
                                                    <span class="stat-score"><?php echo $stat['stat']; ?></span>
                                                <?php endif; ?>

                                                <?php if (empty($stat['title']) === false) : ?>
                                                    <span class="stat-title"><?php echo $stat['title']; ?></span>
                                                <?php endif; ?>

                                                <?php if (empty($stat['description']) === false) : ?>
                                                    <span
                                                        class="stat-description"><?php echo $stat['description']; ?></span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (empty($workout_usps) === false) : ?>
                                    <div class="usps">
                                        <?php foreach ($workout_usps as $usp) : ?>
                                            <div class="usp">
                                                <?php if (empty($usp['icon']) === false) : ?>
                                                    <span class="image">
                                                        <img src="<?php echo $usp['icon']['sizes']['medium']; ?>"
                                                             alt="<?php echo $usp['icon']['alt']; ?>">
                                                    </span>
                                                <?php endif; ?>
                                                <?php if (empty($usp['title']) === false) : ?>
                                                    <span class="usp-title"><?php echo $usp['title']; ?></span>
                                                <?php endif; ?>

                                                <?php if (empty($usp['description']) === false) : ?>
                                                    <span
                                                        class="usp-description"><?php echo $usp['description']; ?></span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
