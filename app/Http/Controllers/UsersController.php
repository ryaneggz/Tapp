<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;

class UsersController extends Controller
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
        if($admin) {
            $users = User::orderBy('id','asc')->paginate(10);
            return view('users.index')->with('users', $users);
        } else {
            return redirect('/dashboard');
        }
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
        if($admin) {
            $user = User::find($id);
            return view('users.show')->with('user', $user);
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
        if($admin) {
            $user = User::find($id);
            return view('users.edit')->with('user', $user);
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
            'name' => 'required',
            'email' => 'required',
        ]);

        // Create Summary
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return redirect('/users')->with('success', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        // After deleteing redirect back to object index
        return redirect('/users')->with('success', 'User Removed');
    }
}
