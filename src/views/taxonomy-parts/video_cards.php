<?php

    $icon_slowmo_sm = '<svg class="h-3 w-3 ml-1 mt-0.5 fill-black"> <use xlink:href="#slowmo"></use> </svg>';
    $icon_slowmo_md = '<svg class="h-5 w-5 fill-gray-500 ml-1"> <use xlink:href="#slowmo"></use> </svg>';
    $icon_back_sm = '<svg class="h-3 w-3 ml-1 mt-0.5 fill-black"> <use xlink:href="#viewback"></use> </svg>';
    $icon_back_md = '<svg class="h-5 w-5 fill-gray-500 ml-1"> <use xlink:href="#viewback"></use> </svg>';
    $icon_front_sm = '<svg class="h-3 w-3 ml-1 mt-0.5 fill-black"> <use xlink:href="#viewfront"></use> </svg>';
    $icon_front_md = '<svg class="h-5 w-5 fill-gray-500 ml-1"> <use xlink:href="#viewfront"></use> </svg>';
    $icon_side_sm = '<svg class="h-3 w-3 ml-1 mt-0.5 fill-black"> <use xlink:href="#viewside"></use> </svg>';
    $icon_side_md = '<svg class="h-5 w-5 fill-gray-500 ml-1"> <use xlink:href="#viewside"></use> </svg>';

?>

<h2 class="text-5xl mb-10 mt-20">Videos in this Category</h2>

<ul class="grid-ul flex flex-wrap md:-mr-10">

