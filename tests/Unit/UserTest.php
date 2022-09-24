<?php

namespace Tests\Unit;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function dataRoleProvider()
    {
        return [
            ['Admin', 'Admin', true],
            ['Admin', ['admin', 'Manager'], true],
            ['Admin', ['Client', 'Manager'], false],
            ['Manager', 'Admin', false],
            ['Client', 'Manager', false],
            ['Client', ['Client', 'Manager'], true],
        ];
    }

    /**
     *  @dataProvider dataRoleProvider
     */
    public function testHasAnyRole($roleName, $testRole, $expectedResult)
    {
        $role = Role::where('name', $roleName)->first();
        $user = User::factory()->create(['role_id' => $role->id]);

        $this->assertEquals($expectedResult, $user->hasAnyRole($testRole));
    }
}
