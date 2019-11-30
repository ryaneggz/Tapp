<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Employee;
use App\User;

class SidebarController extends Controller
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
        $admin_user_id = $admin->user_id;

        return view('inc.sidebar')-with(
            [
                'admin_user_id' => $admin_user_id,
            ]
        );
    }
}
