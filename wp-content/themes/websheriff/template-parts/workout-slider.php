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
            <div class="slider" data-aos="fade-up">
                <?php foreach ($workouts as $workout) :
                    $workout_description = get_field('description', $workout);
                    $workout_booking_link = get_field('booking_link', $workout);
                    $workout_stats = get_field('stats', $workout);
                    $workout_usps = get_field('usps', $workout);
                    ?>
                    <div class="workout">
                        <div class="flex-wrapper">
                            <div class="content">
                                <h2><?php echo get_the_title($workout); ?></h2>
                                <?php if (empty($workout_description) === false) {
                                    echo $workout_description;
                                } ?>

                                <?php if (empty($workout_booking_link) === false) {
                                    echo sprintf('<a href="%s" target="%s" class="btn blue calendar">%s</a>', $workout_booking_link['url'], $workout_booking_link['target'], $workout_booking_link['title']);
                                } ?>
                            </div>

                            <div class="info">
                                <?php if (empty($workout_stats) === false) : ?>
                                    <div class="stats">
                                        <?php foreach ($workout_stats as $stat) : ?>
                                            <div class="stat">
                                                <?php if (empty($stat['stat']) === false) : ?>
                                                    <div class="stat-wrap">
                                                        <div class="stat-circle" style="--value:1"> <!-- 1 = 100% (use 0..1 for other values) -->
                                                            <svg viewBox="0 0 120 120" aria-label="Progress 100%">
                                                                <!-- Track -->
                                                                <circle class="track" cx="60" cy="60" r="52" />
                                                                <!-- Animated progress -->
                                                                <circle class="progress" cx="60" cy="60" r="52" />
                                                                <!-- Optional center label -->
                                                                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle">
                                                                    <?php echo $stat['stat']; ?>
                                                                </text>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if (empty($stat['title']) === false) : ?>
                                                    <h4><?php echo $stat['title']; ?></h4>
                                                <?php endif; ?>

                                                <?php if (empty($stat['description']) === false) : ?>
                                                    <p><?php echo $stat['description']; ?></p>
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
                                                    <img class="style-svg" src="<?php echo $usp['icon']['sizes']['medium']; ?>"
                                                         alt="<?php echo $usp['icon']['alt']; ?>">
                                                <?php endif; ?>
                                                <?php if (empty($usp['title']) === false) : ?>
                                                    <h4 class="usp-title"><?php echo $usp['title']; ?></h4>
                                                <?php endif; ?>

                                                <?php if (empty($usp['description']) === false) : ?>
                                                    <p><?php echo $usp['description']; ?></p>
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
