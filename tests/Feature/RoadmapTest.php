<?php

namespace Tests\Feature;

use App\Models\Roadmap;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoadmapTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_shows_list_of_roadmaps()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $roadmaps = Roadmap::factory(10)->create();

        $response = $this
            ->actingAs($user)
            ->get('/roadmaps');

        $response->assertStatus(200);
        $response->assertSee('Roadmaps');
        $response->assertSee($roadmaps[0]->commodity->name);
        $response->assertSee($roadmaps[0]->office->name);
        $response->assertSee($roadmaps[0]->start_date);
    }
}
