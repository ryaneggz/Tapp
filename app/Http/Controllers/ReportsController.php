<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Employee;
use App\User;
use App\Timecard;

class ReportsController extends Controller
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
        $reports = Report::orderBy('id', 'desc')->paginate(30);
        // return $reports;
        return view('reports.index')->with(
            [
                'reports' => $reports
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // Validate the store request
        $this->validate($request, [
            'pay_period_start' => 'required',
            'pay_period_end' => 'required',
        ]);

        // Save as timestamp variables
        $pay_period_start = strtotime($request->pay_period_start);
        $pay_period_end = strtotime($request->pay_period_end);

        echo "pay_period_start " . $pay_period_start . "<br>";
        echo "pay_period_end " . $pay_period_end . "<br>";
        
        

        // return $timecards;

        // Get list of employees
        $employees = Employee::all();
        
        // Foreach employee in list..
        foreach($employees as $employee) {

            $total_seconds = Timecard::all()
            ->where('employee_id', '=', $employee->id)
            ->where('time_in', '>=', $pay_period_start)
            ->where('time_out', '<=', $pay_period_end)
            ->sum('total_time');

            $hours = floor($total_seconds / 3600);
            $minutes = floor(($total_seconds / 60) % 60);
            $seconds = $total_seconds % 60;

            $total_hours = "$hours hours $minutes mins $seconds secs";

            // Create each Report
            $report = new Report;
            $report->employee_id = $employee->id;
            $report->pay_period_start = $pay_period_start;
            $report->pay_period_end = $pay_period_end;
            $report->total_hours = $total_hours;
            $report->save();
        }

        return redirect('/reports')->with('success', 'Report Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::find($id);
        $user_employee_id = $report->employee_id;
        $employee = Employee::find($user_employee_id);
        $employee_name = $employee->user->name;
        return view('reports.show')->with(
            [
                'report' => $report,
                'employee_name' => $employee_name
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::find($id);
        $report->delete();

        return redirect('/reports')->with('success', 'Report Removed');
    }
}
