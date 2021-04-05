<?php

namespace Tests\Feature;

use App\Models\ProgressReport;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProgressReportsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @group progress-reports-index
     */
    public function test_it_lists_down_progress_reports()
    {
        $user = User::factory()->create();

        $reports = ProgressReport::factory(5)->create();

        $response = $this
            ->actingAs($user)
            ->get('/progress-reports');

        $response->assertStatus(200);
        $response->assertSee($reports[0]->id);
        $response->assertSee($reports[0]->report_period->name);
        $response->assertSee($reports[0]->report_period->attachment_path);
        $response->assertSee($reports[0]->report_period->attachment_url);
        $response->assertSee($reports[0]->report_period->remarks);
    }

    /**
     * @group progress-report-show
     */
    public function test_it_shows_progress_report_by_id()
    {
        $user = User::factory()->create();

        $report = ProgressReport::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/progress-reports/{$report->id}");

        $response->assertStatus(200);
    }
}
