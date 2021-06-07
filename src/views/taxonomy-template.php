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
        <?php do_shortcode('[breadcrumb colour="green-500"]'); ?>

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                        ANY SUB-CATEGORIES (SERIES)                      │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <?php include( __DIR__ . '/taxonomy-parts/category_subcategory_boxes.php'); ?>

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
        <div class="w-full flex gap-10 ">
            <?php include( __DIR__ . '/generic-parts/tutorials_demos_blog.php'); ?>

        </div>

    </main>

<?php

// -------------------------- TEMPLATE END --------------------------------
?>

<div class="svgs">
    <?php
    include( get_stylesheet_directory() . '/src/assets/svgs/noise.svg');
    include( get_stylesheet_directory() . '/src/assets/svgs/glyph-all.svg');
    ?>
</div>

<?php

get_footer();
