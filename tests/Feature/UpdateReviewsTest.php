<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Review;

class UpdateReviewsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_review_can_be_updated()
    {
        $review       = factory(Review::class)->create();
        $newBody      = 'Here is the new body';

        $this->patch('/reviews/'. $review->id, [
            'author'       => $review->author,
            'body'         => $newBody,
            'featured'     => $review->featured,
            'submitted_on' => $review->submitted_on,
            'source'       => $review->source,
            'rating'       => $review->rating
        ])->assertSuccessful();

        $this->assertDatabaseHas('reviews', [
            'body' => $newBody
        ]);
    }
}
