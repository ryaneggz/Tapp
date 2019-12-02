<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $employee = Employee::where('user_id', '=', $user_id)->first();

        if($admin) {
            $employees = Employee::orderBy('id','asc')->paginate(10);
            return view('employees.index')->with(
                [
                    'employees' => $employees,
                    'admin' => $admin,
                    'employee' => $employee
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
        $employee = Employee::where('user_id', '=', $user_id)->first();

        if($admin) {

            // Get list of Users
            $users = User::all();

            return view('employees.create')->with(
                [
                    'users' => $users,
                    'admin' => $admin,
                    'employee' => $employee
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
            'color' => 'max:7',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')) {
            // Get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Summary
        $employee = new Employee;

        $employee->user_id = $request->input('user_id');
        $employee->card_number = $request->input('card_number');
        $employee->color = $request->input('color');
        $employee->cover_image = $fileNameToStore;
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
            'color' => 'max:7',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')) {
            // Get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        // Create Summary
        $employee = Employee::find($id);

        $employee->user_id = $request->input('user_id');
        $employee->card_number = $request->input('card_number');
        $employee->color = $request->input('color');
        if($request->hasFile('cover_image')) {
            $employee->cover_image = $fileNameToStore ;
        }
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

        if($employee->cover_image != 'noimage.jpg') {
            // Delete image
            Storage::delete('public/cover_images/'.$employee->cover_image); 
        }
        
        // After deleteing redirect back to object index
        return redirect('/employees')->with('success', 'Employee Removed');
    }
}
