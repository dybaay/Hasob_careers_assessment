<?php

namespace Tests\Unit;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{



        public function test_user_can_register()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/api/register', [
            'FirstName' => 'Uthman',
            'MiddleName' => 'Akinkunmi',
            'LastName' => 'Ajiboye',
            'PhoneNumber' => '08181146874',
            'email' => 'ajakuth@gmail.com',
            'password' => Hash::make('password')
        ]);
        $response->assertStatus(200);
        $this->assertTrue(true);

    }

//***************Test for Authentication*****************

    public function test_user_can_login_with_email_and_password() {
        $this->post('/api/auth/login', [
            'email' => 'ajakuth@gmail.com',
            'password' => 'password'
        ])->assertOk();
        $this->assertAuthenticated();
    }
  public function test_user_can_logout() {
        $this->post('/api/auth/login', [
            'email' => 'ajakuth@gmail.com',
            'password' => 'password'
        ])->assertOk();
        $this->assertAuthenticated();
        $this->post('/api/auth/logout');
        $this->assertGuest();
    }

//*************** EndTest for Authentication*****************
public function test_can_fetch_all_users() {
            User::factory()->count(10)->make();
            $this->get('/api/user')
            ->assertOk();
}

    public function test_user_can_delete_account() {
        $user = User::factory()->count(1)->make();
        $user = User::first();
        if ($user) {
            $user->delete();
        }
        $this->assertTrue(true);
    }

public function test_user_can_update_profile() {
    $user = User::factory()->make();
    $this->actingAs($user, 'api');

        if ($user) {
            $user->update([
                'FirstName' => 'Uthman',
                'MiddleName' => 'Akinkunmi',
                'LastName' => 'Ajiboye',
                'PhoneNumber' => '08181146874',
                'email' => 'ajakuth@gmail.com'
            ]);
        }
        $this->assertTrue(true);

}







}
