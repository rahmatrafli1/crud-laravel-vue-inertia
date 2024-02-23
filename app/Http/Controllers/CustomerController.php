<?php

namespace App\Http\Controllers;

use COM;
use Inertia\Inertia;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateCustomerRequest;

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

        return Redirect::route('customers.index')->with('message', 'Create Customer successfully!');
    }

    public function show(Customer $customer)
    {
        return Inertia::render('show', ['customer' => $customer]);
    }

    public function edit(Customer $customer)
    {
        return Inertia::render('edit', ['customer' => $customer]);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $validate = $request->validated();

        $customer->update($validate);

        return Redirect::route('customers.index')->with('message', 'Update Customer successfully!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return Redirect::route('customers.index')->with('message', 'Delete Customer successfully!');
    }
}
