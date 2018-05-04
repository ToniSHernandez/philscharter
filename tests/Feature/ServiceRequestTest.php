<?php

namespace Tests\Feature;

use App\Lead;
use App\Service;
use Tests\TestCase;
use App\ServiceRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceRequestTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_service_request_can_be_created()
    {
        $serviceRequest = factory(ServiceRequest::class)->make()->toArray();

        $this->post(route('api.service-requests.store'), $serviceRequest)->assertSuccessful()->assertJson($serviceRequest);

        $this->assertDatabaseHas('service_requests', $serviceRequest);
    }

    /** @test */
    public function it_can_show_a_list_of_service_requests()
    {
        $serviceRequest = factory(ServiceRequest::class)->create();

        $this->get(route('api.service-requests.index'))->assertSuccessful()->assertJsonFragment(['id' => $serviceRequest->id]);
    }

    /** @test */
    public function it_can_display_a_single_service_request()
    {
        $serviceRequest = factory(ServiceRequest::class)->create();

        $this->get(route('api.service-requests.show', $serviceRequest->id))->assertSuccessful()->assertJson($serviceRequest->toArray());
    }

    /** @test */
    public function a_service_request_can_be_updated()
    {
        $serviceRequest = factory(ServiceRequest::class)->create();
        $newComments = 'Here are the new comments';

        $this->assertNotEquals($serviceRequest->comments, $newComments);

        $this->patch(route('api.service-requests.update', $serviceRequest->id), ['comments' => $newComments])->assertSuccessful();

        $this->assertDatabaseMissing('service_requests', [
            'id'       => $serviceRequest->id,
            'comments' => $serviceRequest->comments
        ]);

        $this->assertDatabaseHas('service_requests', [
            'id'       => $serviceRequest->id,
            'comments' => $newComments
        ]);
    }

    /** @test */
    public function a_service_request_can_be_deleted()
    {
        $serviceRequest = factory(ServiceRequest::class)->create();

        $this->assertDatabaseHas('service_requests', ['id' => $serviceRequest->id]);
        $this->delete(route('api.service-requests.destroy', $serviceRequest->id))->assertSuccessful();
        $this->assertDatabaseMissing('service_requests', ['id' => $serviceRequest->id]);
    }

    /** @test */
    public function a_lead_is_generated_when_a_service_is_requested()
    {
        $serviceRequest = factory(ServiceRequest::class)->make()->toArray();
        $leads = Lead::all();

        $this->assertEmpty($leads);

        $this->post(route('api.service-requests.store'), $serviceRequest)->assertSuccessful();

        $leads = Lead::all();

        $this->assertNotEmpty($leads);
        $this->assertDatabaseHas('leads', ['message' => $serviceRequest['comments']]);
    }
}
