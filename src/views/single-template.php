<?php 


include( __DIR__ . '/single-parts/set_post_terms.php');
$post->terms = set_post_terms_hierarchical($post);
$post->image = get_the_post_thumbnail_url($post->ID);
$post->meta  = get_post_meta($post->ID);

get_header();

while ( have_posts() ) :

	the_post();

	// -------------------------- TEMPLATE START ------------------------------
	?>


	<article class="max-w-screen-xl mx-4 xl:m-auto block pb-40 relative">

		<?php   
		// ┌─────────────────────────────────────────────────────────────────────────┐
		// │                                                                         │
		// │                                HERO                                     │
		// │                                                                         │
		// └─────────────────────────────────────────────────────────────────────────┘
		?>
		<?php include( __DIR__ . '/single-parts/hero.php');  ?>  
	

		<?php   
		// ┌─────────────────────────────────────────────────────────────────────────┐
		// │                                                                         │
		// │                              BREADCRUMBS                                │
		// │                                                                         │
		// └─────────────────────────────────────────────────────────────────────────┘
		?>
		<div class="w-full h-10 relative mb-20">
			<?php do_shortcode('[breadcrumb colour="blue-500"]');  ?>
		</div>

		<div class="w-full flex flex-col lg:flex-row mb-40 mt-40 md:mt-0">
			<?php   
			// ┌─────────────────────────────────────────────────────────────────────────┐
			// │                                                                         │
			// │                              CONTENT                                    │
			// │                                                                         │
			// └─────────────────────────────────────────────────────────────────────────┘
			?>
			<div class="w-full sm:w-2/3">
				<?php include( __DIR__ . '/single-parts/title.php');  ?>   
				<?php include( __DIR__ . '/single-parts/transformed_content.php');  ?>   
			</div>


		</div>

		<div class="w-full flex flex-col">

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
			// │ 						TUTORIALS, DEMOS AND BLOG                        │
			// │                                                                         │
			// └─────────────────────────────────────────────────────────────────────────┘
			?>
			<h2 class="text-2xl mb-4">Explore other Series</h2>
			<div class="w-full flex gap-10">

				<?php include( __DIR__ . '/generic-parts/tutorials_demos_blog.php'); ?>

			</div>

		</div>


	</article>



<?php
// -------------------------- TEMPLATE END --------------------------------
endwhile;
?>

<div class="svgs">
    <?php
	include( ANDYP_CPT_DEMONSTRATION_PATH . '/src/svgs/slowmo.svg');
	include( ANDYP_CPT_DEMONSTRATION_PATH . '/src/svgs/viewback.svg');
	include( ANDYP_CPT_DEMONSTRATION_PATH . '/src/svgs/viewfront.svg');
	include( ANDYP_CPT_DEMONSTRATION_PATH . '/src/svgs/viewside.svg');
    include( get_stylesheet_directory() . '/src/assets/svgs/noise.svg');
    include( get_stylesheet_directory() . '/src/assets/svgs/glyph-all.svg');
    include( get_stylesheet_directory() . '/src/assets/svgs/wavey-min.php');
    ?>
</div>

<?php

get_footer();

