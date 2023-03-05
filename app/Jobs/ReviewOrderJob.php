<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Api\Review\CreateOne\CreateOneReview;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReviewOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public object $review)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CreateOneReview $createOneReview)
    {
        $user = User::query()->findOrFail($this->review->userId);
        $createOneReview($user, $this->review->text, $this->review->productId, $this->review->rating, $this->review->soi);
    }
}
