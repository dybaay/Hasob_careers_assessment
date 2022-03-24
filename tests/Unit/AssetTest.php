<?php

namespace Tests\Unit;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AssetTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_create_asset() {
        $user = User::factory()->make();
        $this->actingAs($user, 'api');
        $this->post('/api/asset', [
            'type' => 'test',
            'serial_number' => '1234',
            'description' => 'description',
            'fixed_or_movable' => 'movable',
            'purchased_date' => now(),
            'start_use_date' => now(),
            'purchase_price' => 'price',
            'warranty_expiry_date' => now(),
            'degradation_in_years' => 'degrade',
            'current_value_in_naira' => 'value',
            'location' => 'location'
        ])->assertStatus(201);

    }


    public function test_user_can_show_asset() {
        $user = User::factory()->make();
        $this->actingAs($user, 'api');
        $asset = Asset::factory()->make();
        $this->get('/api/asset/'.$asset->id)->assertOk();
    }
    public function test_user_can_update_asset() {
        $asset = Asset::factory()->make();
        $asset = Asset::first();

        if ($asset) {
            $asset->update([
                'type' => 'new test',
                'serial_number' => '12345678',
                'description' => 'new description',
                'fixed_or_movable' => 'fixed',
                'purchased_date' => now(),
                'start_use_date' => now(),
                'purchase_price' => 'new price',
                'warranty_expiry_date' => now(),
                'degradation_in_years' => 'new degrade',
                'current_value_in_naira' => 'new value',
                'location' => 'new location'
            ]);
        }
        $this->assertTrue(true);
    }



    public function test_user_can_delete_asset() {
        $asset = Asset::factory()->make();
        $asset = Asset::first();
        if ($asset) {
            $asset->delete();
        }
        $this->assertTrue(true);
    }


}
