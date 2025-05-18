<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(10);

        return Inertia::render('Customers/Index', [
            'customers' => $customers,
        ]);
    }
}
