<?php
    /**
     * 
     * $current_term is the object available.
     * 
     */
?>
<div class="w-1/4 ">


    <a href="<?php echo get_term_link($current_term); ?>" class="subcat_box flex flex-col h-80 mb-4 rounded-2xl relative overflow-hidden bg-gray-200 text-black fill-green-500 hover:text-white hover:fill-white hover:bg-tutorial-500 hover:animate-pulse">


        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                  IMAGE                                  │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <img class="z-20 h-60 object-contain" src="<?php echo $current_term->acf["featured_image"]["url"]; ?>">

        <div class="z-30 subcat_text transition-all absolute bottom-0 left-0 p-2 w-full">
            <?php
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                                TITLE                                    │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            ?>
            <h2 class="font-semibold text-2xl text-center"><?php echo ucfirst($current_term->name); ?></h2>

            <?php
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                           SERIES & VIDEOS                               │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            ?>
            <p class="font-light text-center"><?php echo $current_term->count; ?> videos. </p>

        </div>

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                 GLYPH                                   │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <svg class="glyph z-10 transition-all absolute top-1 left-0 w-full h-60">
            <use xlink:href="#<?php echo $current_term->acf['meta_fields']['SVG Glyph']; ?>"></use>
        </svg>





        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                  NOISE                                  │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <svg class="z-10 w-full h-full absolute left-0 top-0 "><use xlink:href="#noise"></use></svg>

    </a>
</div>