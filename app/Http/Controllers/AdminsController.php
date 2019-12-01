<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\Employee;

class AdminsController extends Controller
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

        if($admin) {
            
            $admins = Admin::orderBy('id','asc')->paginate(10);
            return view('admins.index')->with(
                [
                    'admins' => $admins,
                    'admin' => $admin,
                    'employee' => $employee
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
        // Get id for Authenticated User
        $user_id = auth()->user()->id;
        // Find Admin with Auth Users ID
        $admin = Admin::where('user_id', '=', $user_id)->first();
        $employee = Employee::where('user_id', '=', $user_id)->first();

        // If User is Admin
        if($admin) {
            // Get list of Users
            $users = User::all();
            // return view with users list if is admin
            return view('admins.create')->with(
                [
                    'users' => $users,
                    'admin' => $admin,
                    'employee' => $employee
                ]
            );
        // If not redirect to dashboard
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
        ]);

        // Create Summary
        $admin = new Admin;
        $admin->user_id = $request->input('user_id');
        $admin->save();

        return redirect('/admins')->with('success', 'Admin Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get id for Authenticated User
        $user_id = auth()->user()->id;
        // Find Admin with Auth Users ID
        $admin = Admin::where('user_id', '=', $user_id)->first();
        $employee = Employee::where('user_id', '=', $user_id)->first();
        // If User is Admin
        if($admin) {
            // Find Admin by ID
            $admin = Admin::find($id);
            return view('admins.show')->with(
                [
                    'admin' => $admin,
                    'employee' => $employee
                ]
            );
        // If not redirect to dashboard
        } else {
            return redirect('/dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        
        // After deleteing redirect back to object index
        return redirect('/admins')->with('success', 'Admin Removed');
    }
}
