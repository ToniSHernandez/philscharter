<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Review;

class ReadReviewsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_read_reviews()
    {
        $review = factory(Review::class)->create();
        $this->get('api/reviews')->assertSuccessful()->assertJsonFragment([
            'id' => $review->id,
            'body' => $review->body
        ]);
    }
}
