<?php

namespace Tests\Feature;

use App\User;
use App\Service;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteServicesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_unauthenticated_user_cannot_delete_services()
    {
        $service = factory(Service::class)->create();

        $this->delete('/services/'. $service->id)->assertRedirect();
    }

    /** @test */
    public function an_authenticated_user_can_delete_services()
    {
        $this->login();
        $service = factory(Service::class)->create();

        $this->assertDatabaseHas('services', [
            'id' => $service->id
        ]);
        $this->delete('/services/'. $service->id)->assertSuccessful();
        $this->assertDatabaseMissing('services', [
            'id' => $service->id
        ]);
    }

    protected function login()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }
}
