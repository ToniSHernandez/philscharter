<?php

namespace Tests\Feature;

use App\User;
use App\Service;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class UpdateServicesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_can_update_services_copy()
    {
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

    /** @test */
    public function a_user_can_update_the_service_photo()
    {
        Storage::fake('public');

        $photo = UploadedFile::fake()->image('service_photo.jpg');

        $service = factory(Service::class)->create();
        $this->assertDatabaseHas('services', ['photo_url' => $service->photo_url]);

        $this->patch('/api/services/'. $service->id, [
            'photo' => $photo
        ])->assertSuccessful();

        Storage::disk('public')->assertExists('service_photos/'. $photo->hashName());
        $this->assertDatabaseHas('services', ['id' => $service->id, 'photo_url' => 'service_photos/'. $photo->hashName()]);
        $this->assertDatabaseMissing('services', ['photo_url' => $service->photo_url]);
    }

    protected function login()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }
}
