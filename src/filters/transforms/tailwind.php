<?php

namespace andyp\cpt\demonstration\filters\transforms;

/**
 * After content has been filtered for markdown, add custom tailwind classes
 */
class tailwind {

    public $text;
    public $matches;

    public function __construct()
    {
        add_filter('cpt_demonstration_transforms', [$this, 'callback'], 20, 1 );
    }

    public function callback($text)
    {
        $this->text = $text;
        $this->match_open_tag();
        $this->array_unique();
        $this->loop_matches();
        
        return $this->text;
    }

    public function match_open_tag()
    {
        preg_match_all('/<([\w]+)/i', $this->text, $this->matches);
    }

    public function array_unique()
    {
        $this->matches[1] = array_unique($this->matches[1]);
    }

    public function loop_matches()
    {
        foreach ($this->matches[1] as $key => $match)
        {
            if (!method_exists($this, $match)){ continue; }

            $tailwind_classes = $this->$match();

            $transform = $this->matches[0][$key] . ' class="'.$tailwind_classes.'" ';

            $this->text = str_replace($this->matches[0][$key], $transform, $this->text);
        }
    }


    public function h3()
    {
        return 'text-5xl mb-12 font-thin';
    }


    public function hr()
    {
        return 'border-goo my-24 border-4';
    }


    public function p()
    {
        return 'text-2xl lg:w-4/5 mb-4 leading-relaxed';
    }

    public function ul()
    {
        return 'text-xl list-outside list-disc bg-night my-12 px-12 pt-12 pb-8 lg:w-4/5';
    }

    public function ol()
    {
        return 'text-xl list-outside list-decimal bg-night my-12 px-12 pt-12 pb-8 lg:w-4/5';
    }

    public function li()
    {
        return 'pb-4 leading-relaxed';
    }



}
