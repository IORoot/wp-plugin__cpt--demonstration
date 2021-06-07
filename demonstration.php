<?php

/*
 * @wordpress-plugin
 * Plugin Name:       _ANDYP - CPT - Demonstration
 * Plugin URI:        http://londonparkour.com
 * Description:       <strong>📬CPT</strong> | Adds Labs CPT - Demonstration
 * Version:           1.0.0
 * Author:            Andy Pearson
 * Author URI:        https://londonparkour.com
 * Domain Path:       /languages
 */

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                            CONFIGURATION                                │
// └─────────────────────────────────────────────────────────────────────────┘
$config = [

    // Name of the Root custom post type to create.
    'post_type' => 'demonstration',

    // SVG Data URI for the wordpress sidemenu icon.
    'svgdata_icon' => 'data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMjQgMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTE2LjUsNS41QTIsMiAwIDAsMCAxOC41LDMuNUEyLDIgMCAwLDAgMTYuNSwxLjVBMiwyIDAgMCwwIDE0LjUsMy41QTIsMiAwIDAsMCAxNi41LDUuNU0xMi45LDE5LjRMMTMuOSwxNUwxNiwxN1YyM0gxOFYxNS41TDE1LjksMTMuNUwxNi41LDEwLjVDMTcuODksMTIuMDkgMTkuODksMTMgMjIsMTNWMTFDMjAuMjQsMTEuMDMgMTguNiwxMC4xMSAxNy43LDguNkwxNi43LDdDMTYuMzQsNi40IDE1LjcsNiAxNSw2QzE0LjcsNiAxNC41LDYuMSAxNC4yLDYuMUw5LDguM1YxM0gxMVY5LjZMMTIuOCw4LjlMMTEuMiwxN0w2LjMsMTZMNS45LDE4TDEyLjksMTkuNE00LDlBMSwxIDAgMCwxIDMsOEExLDEgMCAwLDEgNCw3SDdWOUg0TTUsNUExLDEgMCAwLDEgNCw0QTEsMSAwIDAsMSA1LDNIMTBWNUg1TTMsMTNBMSwxIDAgMCwxIDIsMTJBMSwxIDAgMCwxIDMsMTFIN1YxM0gzWiIvPjwvc3ZnPg==',
    
    // SLUG of Create a Taxonomy - Category
    'category' => 'demonstration_category',
    
    // SLUG of Create a Taxonomy - Tags
    'tags' => 'demonstration_tags',
];

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                           Register CONSTANTS                            │
//  └─────────────────────────────────────────────────────────────────────────┘
$upper = strtoupper($config['post_type']);
define( 'ANDYP_CPT_'.$upper.'_PATH', __DIR__ );
define( 'ANDYP_CPT_'.$upper.'_URL', plugins_url( '/', __FILE__ ) );
define( 'ANDYP_CPT_'.$upper.'_FILE',  __FILE__ );

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                    Register with ANDYP Plugins                          │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/acf/andyp_plugin_register.php';


// ┌─────────────────────────────────────────────────────────────────────────┐
// │                         Use composer autoloader                         │
// └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/vendor/autoload.php';

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                    Plugin Activation - once only.    		             │
// └─────────────────────────────────────────────────────────────────────────┘
new andyp\cpt\demonstration\setup\activate;


// ┌─────────────────────────────────────────────────────────────────────────┐
// │                        	   Initialise    		                     │
// └─────────────────────────────────────────────────────────────────────────┘
$cpt = new andyp\cpt\demonstration\initialise;
$cpt->set_config($config);
$cpt->run();

