<?php

namespace andyp\cpt\demonstration;

class initialise
{

    private $config;

    public function run()
    {
        $this->setup_cpt();
        $this->register_cpt();
        $this->switch_on_metaboxes();
        $this->add_admin_view();
        $this->register_template_folder();
        $this->register_sidebar();
        $this->enqueue_css();
        $this->register_transform_filters();
        $this->register_REST_metadata();
    }

    public function set_config($config)
    {
        $this->config = $config;
    }

    public function setup_cpt()
    {
        $this->cpt = new cpt\create_cpt;
        $this->cpt->set_singular(ucfirst($this->config['post_type']));
        $this->cpt->set_icon($this->config['svgdata_icon']);
        $this->cpt->set_category($this->config['category']);
        $this->cpt->set_tags($this->config['tags']);
    }

    
    public function register_cpt()
    {
        $this->cpt->register();
    }

    /**
     * This is only for activation.
     * Otherwise it runs on an init filter
     */
    public function run_cpt()
    {
        $this->cpt->run_cpt();
    }

    public function switch_on_metaboxes()
    {
        new acf\switch_on_metaboxes;
    }

    public function add_admin_view()
    {
        new filters\admin_archive_view_by_playlist_order($this->config['post_type'] . '_category', $this->config['post_type']);
    }

    public function register_template_folder()
    {
        new filters\register_template_folder($this->config['post_type']);
    }

    public function register_sidebar()
    {
        new register\sidebar(ucfirst($this->config['post_type']));
    }

    public function enqueue_css()
    {
        new filters\enqueue_css_in_footer($this->config['post_type']);
    }

    public function register_transform_filters()
    {
        new filters\transforms\parsedown;
        new filters\transforms\tailwind;
        new filters\transforms\tag_hide;
    }

    public function register_REST_metadata()
    {
        new REST\metadata;
    }
}