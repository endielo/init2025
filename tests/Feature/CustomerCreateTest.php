<?php

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create a customer', function () {
    $response = $this->post('/customers', [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'attn' => 'Test Attn',
        'address' => 'Test Address',
        'tel' => '1234567890',
        'fax' => '0987654321',
        'remark' => 'Test Remark',
    ]);

    $response->assertRedirect(route('customers.index'));

    expect(Customer::where('email', 'john.doe@example.com')->exists())->toBeTrue();
});