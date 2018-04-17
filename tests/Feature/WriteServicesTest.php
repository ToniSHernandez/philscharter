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
    public function an_unauthenticated_user_cannot_create_a_service()
    {
        $service = factory(Service::class)->make();
        $this->post('/services', $service->toArray())->assertRedirect();
    }

    /** @test */
    public function an_authenticated_user_can_create_a_service()
    {
        $this->login();
        $service = factory(Service::class)->make();
        $this->post('/services', [
            'title'             => $service->title,
            'rate'              => $service->rate,
            'short_description' => $service->short_description,
            'long_description'  => $service->long_description
        ])->assertSuccessful();
        $this->assertDatabaseHas('services', $service->toArray());
    }

    /** @test */
    public function a_service_must_have_a_title()
    {
        $this->login();
        $service = factory(Service::class)->make();

        $this->post('/services', [
            'title'             => '',
            'rate'              => $service->rate,
            'short_description' => $service->short_description,
            'long_description'  => $service->long_description
        ])->assertSessionHasErrors();
    }

    /** @test */
    public function a_service_must_have_a_rate()
    {
        $this->login();
        $service = factory(Service::class)->make();

        $this->post('/services', [
            'title'             => $service->title,
            'rate'              => '',
            'short_description' => $service->short_description,
            'long_description'  => $service->long_description
        ])->assertSessionHasErrors();
    }

    /** @test */
    public function a_title_must_be_less_than_192_characters()
    {
        $this->login();
        $service = factory(Service::class)->make();

        $this->post('/services', [
            'title'             => str_repeat('a', 192),
            'rate'              => $service->rate,
            'short_description' => $service->short_description,
            'long_description'  => $service->long_description
        ])->assertSessionHasErrors();


        $this->post('/services', [
            'title'             => str_repeat('a', 191),
            'rate'              => $service->rate,
            'short_description' => $service->short_description,
            'long_description'  => $service->long_description
        ])->assertSuccessful();
    }

    /** @test */
    public function a_rate_must_be_numeric()
    {
        $this->login();
        $service = factory(Service::class)->make();

        $this->post('/services', [
            'title'             => $service->title,
            'rate'              => 'Johnny Foureyes',
            'short_description' => $service->short_description,
            'long_description'  => $service->long_description
        ])->assertSessionHasErrors();

        $this->post('/services', [
            'title'             => $service->title,
            'rate'              => 300,
            'short_description' => $service->short_description,
            'long_description'  => $service->long_description
        ])->assertSuccessful();

    }

    protected function login()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }
}
