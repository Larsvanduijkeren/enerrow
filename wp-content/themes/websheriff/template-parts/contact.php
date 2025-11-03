<?php
$id = get_field('id');
?>

<section
    class="contact"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
       <h2>contact</h2>
    </div>
</section>
