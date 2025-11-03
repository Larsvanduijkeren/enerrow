<?php
$rating_score = get_field('rating_score');
$title = get_field('title');
$text = get_field('text');

$id = get_field('id');

$reviews = [];

$args = [
    'post_type'      => 'review',
    'posts_per_page' => 6,
    'post_status'    => 'publish',
    'orderby'        => 'rand',
    'order'          => 'asc',
];

$query = new WP_Query($args);
$reviews = $query->posts;
?>

<section
    class="review-slider"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <div class="flex-wrapper">
            <div class="content">
                <?php if (empty($rating_score) === false) : ?>
                    <div class="card blue">
                        <h4>Out of all ratings</h4>

                        <div class="score"><?php echo $rating_score; ?></div>
                    </div>
                <?php endif; ?>

                <?php if (empty($title) === false) : ?>
                    <div class="card green">
                        <?php echo $title; ?>

                        <?php if (empty($text) === false) {
                            echo $text;
                        } ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="reviews">
                <?php if (empty($reviews) === false) : ?>
                    <div class="slider">
                        <?php foreach ($reviews as $review) :
                            $review_score = get_field('score', $review);
                            $review_text = get_field('text', $review);
                            $review_author = get_field('author', $review);
                            $review_author_image = get_field('author_image', $review);
                            ?>
                            <div class="review">
                                <?php if (empty($review_text) === false) : ?>
                                    <p><?php echo $review_text; ?></p>
                                <?php endif; ?>

                                <?php if (empty($review_author) === false) : ?>
                                    <div class="author">
                                        <?php if (empty($review_author_image) === false) : ?>
                                            <img src="<?php echo $review_author_image['sizes']['medium']; ?>"
                                                 alt="<?php echo $review_author_image['alt']; ?>">
                                        <?php endif; ?>

                                        <div class="info">
                                            <span class="name"><?php echo $review_author; ?></span>

                                            <?php if (empty($review_score) === false) : ?>
                                                <div class="rating">
                                                    <span class="star <?php if ($review_score >= 1) {
                                                        echo 'active';
                                                    } ?>"></span>

                                                    <span class="star <?php if ($review_score >= 2) {
                                                        echo 'active';
                                                    } ?>"></span>

                                                    <span class="star <?php if ($review_score >= 3) {
                                                        echo 'active';
                                                    } ?>"></span>

                                                    <span class="star <?php if ($review_score >= 4) {
                                                        echo 'active';
                                                    } ?>"></span>

                                                    <span class="star <?php if ($review_score >= 5) {
                                                        echo 'active';
                                                    } ?>"></span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <h3>No reviews were found</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
