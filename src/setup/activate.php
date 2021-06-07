<?php

namespace andyp\cpt\demonstration\setup;

class activate
{

    public function __construct()
    {
        register_activation_hook( ANDYP_CPT_DEMONSTRATION_PLUGIN_FILE, [$this, 'flush_post_types'] );
    }

    public function flush_post_types() {

        $demonstration = new \andyp\cpt\demonstration\initialise;
        $demonstration->setup_cpt();
        $demonstration->register_cpt();
        $demonstration->run_cpt();

        global $wp_rewrite;
        $wp_rewrite->flush_rules();
    }

}