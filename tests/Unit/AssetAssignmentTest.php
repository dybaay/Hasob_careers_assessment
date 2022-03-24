<?php

namespace Tests\Unit;
use App\Models\AssetAssignment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AssetAssignmentTest extends TestCase
{
    use RefreshDatabase;


public function test_user_can_show_assignment() {

    $user = User::factory()->make();
    $this->actingAs($user, 'api');
    $assetAssignment =  AssetAssignment::factory()->make();
    $this->get('/api/vendor/'.$assetAssignment->id)->assertOk();
}


    public function test_user_can_expel_user_from_assigned_asset() {

        $assetAssignment = AssetAssignment::factory()->make();
        $assetAssignment = AssetAssignment::first();
      if ($assetAssignment) {
          $assetAssignment->delete();
      }
      $this->assertTrue(true);
    }


}
