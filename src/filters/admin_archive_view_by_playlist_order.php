<?php

namespace andyp\cpt\demonstration\filters;


/**
 * 
 * Using Wordpress Pre-Get filter to order the custom taxonomy by playlistOrder
 * 
 * This is so the order isn't by published date.
 * 
 */

class admin_archive_view_by_playlist_order
{

	public $taxonomy;

	public $post_type;


	public function __construct($taxonomy, $post_type)
	{
		$this->taxonomy = $taxonomy;
		$this->post_type = $post_type;

		add_action( 'pre_get_posts', array($this, 'customize_category_archive_display') );
	}


	public function customize_category_archive_display ( $query ) {

		if (empty($this->taxonomy)){ return; }
		if (empty($this->post_type)){ return; }

		if (($query->is_main_query()) && (is_tax($this->taxonomy))){
			$query->set( 'post_type', $this->post_type );                 
			$query->set( 'posts_per_page', '-1' );
			$query->set( 'order', 'ASC' );
		}	

	}

}
