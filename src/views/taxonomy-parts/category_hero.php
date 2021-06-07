<?php

    // The current category ACF Featured image URL
    $current_term_acf_image = $current_term->acf['featured_image']['url'];

    // The current category ACF SVG Name
    foreach ($current_term->acf['meta_fields'] as $meta_field)
    {
        if ($meta_field['meta_field_name'] != 'SVG Glyph'){ continue; }
        $current_term_acf_svg_name = $meta_field['meta_field_value'];
    }

    // Is this category a top-level category.
    $is_parent = false;
    if($current_term->parent == 0){ $is_parent = true;} 

?>




<div class="rounded-2xl h-96 my-10 p-10 bg-gray-200 from-current to-gray-500 relative overflow-hidden" >

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                MINI GLYPH                               │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <svg class="z-50 absolute fill-gray-500 top-10 left-10 w-10 h-10">
		<use xlink:href="#<?php echo $current_term->acf['meta_fields']['SVG Glyph']; ?>"></use>
	</svg>


    <div class="z-40 absolute bottom-10 left-10 w-1/2">

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                TITLE                                    │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <h1 class="font-semibold text-7xl font-serif"><?php echo ucfirst($current_term->name); ?></h1>

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                           SERIES & VIDEOS                               │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <div class="flex font-light">
            <?php 
            
                /**
                 * Display the number of sub-categories (series)
                 * if this is a top-level parent.
                 */
                if ($is_parent) {
                    $children = get_term_children($current_term->term_id, $current_term->taxonomy);
                    echo '<p class="pr-4">' . count($children) . ' series. </p>';
                }
            ?>


            <p class=""><?php echo count($posts); ?> videos. </p>
        </div>   

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                  LINE                                   │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <hr class="w-1/6 border-b-4 border-gray-900 border-t-0 my-2"/>

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                EXCERPT                                  │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <p class="font-light w-3/4 mt-4"><?php echo $current_term->acf['meta_fields']['Excerpt']; ?></p>
    </div>

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                  IMAGE                                  │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <img class="z-30 absolute top-0 right-40 h-96" src="<?php echo $current_term_acf_image; ?>">

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                WAVEY-MIN                                │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <div class="z-20 wavey-min bg-right-bottom bg-no-repeat absolute right-0 bottom-0 mix-blend-screen" style="width:150%; height:150%"></div>

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                 GLYPH                                   │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <svg class="z-10 absolute fill-green-600 -top-1/2 -left-1/2 " style="width:200%; height:200%;">
		<use xlink:href="#<?php echo $current_term->acf['meta_fields']['SVG Glyph']; ?>"></use>
	</svg>

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                  NOISE                                  │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <svg class="z-20 w-full h-full absolute left-0 top-0 mix-blend-overlay"><use xlink:href="#noise"></use></svg>
    
</div>



<?php
