<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

use App\Models\Customer;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(50);

        return Inertia::render('Customers/Index', [
            'customers' => $customers,
        ]);
    }

    public function create()
    {
        return Inertia::render('Customers/Create');
    }

    public function store(CustomerRequest $request)
    {
        $validated = $request->validated();

        Customer::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'tel' => $validated['tel'],
            'fax' => $validated['fax'],
            'address' => $validated['address'],
            'attn' => $validated['attn'],
            'remark' => $validated['remark'],

        ]);

        return redirect()->route('customers.index');
    }

    public function edit(Customer $customer)
    {
        return Inertia::render('Customers/Edit', [
            'customer' => $customer,
        ]);
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        $validated = $request->validated();

        $customer->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'tel' => $validated['tel'],
            'fax' => $validated['fax'],
            'address' => $validated['address'],
            'attn' => $validated['attn'],
            'remark' => $validated['remark'],
        ]);

        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index');
    }
}
