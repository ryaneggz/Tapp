<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\User;
use App\Admin;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check if User is Admin
        $user_id = auth()->user()->id;
        $admin = Admin::where('user_id', '=', $user_id)->first();

        if($admin) {
            $employees = Employee::orderBy('id','asc')->paginate(10);
            return view('employees.index')->with(
                [
                    'employees' => $employees,
                    'admin' => $admin
                ]
            );
        // If not Admin redirect
        } else {
            return redirect('/dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // Check if User is Admin
        $user_id = auth()->user()->id;
        $admin = Admin::where('user_id', '=', $user_id)->first();

        if($admin) {

            // Get list of Users
            $users = User::all();

            return view('employees.create')->with(
                [
                    'users' => $users,
                    'admin' => $admin
                ]
            );
        // If not Admin redirect
        } else {
            return redirect('/dashboard');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'card_number' => 'required',
        ]);

        // Create Summary
        $employee = new Employee;

        $employee->user_id = $request->input('user_id');
        $employee->card_number = $request->input('card_number');

        $employee->save();

        return redirect('/employees')->with('success', 'Employee Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Check if User is Admin
        $user_id = auth()->user()->id;
        $admin = Admin::where('user_id', '=', $user_id)->first();
        if($admin) {

            $employee = Employee::find($id);
            return view('employees.show')->with(
                [
                    'employee' => $employee,
                    'admin' => $admin
                ]
            );

        // If not Admin redirect
        } else {
            return redirect('/dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Check if User is Admin
        $user_id = auth()->user()->id;
        $admin = Admin::where('user_id', '=', $user_id)->first();
        if($admin) {

            $employee = Employee::find($id);
            return view('employees.edit')->with(
                [
                    'employee' => $employee,
                    'admin' => $admin
                ]
            );

        // If not Admin redirect
        } else {
            return redirect('/dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'card_number' => 'required',
        ]);

        // Create Summary
        $employee = Employee::find($id);

        $employee->user_id = $request->input('user_id');
        $employee->card_number = $request->input('card_number');

        $employee->save();

        return redirect('/employees')->with('success', 'Employee Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        
        // After deleteing redirect back to object index
        return redirect('/employees')->with('success', 'Employee Removed');
    }
}
