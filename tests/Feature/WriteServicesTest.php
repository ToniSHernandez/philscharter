<?php

namespace Tests\Feature;

use App\User;
use App\Service;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WriteServicesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_can_create_a_service()
    {
        $this->login();
        $service = factory(Service::class)->make();
        $this->post('api/services', $service->toArray())->assertSuccessful();
        $this->assertDatabaseHas('services', ['title' => $service->title]);
    }

    /** @test */
    public function a_service_must_have_a_title()
    {
        $this->login();
        $service = factory(Service::class)->make([
            'title' => ''
        ]);

        $this->post('api/services', $service->toArray())->assertSessionHasErrors();
    }

    /** @test */
    public function a_service_must_have_a_rate()
    {
        $this->login();
        $service = factory(Service::class)->make([
            'rate' => ''
        ]);

        $this->post('api/services', $service->toArray())->assertSessionHasErrors();
    }

    protected function login()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }
}
