<?php
$id = get_field('id');
?>

<section
    class="marquee"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
       <h2>marquee</h2>
    </div>
</section>
