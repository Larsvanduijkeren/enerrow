<?php
$id = get_field('id');
?>

<section
    class="cta-device"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
       <h2>cta-device</h2>
    </div>
</section>
