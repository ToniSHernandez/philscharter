<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Service;

class ReadServicesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_unauthenticated_user_cannot_view_the_services_list()
    {
        $this->get('/services')->assertRedirect();
    }

    /** @test */
    public function an_authenticated_user_can_view_the_services_list()
    {
        $this->login();
        $this->get('/services')->assertSuccessful();
    }

    /** @test */
    public function an_authenticated_user_can_see_the_services_list()
    {
        $this->login();

        $service = factory(Service::class)->create();

        $this->get('/services')
            ->assertJsonFragment([
                'id' => $service->id,
                'title' => $service->title
            ]);
    }

    /** @test */
    public function an_authenticated_user_can_view_a_single_service()
    {
        $this->login();

        $service = factory(Service::class)->create();

        $this->get('/services/'. $service->id)
            ->assertJsonFragment([
                'title' => $service->title
            ]);
    }

    protected function login()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }
}
