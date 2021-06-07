
<?php 

	$videoId = $post->meta['videoId'][0];
    $thumbnail = null;
    
    if (!empty($post->image))
    {
        $thumbnail = 'style="background-image: url(\'' . $post->image . '\');"';
    }

    if (empty($videoId)){
        the_post_thumbnail(null, ['class' => '']);
    } else {
        echo '<lite-youtube 
                    class="w-full h-96 bg-cover bg-center bg-no-repeat fill-blue-500 flex cursor-pointer rounded-2xl overflow-hidden" 
                    id="ytplayer" 
                    videoid="'. $videoId .'" 
                    ' . $thumbnail . '>' . PHP_EOL;

        echo '<svg class="h-24 w-24 m-auto" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M10,16.5V7.5L16,12M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/></svg>'. PHP_EOL;
        echo '</lite-youtube>'. PHP_EOL;
    }
?>
