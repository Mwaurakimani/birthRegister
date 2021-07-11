<?php

namespace App\Http\Controllers;


use App\Models\Hospital;
use Session;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::all();

        return view('App.Hospital.index')->with('hospitals',$hospitals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('App.Hospital.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required',
            'Notes' => 'nullable|max:250',
            'Region' => 'required',
            'SubRegion' => 'required',
        ]);

        $hospital = new Hospital();



        $hospital->Name = $validated['Name'];
        $hospital->Notes = $validated['Notes'];
        $hospital->Region = $validated['Region'];
        $hospital->SubRegion = $validated['SubRegion'];

        $hospital->save();



        Session::flash("message","Hospital record was created successfully!");

        return redirect('/Hospital');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $hospitals = Hospital::find($id);

        return view('App.Hospital.show')->with('hospital',$hospitals);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospitals = Hospital::find($id);

        return view('App.Hospital.edit')->with('hospital',$hospitals);
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
        $validated = $request->validate([
            'Name' => 'required',
            'Notes' => 'nullable|max:250',
            'Region' => 'required',
            'SubRegion' => 'required',
        ]);

        $hospital = Hospital::find($id);

        $hospital->Name = $validated['Name'];
        $hospital->Notes = $validated['Notes'];
        $hospital->Region = $validated['Region'];
        $hospital->SubRegion = $validated['SubRegion'];

        $hospital->save();

        Session::flash("message","Hospital record was updated successfully!");

        return redirect('/Hospital/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = Hospital::find($id);

        $hospital->delete();

        Session::flash("message","Deleted successfully!");

        $hospitals = Hospital::all();

        return view('App.Hospital.index')->with('hospitals',$hospitals);
    }
}
