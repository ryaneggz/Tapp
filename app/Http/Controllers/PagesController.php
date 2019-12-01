<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timecard;
use App\Summary;
use App\Employee;
use App\Admin;
use App\Schedule;

class PagesController extends Controller
{
    // Blocks all logged out traffic except to..
    public function __construct() {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index() {
        $data = [
            'title'=>'Tapp.me'
        ];
        return view('index')->with($data);
    }

    public function profile() {
        $user_id = auth()->user()->id;
        $admin = Admin::where('user_id', '=', $user_id)->first();
        $employee = Employee::where('user_id', '=', $user_id)->first();

        $data = [
            'title'=>'Profile Page',
            'user'=>'Brad',
            'admin' => $admin,
            'employee' => $employee

        ];
        return view('pages.profile')->with($data);
    }
    
    public function lock() {
        return view('pages.lock');
    }

    public function dashboard() {
        $date = date_default_timezone_set("America/Chicago");

        // What's authenticated user variable
        $user_id = auth()->user()->id;

        // Find the employee equal to user_id
        $employee = Employee::where('user_id', '=', $user_id)->first();
        // Set timecards variable to empt if returns 0
        $timecards = [];
        // if employee exists..

        if($employee) {
            $timecards = Timecard::where('employee_id', '=', $employee->id)
            ->orderBy('time_in', 'desc')
            ->get();
        } else {
            echo null;
        }
        
        // Get all summaries for all users
        $summaries = Summary::orderBy('id', 'desc')->get();
        // Check if Admin
        $admin = Admin::where('user_id', '=', $user_id)->first();

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
        
        // return them with blade
        return view('pages.dashboard')->with(
            [
                'timecards' => $timecards, 
                'summaries' => $summaries,
                'admin' => $admin,
                'employee' => $employee,
                'employees' => $employees,
                'schedules' => $schedules,

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
    }

    public function tasks() {
        return view('pages.tasks');
    }
}
