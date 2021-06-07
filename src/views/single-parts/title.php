<h1 class="text-5xl mb-10 capitalize font-semibold border-blue-500 border-b-2 pb-10">
    <?php 
        $title = explode(' - ', $post->post_title);
        echo $title[1]; 
    ?>
</h1>