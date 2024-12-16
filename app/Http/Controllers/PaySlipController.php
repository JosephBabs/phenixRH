<?php

namespace App\Http\Controllers;

use App\Models\PaySlip;
use App\Models\Employee;
use Illuminate\Http\Request;

class PaySlipController extends Controller
{
    // Display a listing of the pay slips
    public function index()
    {
        $paySlips = PaySlip::with('employee')->get();
        return view('paySlips.index', compact('paySlips'));
    }

    // Show the form for creating a new pay slip
    public function create()
    {
        $employees = Employee::all();
        return view('paySlips.create', compact('employees'));
    }

    // Store a newly created pay slip in storage
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'gross_salary' => 'required|numeric',
            'tax' => 'required|numeric',
            'net_salary' => 'required|numeric',
            'pay_date' => 'required|date',
        ]);

        PaySlip::create($request->all());
        return redirect()->route('paySlips.index')->with('success', 'Pay slip created successfully.');
    }

    // Display the specified pay slip
    public function show(PaySlip $paySlip)
    {
        return view('paySlips.show', compact('paySlip'));
    }

    // Show the form for editing the specified pay slip
    public function edit(PaySlip $paySlip)
    {
        $employees = Employee::all();
        return view('paySlips.edit', compact('paySlip', 'employees'));
    }

    // Update the specified pay slip in storage
    public function update(Request $request, PaySlip $paySlip)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'gross_salary' => 'required|numeric',
            'tax' => 'required|numeric',
            'net_salary' => 'required|numeric',
            'pay_date' => 'required|date',
        ]);

        $paySlip->update($request->all());
        return redirect()->route('paySlips.index')->with('success', 'Pay slip updated successfully.');
    }

    // Remove the specified pay slip from storage
    public function destroy(PaySlip $paySlip)
    {
        $paySlip->delete();
        return redirect()->route('paySlips.index')->with('success', 'Pay slip deleted successfully.');
    }
}

