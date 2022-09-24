<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckRoleTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    public function dataRoleProvider()
    {
        return [
            ['Admin', 200],
            ['Manager', 403],
            ['Client', 403],
        ];
    }

    /**
     *  @dataProvider dataRoleProvider
     */
    public function testCheckRoles($roleName, $expectedResult)
    {
        $role = Role::where('name', $roleName)->first();
        $password = $this->faker()->password();
        $user = User::factory()->create(
            [
                'role_id' => $role->id,
                'password' => bcrypt($password),
            ]
        );

        $this->post('login', ['email' => $user->email, 'password' => $password]);
        $response = $this->get('allRoles');
        $response->assertStatus($expectedResult);
    }
}
