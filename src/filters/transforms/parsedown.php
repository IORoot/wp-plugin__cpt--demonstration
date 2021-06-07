<?php

namespace andyp\cpt\demonstration\filters\transforms;
/**
 * Filters content for Markdown and converts it to HTML.
 */
class parsedown {

    public function __construct()
    {
        add_filter('cpt_demonstration_transforms', [$this, 'callback'], 10, 1 );
    }

    public function callback($text)
    {
        $Parsedown = new \Parsedown();
        return $Parsedown->setBreaksEnabled(true)->text($text);
    }

}
