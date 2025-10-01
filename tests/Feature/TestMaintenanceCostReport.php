<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Asset;
use App\Models\AssetMaintenance;
use App\Models\Department;
use App\Models\Floor;
use App\Models\Category;

class TestMaintenanceCostReport extends TestCase
{
    use RefreshDatabase;

    public function test_maintenance_cost_report_shows_cost_per_asset()
    {
        $user = User::factory()->create();
        $floor = Floor::factory()->create();
        $department = Department::factory()->create(['floor_id' => $floor->id]);
        $category = Category::factory()->create();
        $asset = Asset::factory()->create(['department_id' => $department->id, 'category_id' => $category->id]);
        $maintenance1 = AssetMaintenance::factory()->create(['asset_id' => $asset->id, 'cost' => 100]);
        $maintenance2 = AssetMaintenance::factory()->create(['asset_id' => $asset->id, 'cost' => 150]);

        $response = $this->actingAs($user)->get(route('reports.maintenance'));

        $response->assertStatus(200);
        $response->assertSee(number_format(100, 2));
        $response->assertSee(number_format(150, 2));
        $response->assertDontSee(number_format(250, 2));
    }
}
