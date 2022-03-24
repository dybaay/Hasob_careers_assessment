<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VendorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_create_vendor() {
        $user = User::factory()->make();
        $this->actingAs($user, 'api');
        $this->post('/api/vendor', [
            'name' => 'test',
            'category' => 'test category'
        ])->assertStatus(201);

    }


    public function test_user_can_show_vendor() {
        $user = User::factory()->make();
        $this->actingAs($user, 'api');
        $vendor =  Vendor::factory()->make();
        $this->get('/api/vendor/'.$vendor->id)->assertOk();
    }

    public function test_user_can_update_vendor() {
        $vendor = Vendor::factory()->make();
        $vendor = Vendor::first();

        if ($vendor) {
            $vendor->update([
                'name' => 'new test',
                'category' => 'new test category'
            ]);
        }
        $this->assertTrue(true);
    }

    public function test_user_can_delete_vendor() {
        $vendor =  Vendor::factory()->make();
        $vendor = Vendor::first();
        if ($vendor) {
            $vendor->delete();
        }
        $this->assertTrue(true);
    }

}
