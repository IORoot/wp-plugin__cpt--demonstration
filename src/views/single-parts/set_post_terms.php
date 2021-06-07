<?php

function set_post_terms_hierarchical($post) {    

	$taxonomies_of_post = get_object_taxonomies( $post );

	// tutorial_cateogry / tutorial_tags
	foreach ( $taxonomies_of_post as $taxonomy ) {  

		$taxonomy_object = get_taxonomy( $taxonomy );  

		// check hierarchical
		if ( !$taxonomy_object->query_var || !$taxonomy_object->hierarchical ) { continue; }

		$sub_terms = wp_get_post_terms( $post->ID, $taxonomy_object->name, array( 'orderby' => 'term_id' ) );

		foreach ( $sub_terms as $loop_sub_term ) {

			/**
			 * CHILD
			 */
            if( class_exists('ACF') ) {
                $acf_terms = get_fields($loop_sub_term);

				foreach($acf_terms['meta_fields'] as $meta_term)
				{
					$acf_terms['meta_fields'][$meta_term['meta_field_name']] = $meta_term['meta_field_value'];
				}
				$loop_sub_term->acf = $acf_terms;
            }
        
			$terms[] = $loop_sub_term;


			/**
			 * PARENT 
			 */
			if ($loop_sub_term->parent == 0){ continue; }

            $parent_term = get_term($loop_sub_term->parent);

            if ( class_exists('ACF')) {
                $acf_terms = get_fields($parent_term);
				foreach($acf_terms['meta_fields'] as $meta_term)
				{
					$acf_terms['meta_fields'][$meta_term['meta_field_name']] = $meta_term['meta_field_value'];
				}
				$parent_term->acf = $acf_terms;
            }

			$terms[] = $parent_term;
		}
	}

    return $terms;
}
