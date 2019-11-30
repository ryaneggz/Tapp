<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timecard;
use App\Summary;
use App\Employee;

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
        $data = [
            'title'=>'Profile Page',
            'user'=>'Brad'

        ];
        return view('pages.profile')->with($data);
    }
    
    public function lock() {
        return view('pages.lock');
    }

    public function dashboard() {
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
            echo 'User is NOT an employee';
        }
        
        // Get all summaries for all users
        $summaries = Summary::orderBy('id', 'desc')->get();
        
        // return them with blade
        return view('pages.dashboard')->with(
            [
                'timecards' => $timecards, 
                'summaries' => $summaries
            ]
        );
    }

    public function tasks() {
        return view('pages.tasks');
    }
}
