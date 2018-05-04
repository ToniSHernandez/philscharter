<?php

namespace Tests\Feature;

use App\Lead;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Service;
use Carbon\Carbon;

class DeleteLeadsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_lead_can_be_deleted()
    {
        $serviceId = factory(Service::class)->create()->id;
        $requested_date = Carbon::now()->addMonth()->format('Y-m-d');
        $lead = [
            'name'    => 'Joe Testerson',
            'phone'   => '850-555-5555',
            'email'   => 'daron@kerigan.com',
            'message' => 'Message contents',
            'service_id' => $serviceId,
            'requested_date' => $requested_date
        ];

        $this->post('/api/leads', $lead)->assertSuccessful();
        $lead = Lead::first();

        $this->assertDatabaseHas('leads', ['id' => $lead->id]);
        $this->delete('api/leads/'. $lead->id)->assertSuccessful();
        $this->assertDatabaseMissing('leads', ['id' => $lead->id]);
    }
}
