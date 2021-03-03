<?php

namespace andyp\labs\cpt\demonstration\REST;

/**
 * Return Metadata on post request to 
 * https://dev.pulse.londonparkour.com/wp-json/wp/v2/pulse
 */
class metadata
{
    public function __construct()
    {

        /**
         * https://wordpress.stackexchange.com/questions/331832/how-to-return-meta-data-from-the-rest-api
         */
        add_action( 'rest_api_init', function () {

            register_rest_field( 'demonstration', 'imageURL', array(
                'get_callback' => function( $post_arr ) {
                    return get_the_post_thumbnail_url( $post_arr['id'], 'medium' );
                },
            ) );

        } );


        /**
         * Add "RANDOM" as an orderby parameter.
         */
        add_filter( 'rest_demonstration_collection_params', function( $query_params ) {
            $query_params['orderby']['enum'][] = 'rand';
            return $query_params;
        } );
        
    }

}