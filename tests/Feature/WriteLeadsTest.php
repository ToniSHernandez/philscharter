<?php

namespace Tests\Feature;

use App\Lead;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Service;
use Carbon\Carbon;
use App\ServiceRequest;

class WriteLeadsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_lead_can_be_created()
    {
        $service = factory(Service::class)->create();

        $lead = [
            'name' => 'Joe Testerson',
            'service_id' => $service->id,
            'phone' => '850-555-5555',
            'email' => 'daron@kerigan.com',
            'message' => 'Message contents',
            'requested_date' => Carbon::now()->addMonth()->format('Y-m-d')
        ];

        $this->post('api/leads', $lead)->assertSuccessful();
        $this->assertDatabaseHas('leads', $lead);
    }
}
