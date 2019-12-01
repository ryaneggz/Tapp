<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Summary;
use App\Employee;
use App\Admin;

class SummariesController extends Controller
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
        $user_id = auth()->user()->id;
        $admin = Admin::where('user_id', '=', $user_id)->first();
        $employee = Employee::where('user_id', '=', $user_id)->first();

        $summaries = Summary::orderBy('created_at','desc')->paginate(10);
        return view('summaries.index')->with(
            [
                'summaries' => $summaries,
                'admin' => $admin,
                'employee' => $employee
            ]
        );
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $employee = Employee::where('user_id', '=', $user_id)->first();
        $admin = Admin::where('user_id', '=', $user_id)->first();

        if($employee) {
            $employees = Employee::all();
            return view('summaries.create')->with(
                [
                    'employees' => $employees,
                    'admin' => $admin,
                    'employee' => $employee
                ]
            );
        } else {
            return redirect('/summaries');
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
            'body' => 'required',
        ]);

        $user_id = auth()->user()->id;
        // Find the employee equal to user_id
        $employee = Employee::where('user_id', '=', $user_id)->first();

        // Create Summary
        $summary = new Summary;
        $summary->employee_id = $employee->id;
        $summary->body = $request->input('body');
        $summary->save();

        return redirect('/summaries')->with('success', 'Summary Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = auth()->user()->id;
        $admin = Admin::where('user_id', '=', $user_id)->first();
        $employee = Employee::where('user_id', '=', $user_id)->first();

        $summary = Summary::find($id);
        return view('summaries.show')->with(
            [
                'summary' => $summary,
                'admin' => $admin,
                'employee' => $employee
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $summary = Summary::find($id);
        $employee_id = $summary->employee_id;
        $employees = Employee::all();

        $user_id = auth()->user()->id;
        $employee = Employee::where('user_id', '=', $user_id)->first();
        $admin = Admin::where('user_id', '=', $user_id)->first();

        if($employee->id !== $summary->employee->id) {
            return redirect('/summaries')->with('error', 'Unauthorized Page');
        }

        return view('summaries.edit')->with(
            [
                'summary' => $summary,
                'employee_id' => $employee_id,
                'employees' => $employees,
                'admin' => $admin,
                'employee' => $employee
            ]
        );
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
            'body' => 'required',
        ]);

        // Create Summary
        $summary = Summary::find($id);
        $summary->body = $request->input('body');
        $summary->save();

        return redirect('/summaries')->with('success', 'Summary Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $summary = Summary::find($id);

        if(auth()->user()->id !== $summary->employee->user->id) {
            return redirect('/summaries')->with('error', 'Unauthorized Page');
        }

        $summary->delete();
        
        // After deleteing redirect back to object index
        return redirect('/summaries')->with('success', 'Summary Removed');
    }
}
