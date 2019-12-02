<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Admin;
use App\Schedule;

class SchedulesController extends Controller
{
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
        $employees = Employee::all(); 

        $schedules = Schedule::orderBy('id', 'desc')->paginate(1);

        foreach($schedules as $schedule) {
            //Morning
            $monday_morning = Employee::where('id', '=', $schedule->monday_morning)->first();
            $tuesday_morning = Employee::where('id', '=', $schedule->tuesday_morning)->first();
            $wednesday_morning = Employee::where('id', '=', $schedule->wednesday_morning)->first();
            $thursday_morning = Employee::where('id', '=', $schedule->thursday_morning)->first();
            $friday_morning = Employee::where('id', '=', $schedule->friday_morning)->first();
            $saturday_morning = Employee::where('id', '=', $schedule->saturday_morning)->first();
            $sunday_morning = Employee::where('id', '=', $schedule->sunday_morning)->first();

            //Afternoon
            $monday_afternoon = Employee::where('id', '=', $schedule->monday_afternoon)->first();
            $tuesday_afternoon = Employee::where('id', '=', $schedule->tuesday_afternoon)->first();
            $wednesday_afternoon = Employee::where('id', '=', $schedule->wednesday_afternoon)->first();
            $thursday_afternoon = Employee::where('id', '=', $schedule->thursday_afternoon)->first();
            $friday_afternoon = Employee::where('id', '=', $schedule->friday_afternoon)->first();
            $saturday_afternoon = Employee::where('id', '=', $schedule->saturday_afternoon)->first();
            $sunday_afternoon = Employee::where('id', '=', $schedule->sunday_afternoon)->first();

            // Evening
            $monday_evening = Employee::where('id', '=', $schedule->monday_evening)->first();
            $tuesday_evening = Employee::where('id', '=', $schedule->tuesday_evening)->first();
            $wednesday_evening = Employee::where('id', '=', $schedule->wednesday_evening)->first();
            $thursday_evening = Employee::where('id', '=', $schedule->thursday_evening)->first();
            $friday_evening = Employee::where('id', '=', $schedule->friday_evening)->first();
            $saturday_evening = Employee::where('id', '=', $schedule->saturday_evening)->first();
            $sunday_evening = Employee::where('id', '=', $schedule->sunday_evening)->first();

        }   

