<?php
$id = get_field('id');
?>

<section
    class="cta-deal"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
       <h2>cta-deal</h2>
    </div>
</section>
