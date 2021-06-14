<?php 

    // fallback to parent if no IMG / SVG set for current post.
    // $term = $post->term[0];
    // if (!$term->acf){
    //     $term = $post->terms[1];
    // }

    if (isset($post->terms[0]->acf["meta_fields"]["SVG Glyph"])) {
        $svg = $post->terms[0]->acf["meta_fields"]["SVG Glyph"];
    } else {
        $svg = $post->terms[1]->acf["meta_fields"]["SVG Glyph"];
    }

    if (isset($post->terms[0]->acf["featured_image"]["url"])) {
        $img = $post->terms[0]->acf["featured_image"]["url"];
    } else {
        $img = $post->terms[1]->acf["featured_image"]["url"];
    }

    
?>

<div class="bg-gray-200 w-full sm:w-1/2 lg:w-full h-48 rounded-2xl overflow-hidden relative mb-4 mt-4 lg:mt-0"">


    <?php   
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                  TEXT                                   │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <div class="z-20 absolute bottom-4 left-4">
        <?php   
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                          Main Category                                  │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <div class="font-light"><?php echo $post->terms[1]->name; ?></div>

        <?php   
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                  LINE                                   │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <hr class="w-1/2 border-b-2 border-gray-900 border-t-0 my-1"/>

        <?php   
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                        Sub Category (series)                            │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <div class="font-semibold text-2xl"><?php echo $post->terms[0]->name; ?></div>
    </div>


    <?php   
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                   SVG                                   │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <svg class="z-10 absolute fill-blue-600 top-0 -right-1/4 mix-blend-darken" style="width:120%; height:120%;">
		<use xlink:href="#<?php echo $svg; ?>"></use>
	</svg>

    <?php   
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                  IMAGE                                  │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <img class="z-10 object-contain w-full h-full -right-1/4 absolute" src="<?php echo $img; ?>" />


    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                  NOISE                                  │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <svg class="z-20 w-full h-full absolute left-0 top-0 mix-blend-hard-light"><use xlink:href="#noise"></use></svg>

</div>