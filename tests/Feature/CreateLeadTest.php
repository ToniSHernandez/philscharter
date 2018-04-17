<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lead;
use PHPUnit\Framework\OutputError;

class CreateLeadTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_lead_can_be_created()
    {
        $lead = [
            'name' => 'Joe Testerson',
            'phone' => '850-555-5555',
            'email' => 'daron@kerigan.com',
            'message' => 'Message contents',
        ];

        $this->post('/leads', $lead)->assertSuccessful();
        $this->assertDatabaseHas('leads', $lead);
        $this->fail('Do lead update tests next');
    }
}
