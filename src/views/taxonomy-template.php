<?php 

get_header();

$term = get_queried_object();

$page_classes = get_field('page_classes', $term);

$pb = new andyp\pagebuilder\filters\the_content;
$content = $pb->filter_the_content_in_the_main_loop(null, $term);

$background_url = do_shortcode('[random_image_url ids="' . rand(2498,2457) . '"]'); 

$isotope_library = ANDYP_PAGEBUILDER_ISOTOPE_URL.'src/js/isotope.min.js';

// -------------------------- TEMPLATE START ------------------------------
?>

    <main class="bg-black block px-10 pb-10 text-white">

        <?php 
        //If the taxonomy has something placed into the block editor, use that instead of the default header.
        if (!empty($content)){
            echo $content;
        } else {
            include( __DIR__ . '/template-parts/taxonomy_hero.php');
        }
        ?>

        <ul class="grid-ul">

            <?php while (have_posts()) {
                the_post();

                include( __DIR__ . '/template-parts/taxonomy_item.php');
            ?>

            <?php } ?>

        </ul>

    </main>

<?php

// -------------------------- TEMPLATE END --------------------------------

get_footer();

/**
 * Add Isotope at bottom.
 */
?>
<script src="<?php echo $isotope_library; ?>"></script>
<script>
var elem = document.querySelector('.grid-ul');
var iso = new Isotope( elem, {
    itemSelector: '.grid-item',
    layoutMode: 'fitRows'
});
</script>
