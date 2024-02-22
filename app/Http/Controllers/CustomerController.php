<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return Inertia::render('index', ['customers' => $customers]);
    }

    public function create()
    {
        return Inertia::render('create');
    }

    public function store(CustomerRequest $request)
    {
        $validate = $request->validated();

        Customer::create($validate);

        return Redirect::route('customers.index')->with('success', 'Create Customer successfully');
    }

    public function show(Customer $customer)
    {
        return Inertia::render('show', ['customer' => $customer]);
    }
}