        // if this role..
        if($admin) {
            // Return view with variables
            return view('schedules.index')->with(
                [
                    'admin' => $admin,
                    'employee' => $employee,
                    'schedules' => $schedules,
                    'employees' => $employees,

                    //Mornings
                    'monday_morning' => $monday_morning,
                    'tuesday_morning' => $tuesday_morning,
                    'wednesday_morning' => $wednesday_morning,
                    'thursday_morning' => $thursday_morning,
                    'friday_morning' => $friday_morning,
                    'saturday_morning' => $saturday_morning,
                    'sunday_morning' => $sunday_morning,

                    //Mornings
                    'monday_afternoon' => $monday_afternoon,
                    'tuesday_afternoon' => $tuesday_afternoon,
                    'wednesday_afternoon' => $wednesday_afternoon,
                    'thursday_afternoon' => $thursday_afternoon,
                    'friday_afternoon' => $friday_afternoon,
                    'saturday_afternoon' => $saturday_afternoon,
                    'sunday_afternoon' => $sunday_afternoon,

                    //Mornings
                    'monday_evening' => $monday_evening,
                    'tuesday_evening' => $tuesday_evening,
                    'wednesday_evening' => $wednesday_evening,
                    'thursday_evening' => $thursday_evening,
                    'friday_evening' => $friday_evening,
                    'saturday_evening' => $saturday_evening,
                    'sunday_evening' => $sunday_evening,
                ]
            );
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
        $user_id = auth()->user()->id;
        $admin = Admin::where('user_id', '=', $user_id)->first();
        $employee = Employee::where('user_id', '=', $user_id)->first();
        $employees = Employee::all();

        $schedules = Schedule::orderBy('id', 'desc')->paginate(1);
        
        foreach($schedules as $schedule) {
            //Morning
            $monday_morning = $schedule->monday_morning;
            $tuesday_morning = $schedule->tuesday_morning;
            $wednesday_morning = $schedule->wednesday_morning;
            $thursday_morning = $schedule->thursday_morning;
            $friday_morning = $schedule->friday_morning;
            $saturday_morning = $schedule->saturday_morning;
            $sunday_morning = $schedule->sunday_morning;

            //Afternoon
            $monday_afternoon = $schedule->monday_afternoon;
            $tuesday_afternoon = $schedule->tuesday_afternoon;
            $wednesday_afternoon = $schedule->wednesday_afternoon;
            $thursday_afternoon = $schedule->thursday_afternoon;
            $friday_afternoon = $schedule->friday_afternoon;
            $saturday_afternoon = $schedule->saturday_afternoon;
            $sunday_afternoon = $schedule->sunday_afternoon;

            // Evening
            $monday_evening = $schedule->monday_evening;
            $tuesday_evening = $schedule->tuesday_evening;
            $wednesday_evening = $schedule->wednesday_evening;
            $thursday_evening = $schedule->thursday_evening;
            $friday_evening = $schedule->friday_evening;
            $saturday_evening = $schedule->saturday_evening;
            $sunday_evening = $schedule->sunday_evening;
        }

        // if this role..
        if($admin) {
            // Return view with variables
            return view('schedules.create')->with(
                [
                    'admin' => $admin,
                    'employee' => $employee,
                    'schedule' => $schedule,
                    'employees' => $employees,

                    //Mornings
                    'monday_morning' => $monday_morning,
                    'tuesday_morning' => $tuesday_morning,
                    'wednesday_morning' => $wednesday_morning,
                    'thursday_morning' => $thursday_morning,
                    'friday_morning' => $friday_morning,
                    'saturday_morning' => $saturday_morning,
                    'sunday_morning' => $sunday_morning,

                    //Mornings
                    'monday_afternoon' => $monday_afternoon,
                    'tuesday_afternoon' => $tuesday_afternoon,
                    'wednesday_afternoon' => $wednesday_afternoon,
                    'thursday_afternoon' => $thursday_afternoon,
                    'friday_afternoon' => $friday_afternoon,
                    'saturday_afternoon' => $saturday_afternoon,
                    'sunday_afternoon' => $sunday_afternoon,

                    //Mornings
                    'monday_evening' => $monday_evening,
                    'tuesday_evening' => $tuesday_evening,
                    'wednesday_evening' => $wednesday_evening,
                    'thursday_evening' => $thursday_evening,
                    'friday_evening' => $friday_evening,
                    'saturday_evening' => $saturday_evening,
                    'sunday_evening' => $sunday_evening,


                ]
            );
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

        // Create each Report
        $schedule = new Schedule;

        // Monday
        $schedule->monday_morning = $request->monday_morning;
        $schedule->monday_afternoon = $request->monday_afternoon;
        $schedule->monday_evening = $request->monday_evening;
        // Tuesday
        $schedule->tuesday_morning = $request->tuesday_morning;
        $schedule->tuesday_afternoon = $request->tuesday_afternoon;
        $schedule->tuesday_evening = $request->tuesday_evening;
        // Wednesday
        $schedule->wednesday_morning = $request->wednesday_morning;
        $schedule->wednesday_afternoon = $request->wednesday_afternoon;
        $schedule->wednesday_evening = $request->wednesday_evening;
        // Thursday
        $schedule->thursday_morning = $request->thursday_morning;
        $schedule->thursday_afternoon = $request->thursday_afternoon;
        $schedule->thursday_evening = $request->thursday_evening;
        // Friday
        $schedule->friday_morning = $request->friday_morning;
        $schedule->friday_afternoon = $request->friday_afternoon;
        $schedule->friday_evening = $request->friday_evening;
        // Saturday
        $schedule->saturday_morning = $request->saturday_morning;
        $schedule->saturday_afternoon = $request->saturday_afternoon;
        $schedule->saturday_evening = $request->saturday_evening;
        // Sunday
        $schedule->sunday_morning = $request->sunday_morning;
        $schedule->sunday_afternoon = $request->sunday_afternoon;
        $schedule->sunday_evening = $request->sunday_evening;

        // Save Schedule
        $schedule->save();

        return redirect('/schedules')->with('success', 'Report Created');
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
        $schedule = Schedule::find($id);

        //Morning
        $monday_morning = Employee::where('id', '=', $schedule->monday_morning)->first();
        $tuesday_morning = Employee::where('id', '=', $schedule->tuesday_morning)->first();
        $wednesday_morning = Employee::where('id', '=', $schedule->wednesday_morning)->first();
        $thursday_morning = Employee::where('id', '=', $schedule->thursday_morning)->first();
        $friday_morning = Employee::where('id', '=', $schedule->friday_morning)->first();
        $saturday_morning = Employee::where('id', '=', $schedule->saturday_morning)->first();
        $sunday_morning = Employee::where('id', '=', $schedule->sunday_morning)->first();

        //Afternoon
        $monday_afternoon = Employee::where('id', '=', $schedule->monday_afternoon)->first();
        $tuesday_afternoon = Employee::where('id', '=', $schedule->tuesday_afternoon)->first();
        $wednesday_afternoon = Employee::where('id', '=', $schedule->wednesday_afternoon)->first();
        $thursday_afternoon = Employee::where('id', '=', $schedule->thursday_afternoon)->first();
        $friday_afternoon = Employee::where('id', '=', $schedule->friday_afternoon)->first();
        $saturday_afternoon = Employee::where('id', '=', $schedule->saturday_afternoon)->first();
        $sunday_afternoon = Employee::where('id', '=', $schedule->sunday_afternoon)->first();

        // Evening
        $monday_evening = Employee::where('id', '=', $schedule->monday_evening)->first();
        $tuesday_evening = Employee::where('id', '=', $schedule->tuesday_evening)->first();
        $wednesday_evening = Employee::where('id', '=', $schedule->wednesday_evening)->first();
        $thursday_evening = Employee::where('id', '=', $schedule->thursday_evening)->first();
        $friday_evening = Employee::where('id', '=', $schedule->friday_evening)->first();
        $saturday_evening = Employee::where('id', '=', $schedule->saturday_evening)->first();
        $sunday_evening = Employee::where('id', '=', $schedule->sunday_evening)->first();
        

        if($admin) {
            // Return view with variables
            return view('schedules.show')->with(
                [
                    'admin' => $admin,
                    'employee' => $employee,
                    'schedule' => $schedule,

                    //Mornings
                    'monday_morning' => $monday_morning,
                    'tuesday_morning' => $tuesday_morning,
                    'wednesday_morning' => $wednesday_morning,
                    'thursday_morning' => $thursday_morning,
                    'friday_morning' => $friday_morning,
                    'saturday_morning' => $saturday_morning,
                    'sunday_morning' => $sunday_morning,

                    //Mornings
                    'monday_afternoon' => $monday_afternoon,
                    'tuesday_afternoon' => $tuesday_afternoon,
                    'wednesday_afternoon' => $wednesday_afternoon,
                    'thursday_afternoon' => $thursday_afternoon,
                    'friday_afternoon' => $friday_afternoon,
                    'saturday_afternoon' => $saturday_afternoon,
                    'sunday_afternoon' => $sunday_afternoon,

                    //Mornings
                    'monday_evening' => $monday_evening,
                    'tuesday_evening' => $tuesday_evening,
                    'wednesday_evening' => $wednesday_evening,
                    'thursday_evening' => $thursday_evening,
                    'friday_evening' => $friday_evening,
                    'saturday_evening' => $saturday_evening,
                    'sunday_evening' => $sunday_evening,
                ]
            );
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
        $user_id = auth()->user()->id;
        $admin = Admin::where('user_id', '=', $user_id)->first();
        $employee = Employee::where('user_id', '=', $user_id)->first();
        
        $employees = Employee::all();
        $schedule = Schedule::find($id);
        
        // foreach($schedules as $schedule) {
            //Morning
            $monday_morning = $schedule->monday_morning;
            $tuesday_morning = $schedule->tuesday_morning;
            $wednesday_morning = $schedule->wednesday_morning;
            $thursday_morning = $schedule->thursday_morning;
            $friday_morning = $schedule->friday_morning;
            $saturday_morning = $schedule->saturday_morning;
            $sunday_morning = $schedule->sunday_morning;

            //Afternoon
            $monday_afternoon = $schedule->monday_afternoon;
            $tuesday_afternoon = $schedule->tuesday_afternoon;
            $wednesday_afternoon = $schedule->wednesday_afternoon;
            $thursday_afternoon = $schedule->thursday_afternoon;
            $friday_afternoon = $schedule->friday_afternoon;
            $saturday_afternoon = $schedule->saturday_afternoon;
            $sunday_afternoon = $schedule->sunday_afternoon;

            // Evening
            $monday_evening = $schedule->monday_evening;
            $tuesday_evening = $schedule->tuesday_evening;
            $wednesday_evening = $schedule->wednesday_evening;
            $thursday_evening = $schedule->thursday_evening;
            $friday_evening = $schedule->friday_evening;
            $saturday_evening = $schedule->saturday_evening;
            $sunday_evening = $schedule->sunday_evening;
        // }

        // if this role..
        if($admin) {
            // Return view with variables
            return view('schedules.edit')->with(
                [
                    'admin' => $admin,
                    'employee' => $employee,
                    'schedule' => $schedule,
                    'employees' => $employees,

                    //Mornings
                    'monday_morning' => $monday_morning,
                    'tuesday_morning' => $tuesday_morning,
                    'wednesday_morning' => $wednesday_morning,
                    'thursday_morning' => $thursday_morning,
                    'friday_morning' => $friday_morning,
                    'saturday_morning' => $saturday_morning,
                    'sunday_morning' => $sunday_morning,

                    //Mornings
                    'monday_afternoon' => $monday_afternoon,
                    'tuesday_afternoon' => $tuesday_afternoon,
                    'wednesday_afternoon' => $wednesday_afternoon,
                    'thursday_afternoon' => $thursday_afternoon,
                    'friday_afternoon' => $friday_afternoon,
                    'saturday_afternoon' => $saturday_afternoon,
                    'sunday_afternoon' => $sunday_afternoon,

                    //Mornings
                    'monday_evening' => $monday_evening,
                    'tuesday_evening' => $tuesday_evening,
                    'wednesday_evening' => $wednesday_evening,
                    'thursday_evening' => $thursday_evening,
                    'friday_evening' => $friday_evening,
                    'saturday_evening' => $saturday_evening,
                    'sunday_evening' => $sunday_evening,


                ]
            );
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
        
        // Create each Report
        $schedule = Schedule::find($id);

        // Monday
        $schedule->monday_morning = $request->monday_morning;
        $schedule->monday_afternoon = $request->monday_afternoon;
        $schedule->monday_evening = $request->monday_evening;
        // Tuesday
        $schedule->tuesday_morning = $request->tuesday_morning;
        $schedule->tuesday_afternoon = $request->tuesday_afternoon;
        $schedule->tuesday_evening = $request->tuesday_evening;
        // Wednesday
        $schedule->wednesday_morning = $request->wednesday_morning;
        $schedule->wednesday_afternoon = $request->wednesday_afternoon;
        $schedule->wednesday_evening = $request->wednesday_evening;
        // Thursday
        $schedule->thursday_morning = $request->thursday_morning;
        $schedule->thursday_afternoon = $request->thursday_afternoon;
        $schedule->thursday_evening = $request->thursday_evening;
        // Friday
        $schedule->friday_morning = $request->friday_morning;
        $schedule->friday_afternoon = $request->friday_afternoon;
        $schedule->friday_evening = $request->friday_evening;
        // Saturday
        $schedule->saturday_morning = $request->saturday_morning;
        $schedule->saturday_afternoon = $request->saturday_afternoon;
        $schedule->saturday_evening = $request->saturday_evening;
        // Sunday
        $schedule->sunday_morning = $request->sunday_morning;
        $schedule->sunday_afternoon = $request->sunday_afternoon;
        $schedule->sunday_evening = $request->sunday_evening;

        // Save Schedule
        $schedule->save();

        return redirect('/schedules')->with('success', 'Schedule Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
