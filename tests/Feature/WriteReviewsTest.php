<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Review;

class WriteReviewsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_review()
    {
        $review = factory(Review::class)->make();

        $this->post('api/reviews', $review->toArray())->assertSuccessful();
        $this->assertDatabaseHas('reviews', [
            'body' => $review->body,
            'rating' => $review->rating
        ]);
    }

    /** @test */
    public function a_review_must_have_an_author()
    {
        $review = factory(Review::class)->make(['author' => '']);

        $this->post('api/reviews', $review->toArray())->assertSessionHasErrors();
        $this->assertDatabaseMissing('reviews', ['body' => $review->body]);
    }

    /** @test */
    public function a_review_must_have_a_body()
    {
        $review = factory(Review::class)->make(['body' => '']);

        $this->post('api/reviews', $review->toArray())->assertSessionHasErrors();
        $this->assertDatabaseMissing('reviews', ['author' => $review->author]);
    }
}
