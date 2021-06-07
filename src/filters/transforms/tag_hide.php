<?php

namespace andyp\cpt\demonstration\filters\transforms;

/**
 * Hide the tag:beginner tags.
 */
class tag_hide {

    public function __construct()
    {
        add_filter('cpt_demonstration_transforms', [$this, 'callback'], 50, 1 );
    }

    public function callback($text)
    {
        return preg_replace('/\" >tag/i',' hidden">tag',$text);
    }

}
