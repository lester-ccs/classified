<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\User;
use App\Listing;

class UserViewedListing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public $listing;
    /**
     * Create a new job instance.
     *
     * @return void
     * @param $user
     * @param $listing
     */
    public function __construct(User $user, Listing $listing)
    {
        $this->user = $user;
        $this->listing = $listing;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $viewed = $this->user->viewedListings; // a collection
        if ($viewed->contains($this->listing)) {
           $viewed->where('id', $this->listing->id)->first()->pivot->increment('count');

           return;
        }

        $this->user->viewedListings()->attach($this->listing, [
           'count' => 1 // inserted value
        ]);
    }
}
