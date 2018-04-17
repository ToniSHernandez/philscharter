<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lead;

class ReadLeadsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_a_list_of_leads()
    {
        $lead = factory(Lead::class)->create();
        $this->get('/leads')->assertSuccessful()
            ->assertJsonFragment([
                'id' => $lead->id
            ]);
    }

    /** @test */
    public function a_user_can_view_a_single_lead()
    {
        $lead = factory(Lead::class)->create();
        $this->get('/leads/'. $lead->id)->assertSuccessful()
            ->assertJsonFragment([
                'id' => $lead->id
        ]);
    }
}
