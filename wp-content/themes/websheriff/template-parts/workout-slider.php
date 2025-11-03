<?php
$id = get_field('id');
?>

<section
    class="workout-slider"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
       <h2>workout-slider</h2>
    </div>
</section>
