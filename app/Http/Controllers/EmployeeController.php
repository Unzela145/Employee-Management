<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Display a listing of employees
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    // Show the form for creating a new employee
    public function create()
    {
        return view('employees.create');
    }

    // Store a newly created employee in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|string|max:20',
            'department' => 'required|string|max:50',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index');
    }

    // Show the form for editing the specified employee
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    // Update the specified employee in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'phone' => 'required|string|max:20',
            'department' => 'required|string|max:50',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($validated);

        return redirect()->route('employees.index');
    }

    // Remove the specified employee from storage
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index');
    }
}

