<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\VideoViewer;

class IncreaseCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(VideoViewer $event)
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this -> updateViewr($event -> video);
    }

    function updateViewr($video)
    {
        $video -> viewers = $video->viewers + 1;
        $video -> save();
    }
}
