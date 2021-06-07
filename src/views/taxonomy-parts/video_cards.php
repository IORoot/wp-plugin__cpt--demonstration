<?php

?>

<h2 class="text-5xl mb-10 mt-20">Videos in this Category</h2>

<ul class="grid-ul flex flex-wrap -mr-20">

<?php foreach ($posts as $loop_key => $post) {  
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
                                $terms = get_the_terms($post, 'demonstration_tags'); 
                                foreach($terms as $tag){
                                    
                                    

                                    ?>
                                    <div class="text-black text-xs bg-white rounded self-start flex px-2 py-0.5 mr-1">
                                        <span class="">
                                            <?php echo strtoupper($tag->name); ?>
                                        </span>
                                        
                                        <?php 
                                            if($tag->slug == "slowmo"){
                                                $icon = '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 16C13.66 16 15 14.66 15 13C15 11.88 14.39 10.9 13.5 10.39L3.79 4.77L9.32 14.35C9.82 15.33 10.83 16 12 16M12 3C10.19 3 8.5 3.5 7.03 4.32L9.13 5.53C10 5.19 11 5 12 5C16.42 5 20 8.58 20 13C20 15.21 19.11 17.21 17.66 18.65H17.65C17.26 19.04 17.26 19.67 17.65 20.06C18.04 20.45 18.68 20.45 19.07 20.07C20.88 18.26 22 15.76 22 13C22 7.5 17.5 3 12 3M2 13C2 15.76 3.12 18.26 4.93 20.07C5.32 20.45 5.95 20.45 6.34 20.06C6.73 19.67 6.73 19.04 6.34 18.65C4.89 17.2 4 15.21 4 13C4 12 4.19 11 4.54 10.1L3.33 8C2.5 9.5 2 11.18 2 13Z"/></svg>';
                                                
                                                echo '<div class="h-3 w-3 ml-1 mt-0.5">';
                                                echo $icon;
                                                echo '</div>';
                                            }
                                        ?>
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
                    // │                              SLOWMO ICON                                │
                    // │                                                                         │
                    // └─────────────────────────────────────────────────────────────────────────┘
                    ?>
                    <?php
                        if (isset($icon)) {
                            $title_icon = '<div class="h-6 w-6 absolute top-0 right-0">';
                            $title_icon .= $icon;
                            $title_icon .= '</div>';
                            echo $title_icon;
                            unset($title_icon);
                            unset($icon);
                        }
                    ?>

                </div>                
            </div>


        </a>

    </li>




<?php } ?>


</ul>