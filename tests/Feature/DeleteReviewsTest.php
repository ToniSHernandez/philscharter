<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Review;

class DeleteReviewsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_review_can_be_deleted()
    {
        $review = factory(Review::class)->create();

        $this->delete('api/reviews/'. $review->id)->assertSuccessful();
        $this->assertDatabaseMissing('reviews', [
            'id' => $review->id
        ]);
    }
}
