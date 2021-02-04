<?php

namespace andyp\labs\cpt\demonstration;

class initialise
{

    public $singular = 'demonstration'; //lowercase
    public $svgdata_icon = 'data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMjQgMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTE2LjUsNS41QTIsMiAwIDAsMCAxOC41LDMuNUEyLDIgMCAwLDAgMTYuNSwxLjVBMiwyIDAgMCwwIDE0LjUsMy41QTIsMiAwIDAsMCAxNi41LDUuNU0xMi45LDE5LjRMMTMuOSwxNUwxNiwxN1YyM0gxOFYxNS41TDE1LjksMTMuNUwxNi41LDEwLjVDMTcuODksMTIuMDkgMTkuODksMTMgMjIsMTNWMTFDMjAuMjQsMTEuMDMgMTguNiwxMC4xMSAxNy43LDguNkwxNi43LDdDMTYuMzQsNi40IDE1LjcsNiAxNSw2QzE0LjcsNiAxNC41LDYuMSAxNC4yLDYuMUw5LDguM1YxM0gxMVY5LjZMMTIuOCw4LjlMMTEuMiwxN0w2LjMsMTZMNS45LDE4TDEyLjksMTkuNE00LDlBMSwxIDAgMCwxIDMsOEExLDEgMCAwLDEgNCw3SDdWOUg0TTUsNUExLDEgMCAwLDEgNCw0QTEsMSAwIDAsMSA1LDNIMTBWNUg1TTMsMTNBMSwxIDAgMCwxIDIsMTJBMSwxIDAgMCwxIDMsMTFIN1YxM0gzWiIvPjwvc3ZnPg==';


    public function run()
    {
        $this->setup_cpt();
        $this->register_cpt();
        $this->switch_on_metaboxes();
        $this->add_admin_view();
        $this->register_template_folder();
        $this->register_sidebar();
        $this->isotope_filters();
        $this->enqueue_css();
        $this->register_transform_filters();
    }


    public function setup_cpt()
    {
        $this->cpt = new cpt\create_cpt;
        $this->cpt->set_singular(ucfirst($this->singular));
        $this->cpt->set_icon($this->svgdata_icon);
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
        new filters\admin_archive_view_by_playlist_order($this->singular . '_category', $this->singular);
    }

    public function register_template_folder()
    {
        new filters\register_template_folder($this->singular);
    }

    public function register_sidebar()
    {
        new register\sidebar(ucfirst($this->singular));
    }

    public function isotope_filters()
    {
        new filters\isotope_filters;
    }

    public function enqueue_css()
    {
        new filters\enqueue_css_in_footer($this->singular);
    }

    public function register_transform_filters()
    {
        new filters\transforms\parsedown;
        new filters\transforms\tailwind;
        new filters\transforms\p_1;
        new filters\transforms\h2_remove;
        new filters\transforms\tag_hide;
    }

}