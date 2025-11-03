<?php
$id = get_field('id');
?>

<section
    class="team-archive"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
       <h2>team-archive</h2>
    </div>
</section>
