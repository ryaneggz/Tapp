<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Summary;

class SummariesController extends Controller
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
        $summaries = Summary::orderBy('created_at','desc')->paginate(10);
        return view('summaries.index')->with('summaries', $summaries);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('summaries.create');
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
            'employee_id' => 'required',
            'body' => 'required',
        ]);

        // Create Summary
        $summary = new Summary;
        $summary->employee_id = $request->input('employee_id');
        $summary->body = $request->input('body');
        $summary->save();

        return redirect('/summaries')->with('success', 'Summary Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $summary = Summary::find($id);
        return view('summaries.show')->with('summary', $summary);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $summary = Summary::find($id);

        if(auth()->user()->id !== $summary->employee->user->id) {
            return redirect('/summaries')->with('error', 'Unauthorized Page');
        }

        return view('summaries.edit')->with('summary', $summary);
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
            'body' => 'required',
        ]);

        // Create Summary
        $summary = Summary::find($id);
        $summary->body = $request->input('body');
        $summary->save();

        return redirect('/summaries')->with('success', 'Summary Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $summary = Summary::find($id);
        $summary->delete();
        
        // After deleteing redirect back to object index
        return redirect('/summaries')->with('success', 'Summary Removed');
    }
}
