<div class="rounded-lg h-auto md:h-96 block mb-10 bg-cover" style="background-image:url('<?php echo $background_url; ?>');"  >
    <div class="w-full h-full flex flex-col justify-center items-center bg-opacity-50 bg-black text-white p-4">
        <div class="text-5xl text-center"><?php echo ucfirst($term->name); ?></div>
        <div class="text-xl w-full pt-10 text-center"><?php echo $term->description; ?></div>
        <div class="text-lg font-smoke w-full pt-10 text-center"><?php echo count($posts); ?> videos in the <?php echo strtolower($term->name); ?> series.</div>
    </div>
</div>