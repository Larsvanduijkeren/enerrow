<?php
$title = get_field('title');
$concepts = get_field('concepts');

$id = get_field('id');
?>

<section
    class="concepts"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <?php if (empty($title) === false) : ?>
            <h2 data-aos="fade-up" class="h4"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if (empty($concepts) === false) : ?>
            <div class="concepts-list" data-aos="fade-up">
                <?php foreach ($concepts as $concept) : ?>
                    <div class="concept">
                        <?php if (empty($concept['logo']) === false) : ?>
                            <img src="<?php echo $concept['logo']['sizes']['medium']; ?>"
                                 alt="<?php echo $concept['logo']['alt']; ?>">
                        <?php endif; ?>

                        <?php if (empty($concept['text']) === false) : ?>
                            <div class="text"><?php echo $concept['text']; ?></div>
                        <?php endif; ?>

                        <?php if (empty($concept['link']) === false) {
                            echo sprintf('<a href="%s" target="%s" class="circle-btn">%s</a>', $concept['link']['url'], $concept['link']['target'], $concept['link']['title']);
                        } else {
                            echo '<span class="coming-soon">Coming soon</span>';
                        } ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
