<?php

namespace Tests\Feature;

use App\User;
use App\Service;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateServicesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_can_update_services()
    {
        $this->login();
        $updatedTitle = 'Here is the updated title';
        $service = factory(Service::class)->create();

        $this->patch('api/services/'. $service->id, [
            'title' => $updatedTitle
        ])->assertSuccessful();
        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'title' => $updatedTitle
        ]);

        $this->assertCount(1, Service::all());
    }

    protected function login()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }
}
