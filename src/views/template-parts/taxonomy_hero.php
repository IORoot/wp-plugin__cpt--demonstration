<div class="rounded-lg h-96 block mb-10 bg-cover" style="background-image:url('<?php echo $background_url; ?>');"  >
    <div class="w-full h-full flex flex-col justify-center items-center bg-opacity-50 bg-black text-white">
        <div class="text-5xl"><?php echo $term->name; ?></div>
        <div class="text-xl w-1/2 pt-10 text-center"><?php echo $term->description; ?></div>
        <div class="text-lg font-smoke w-1/2 pt-10 text-center"><?php echo count($posts); ?> videos in the <?php echo strtolower($term->name); ?> series.</div>
    </div>
</div>