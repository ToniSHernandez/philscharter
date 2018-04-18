<?php

namespace Tests\Feature;

use App\Lead;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteLeadsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_lead_can_be_deleted()
    {
        $lead = [
            'name'    => 'Joe Testerson',
            'phone'   => '850-555-5555',
            'email'   => 'daron@kerigan.com',
            'message' => 'Message contents',
        ];

        $this->post('leads', $lead)->assertSuccessful();
        $lead = Lead::first();

        $this->assertDatabaseHas('leads', ['id' => $lead->id]);
        $this->delete('/leads/'. $lead->id)->assertSuccessful();
        $this->assertDatabaseMissing('leads', ['id' => $lead->id]);
    }
}
