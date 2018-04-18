<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lead;

class UpdateLeadsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_lead_can_be_updated()
    {
        $lead = factory(Lead::class)->create();
        $name = 'Leady McLeaderton';

        $this->patch('/leads/'. $lead->id, [
            'name' => $name
        ])->assertSuccessful();
        $this->assertDatabaseHas('leads', [
            'id' => $lead->id,
            'name' => $name
        ]);
    }
}