<?php 

    // if this is a single post, get all siblings.
    if ($wp_query->is_single){
        $posts = get_posts([
            'post_type' => $post->post_type,
            'numberposts' => -1,
            'order' => 'ASC',
            'tax_query' => [[
                'taxonomy' => $post->terms[0]->taxonomy,
                'field' => 'term_id', 
                'terms' => $post->terms[0]->term_id,
                'include_children' => false
            ]]
        ]);
    }

    foreach ($posts as $loop_key => $post) {  
    $post->meta = get_post_meta($post->ID);
?>

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                GRID ITEM                                │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <li class="grid-item pr-2 pb-2 md:pr-4 md:pb-4 lg:pr-10 lg:pb-10 inline-block w-full md:w-1/3 lg:w-1/4" >
            
        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                   LINK                                  │
        // │                    .group is used for .group-hover                      │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <a class="flex flex-col group overflow-hidden relative" href="<?php echo get_permalink($post);?>">
            

            <?php
            // ┌──────────────────────────────────────────────────────────────────────────────┐
            // │██████████████████████████████████████████████████████████████████████████████│
            // │██████████████████████████████████████████████████████████████████████████████│
            // │█████████████████████████████████ HOVER BOX ██████████████████████████████████│
            // │██████████████████████████████████████████████████████████████████████████████│
            // │██████████████████████████████████████████████████████████████████████████████│
            // └──────────────────────────────────────────────────────────────────────────────┘
            ?>
            <div class="z-30 group-hover:opacity-100 transition-all opacity-0 absolute top-0 left-0 w-full h-full bg-blue-500 p-2 rounded-2xl overflow-hidden">

                    <?php
                    // ┌─────────────────────────────────────────────────────────────────────────┐
                    // │                                                                         │
                    // │                                  DATE                                   │
                    // │                                                                         │
                    // └─────────────────────────────────────────────────────────────────────────┘
                    ?>
                    <div class="z-50 text-white text-xs font-thin absolute top-2 right-2 inline-block"><?php echo the_time('F j, Y'); ?></div>

                    


                    <div class="z-50 absolute bottom-0 left-0 flex flex-col p-2 h-full w-full">

                            <?php
                            // ┌─────────────────────────────────────────────────────────────────────────┐
                            // │                                                                         │
                            // │                          PLAYLIST POSITION                              │
                            // │                                                                         │
                            // └─────────────────────────────────────────────────────────────────────────┘
                            ?>
                            <div class="text-white text-8xl w-full text-center m-auto">
                                <?php
                                    echo intval($post->meta['playlistPosition'][0]) +1;
                                ?>
                            </div>
                            
                            <?php
                            // ┌─────────────────────────────────────────────────────────────────────────┐
                            // │                                                                         │
                            // │                                  TITLE                                  │
                            // │                                                                         │
                            // └─────────────────────────────────────────────────────────────────────────┘
                            ?>
                            <div class="text-white text-center font-medium text-lg break-words mb-8">
                                <?php  
                                $words = explode(" - ", $post->post_title);
                                echo ucwords($words[1]); 
                                ?>
                            </div>


                            <?php
                            // ┌─────────────────────────────────────────────────────────────────────────┐
                            // │                                                                         │
                            // │                                   TAGS                                  │
                            // │                                                                         │
                            // └─────────────────────────────────────────────────────────────────────────┘
                            ?>
                            <div class="mt-2 flex justify-center">
                            <?php 
                                $tags = get_the_terms($post, 'demonstration_tags'); 
                                foreach($tags as $tag){
                                    ?>
                                    <div class="text-black text-xs bg-white rounded self-start flex px-2 py-0.5 mr-1 relative">
                                        <span class="">
                                            <?php echo strtoupper($tag->name); ?>
                                        </span>
                                        
                                        <?php if($tag->slug == "back-view"){ echo $icon_back_sm; } ?>
                                        <?php if($tag->slug == "front-view"){ echo $icon_front_sm; } ?>
                                        <?php if($tag->slug == "side-view"){ echo $icon_side_sm; } ?>
                                        <?php if($tag->slug == "slowmo"){ echo $icon_slowmo_sm; } ?>
                                    </div>
                                    <?php
                                }
                            ?>
                            </div>
                    </div>


                    <?php
                    // ┌─────────────────────────────────────────────────────────────────────────┐
                    // │                                                                         │
                    // │                            CATEGORY GLYPH                               │
                    // │                                                                         │
                    // └─────────────────────────────────────────────────────────────────────────┘
                    ?>
                    <svg class="z-20 absolute fill-blue-400 -top-1/2 -left-1/2 opacity-50" style="width:200%; height:200%;">
                        <use xlink:href="#<?php echo $current_term->acf['meta_fields']['SVG Glyph']; ?>"></use>
                    </svg>

            </div>


            <?php
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                                  IMAGE                                  │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            ?>
            <img class="h-52 relative lg:h-52 lazyload rounded-2xl object-cover" src="<?php echo get_the_post_thumbnail_url($post);?>"/>


            <?php
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                                 DEMO TAG                                │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            ?>
            <div class="z-40 text-white text-xs font-thin absolute top-2 left-2 bg-blue-600 px-2 py-0.5 rounded">DEMO</div>
            

            <?php
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                                BOTTOM TEXT                              │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            ?>
            <div class="flex-1 flex flex-col justify-center mt-2">
                <div class="text-lg max-h-8 leading-4 mb-1 pb-1 truncate relative pr-8">

                    <?php
                    // ┌─────────────────────────────────────────────────────────────────────────┐
                    // │                                                                         │
                    // │                          PLAYLIST POSITION                              │
                    // │                                                                         │
                    // └─────────────────────────────────────────────────────────────────────────┘
                    ?>
                    <span class="text-smoke text-lg pr-1">
                        <?php
                            echo intval($post->meta['playlistPosition'][0]) +1;
                        ?>.
                    </span>


                    <?php
                    // ┌─────────────────────────────────────────────────────────────────────────┐
                    // │                                                                         │
                    // │                                  TITLE                                  │
                    // │                                                                         │
                    // └─────────────────────────────────────────────────────────────────────────┘
                    ?>
                    <?php 
                        // strip off the first part of title.
                        $title = explode(' - ', $post->post_title); 
                        if (count($title) > 1){
                            $title = $title[1];
                        } 
                        echo ucwords($title);
                    ?>

                    <?php
                    // ┌─────────────────────────────────────────────────────────────────────────┐
                    // │                                                                         │
                    // │                                ICONS                                    │
                    // │                                                                         │
                    // └─────────────────────────────────────────────────────────────────────────┘
                    ?>
                    <div class="absolute top-1 right-0 flex ">
                        <?php 
                            foreach ($tags as $tag) {
                                if($tag->slug == "back-view"){ echo $icon_back_md; }
                                if($tag->slug == "front-view"){ echo $icon_front_md; }
                                if($tag->slug == "side-view"){ echo $icon_side_md; }
                                if($tag->slug == "slowmo"){ echo $icon_slowmo_md; } 
                            }
                        ?>
                    </div>                
                </div>                
            </div>


        </a>

    </li>




<?php } ?>


</ul>