<?php

namespace App\Listeners;

use App\Events\DownloadBookEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class IncreaseBookDownloadsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(DownloadBookEvent $event)
    {
        if (!session()->has('BookIsDownloaded')) {
            $this->UpdateDownloadNums($event->book);
        }
    }

    public function UpdateDownloadNums($book)
    {
        $book->nums_of_download+=1;
        $book->save();
        session()->put('BookIsDownloaded',$book->id. Auth::user()->id);
    }
}
