<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Use Employee models
        $employees = Employee::orderBy('id','desc')->paginate(3);
        return view('index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return the create view
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
         * Below the code for validation 
         */
         $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees,email|email',
            'joining_date' => 'required',
            'salary' => 'required'
        ]);

        // Below the code for handle the request
        // dd($request->all()); // dd for dump and die show the what server send to us
        $data = $request->except('_token');
        Employee::create($data);
        // Redirect
        return redirect()->route('employee.index')->withMessage('Employee has been Created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        // return to edit and set the employee in compact
        return view('edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        /**
         * Below the code for validation 
         */
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees,email,'.$employee->id.'|email',
            'joining_date' => 'required',
            'salary' => 'required'
        ]);

        // Update the user data
         $data = $request->all();        
         $employee->update($data); // This is also mass assginment
         return redirect(route('employee.edit',$employee->id))->withSucess('Employee updated SucessFully');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete(); // mass assignment
        return redirect()->route('employee.index');
        // return view('index');

    }
}
