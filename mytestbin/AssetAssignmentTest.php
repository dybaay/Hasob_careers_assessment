<?php

namespace mytests;

use Tests\TestCase;

class AssetAssignmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
//    public function test_user_can_assign_asset() {
//        $user = User::factory()->make();
//        $this->actingAs($user, 'api');
//        $asset = Asset::factory()->make();
//        $this->post('/api/assign_asset/'.$asset->id, [
//            'assigned_by' => auth()->user()->email,
//            'user_id' => 2,
//            'due_date' => 'any date'
//        ])->assertStatus(201);
//    }
//
//public function test_user_can_update_assignment() {
//    $user = User::factory()->make();
//    $this->actingAs($user, 'api');
//     $asset = Asset::factory()->make();
//      $assignment = $this->post('/api/assign_asset/'.$asset->id, [
//            'assigned_by' => auth()->user()->email,
//            'user_id' => 2,
//            'due_date' => 'any date'
//        ])->assertStatus(201);
//    $this->json('PATCH', '/api/update_assignment/'.$assignment->id, [
//       'user_id' => 2,
//       'due_date' => 'any date'
//   ])->assertStatus(200);
//
//}
//
//public function test_user_can_show_assignment() {
//    $user = User::factory()->make();
//    $this->actingAs($user, 'api');
//     $asset = Asset::factory()->make();
//      $assignment = $this->post('/api/assign_asset/'.$asset->id, [
//            'assigned_by' => auth()->user()->email,
//            'user_id' => 2,
//            'due_date' => 'any date'
//        ])->assertStatus(201);
//    $this->get('/api/show_assignment/'.$assignment->id)->assertOk();
//}
//
//    public function test_user_can_expel_user_from_assigned_asset() {
//        $user = User::factory()->make();
//          $asset = Asset::factory()->make();
//      $assignment = $this->post('/api/assign_asset/'.$asset->id, [
//            'assigned_by' => auth()->user()->email,
//            'user_id' => 2,
//            'due_date' => 'any date'
//        ])->assertStatus(201);
//        $this->delete('/api/delete_assignment/'.$assignment->id)->assertOk();
//    }
}
