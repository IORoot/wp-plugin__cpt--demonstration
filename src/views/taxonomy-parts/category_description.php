<?php

if (empty($wp_query->queried_object->description)){
    return;
}
?>
<h2 class="text-5xl mt-32">Synopsis</h2>
<div class="text-3xl whitespace-pre-line w-full flex mt-10">
    <?php echo $wp_query->queried_object->description; ?>
</div>