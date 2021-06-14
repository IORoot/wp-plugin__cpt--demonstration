<?php

    $published = human_time_diff( get_the_time( 'U', $post ), current_time( 'timestamp' ) ) . ' ago.';
    $category  = get_the_term_list($post->ID, 'demonstration_category');
    $tags      = get_the_term_list($post->ID, 'demonstration_tags');

    $position  = get_post_meta($post->ID, 'playlistPosition');
    $cat       = get_the_terms($post, 'demonstration_category');
    $episode   = ($position[0] + 1) . ' / ' . $cat[0]->count;


    $icon_slowmo_md = '<svg class="h-5 w-5 fill-gray-500"> <use xlink:href="#slowmo"></use> </svg>';
    $icon_back_md   = '<svg class="h-5 w-5 fill-gray-500"> <use xlink:href="#viewback"></use> </svg>';
    $icon_front_md  = '<svg class="h-5 w-5 fill-gray-500"> <use xlink:href="#viewfront"></use> </svg>';
    $icon_side_md   = '<svg class="h-5 w-5 fill-gray-500"> <use xlink:href="#viewside"></use> </svg>';

?>

<div class="flex flex-col w-full sm:w-1/2 lg:w-full mt-4 lg:mt-0 ml-0 sm:ml-4 lg:ml-0">

    <div class="flex-1 flex gap-4 mb-4">

        <?php   
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                            PUBLISHED DATE                               │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <div class="w-1/2 bg-gray-200 rounded-2xl p-4">
            <div class="font-semibold">Published</div>
            <div class="font-thin"><?php echo $published; ?></div>
        </div>

        <?php   
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                               CATEGORY                                  │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <div class="w-1/2 bg-gray-200 rounded-2xl p-4">
            <div class="font-semibold">Category</div>
            <div class="font-thin capitalize underline"><?php echo $category; ?></div>
        </div>



    </div>
    <div class="flex-1 flex mb-6 gap-4">

        <?php   
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                   TAGS                                  │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <div class="w-full bg-gray-200 rounded-2xl p-4 h-20 flex">

            <?php 
                foreach (get_the_terms($post, 'demonstration_tags') as $tag) {

                    $html = '<div class="flex px-4 py-2 bg-white rounded-xl my-auto mr-4">';

                        if($tag->slug == "back-view"){  $html .= $icon_back_md; }
                        if($tag->slug == "front-view"){ $html .= $icon_front_md; }
                        if($tag->slug == "side-view"){  $html .= $icon_side_md; }
                        if($tag->slug == "slowmo"){     $html .= $icon_slowmo_md; } 

                        $html .= $tag->name;

                    $html .= '</div>';

                    echo $html;
                }
            ?>

        </div>

    </div>
</div>