<?php

namespace tests\Feature;

use App\Models\Customers;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use tests\TestCase;


class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function test_organization_creation()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/customer', [
            'name' => 'New Organization',
            'phone' => 'New Code',
            'address' => 'New Code'
        ]);


        $this->assertDatabaseHas('customers', [
            'name' => 'New Organization',
            'phone' => 'New Code',
            'address' => 'New Code'
        ]);
    }

    public function test_title_mush_be_unique()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        Customers::factory()->create([
            'name' => 'New Organization',
            'phone' => 'New Code',
            'address' => 'New Code'
        ]);


        $this->assertDatabaseHas('/customer', [
            'name' => 'New Organization',
            'phone' => 'New Code',
            'address' => 'New Code'
        ]);

        // $response->assertSessionHasErrors(['name' => 'organizations code already been taken.']);
    }

    public function test_organization_update()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $organization = $this->post('/customer', [
            'name' => 'New Organization',
            'phone' => 'New Code',
            'address' => 'New Code'
        ]);

        $response = $this->put("/customer/{$organization->id}", [
            'name' => 'Update Organization',
            'phone' => 'Update Code',
            'address' => 'Update Code'
        ]);

        $response->assertRedirect("/customer/{$organization->id}");
        $this->assertDatabaseHas('/customer', [
            'name' => 'Update Organization',
            'phone' => 'Update Code',
            'address' => 'Update Code'
        ]);
    }
};
