<?php

namespace App\Listeners;

use App\Events\ImageSize;
use App\Models\Online;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GoImageResizing
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ImageSize $event
     * @return void
     */
    public function handle(ImageSize $event)
    {
        $img = Image::make(Storage::get($event->fileName));
        $img->resize($img->width() - 1, $img->height() - 1);
        $img->save(storage_path('app/' . $event->fileName), 75, $event->format);
    }
}
