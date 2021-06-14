<?php 

get_header();
$current_term = get_queried_object();
$current_term->acf = get_fields( $current_term );

/**
 * Convert all ACF meta fields to key => value pairs for the taxonomy.
 */
foreach ($current_term->acf['meta_fields'] as $meta_field)
{
    $name  = $meta_field['meta_field_name'];
    $value = $meta_field['meta_field_value'];
    $current_term->acf['meta_fields'][$name] = $value;
}

// -------------------------- TEMPLATE START ------------------------------
?>

    <main class="max-w-screen-xl m-auto block px-4 pb-40 relative">

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                TOP HERO                                 │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <?php include( __DIR__ . '/taxonomy-parts/category_hero.php'); ?>

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                BREADCRUMBS                              │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <?php do_shortcode('[breadcrumb colour="blue-500"]'); ?>

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                ANY VIDEOS                               │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <?php include( __DIR__ . '/taxonomy-parts/video_cards.php'); ?>

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                        THE CATEGORY DESCRIPTION                         │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <?php include( __DIR__ . '/taxonomy-parts/category_description.php'); ?>


        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │ 						TUTORIALS, DEMOS AND BLOG                        │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <h2 class="text-2xl mb-4 mt-40">Explore other series</h2>
        <?php include( __DIR__ . '/generic-parts/tutorials_demos_blog.php'); ?>

    </main>

<?php

// -------------------------- TEMPLATE END --------------------------------
?>

<div class="svgs">
    <?php
    include( ANDYP_CPT_DEMONSTRATION_PATH . '/src/svgs/slowmo.svg');
    include( ANDYP_CPT_DEMONSTRATION_PATH . '/src/svgs/viewback.svg');
    include( ANDYP_CPT_DEMONSTRATION_PATH . '/src/svgs/viewfront.svg');
    include( ANDYP_CPT_DEMONSTRATION_PATH . '/src/svgs/viewside.svg');
    include( get_stylesheet_directory() . '/src/assets/svgs/glyph-all.svg');
    include( get_stylesheet_directory() . '/src/assets/svgs/wavey-min.php');
    include( get_stylesheet_directory() . '/src/assets/svgs/noise.svg');
    ?>
</div>

<?php

get_footer();
