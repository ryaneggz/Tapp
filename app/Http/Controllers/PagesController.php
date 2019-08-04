<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timecard;

class PagesController extends Controller
{
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
        $timecards = Timecard::orderBy('id', 'desc')->get();
        return view('pages.dashboard')->with(['timecards' => $timecards]);
    }

    public function tasks() {
        return view('pages.tasks');
    }
}
