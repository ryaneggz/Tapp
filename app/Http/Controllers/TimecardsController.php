<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timecard;
use App\Employee;

class TimecardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'kiosk']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // return Timecard::orderBy('time_in', 'desc')->paginate(30);
        $timecards = Timecard::orderBy('time_in', 'desc')->paginate(30);
        
        return view('timecards.index')->with('timecards', $timecards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timecards = Timecard::orderBy('time_in', 'desc')->paginate(30);
        // Get list of employees
        $employees = Employee::all();

        return view('timecards.create')->with(
            [
                'timecards' => $timecards,
                'employees' => $employees
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
            'employee_id' => 'required',
        ]);    
        
        // Create Timecard
        $timecard = new Timecard;
        // return 'STOPPED';
        $timecard->employee_id = $request->employee_id;
        $timecard->time_in = strtotime($request->time_in);
        if(isset($request->time_out)) {
            $timecard->time_out = strtotime($request->time_out);
            $timecard->total_time = $timecard->time_out - $timecard->time_in;
        } else {
            $timecard->time_out = 0;
            $timecard->total_time = 0;
        }
        
        // return $timecard->time_out;
        $timecard->save();

        return redirect('/timecards')->with('success', 'Timecard Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //    return Timecard::find($id);
       $timecard = Timecard::find($id);
       return view('timecards.show')->with('timecard', $timecard);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timecard = Timecard::find($id);
        $time_in = date('m/d/y | g:i:s A', $timecard->time_in);
        // return $time_in;
        $time_out = date('m/d/y | g:i:s A', $timecard->time_out);
        // Get list of all employees
        $employees = Employee::all();

        return view('timecards.edit')->with(
            [
                'timecard' => $timecard,
                'time_in' => $time_in,
                'time_out' => $time_out,
                'employees' => $employees
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
        // Validate the store request
        $this->validate($request, [
            'employee_id' => 'required',
        ]);
        
        // Create Timecard
        $timecard = Timecard::find($id);
        // Set Employee ID
        $timecard->employee_id = $request->employee_id;
        // Set time_in equal to the request string timestamped
        $timecard->time_in = strtotime($request->time_in);
        // If request is greater than 0..
        if($request->time_out > 0) {
            // Set time_out equal to the request string timestamped
            $timecard->time_out = strtotime($request->time_out);
            // Set time_out equal to the request string timestamped minus the time_in
            $timecard->total_time = strtotime($request->time_out) - $timecard->time_in;
        } else {
            // If value is zero, set values to zero
            $timecard->time_out = 0;
            $timecard->total_time = 0;
        }
    
        // Save timecard
        $timecard->save();

        return redirect('/timecards')->with('success', 'Timecard Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timecard = Timecard::find($id);
        $timecard->delete();

        return redirect('/timecards')->with('success', 'Timecard Removed');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kiosk()
    {
        return view('timecards.kiosk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $employee = Employee::where('card_number', '=', $request->card_number);
        return $employee;
    }


}
