<?php

namespace App\Http\Controllers;

use App\Models\entry;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Hospital;
use App\Rules\HospitalExist;
use Illuminate\Http\Request;

class EntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->Title == 'Registrar') {
            $entries = entry::all();
        } else {
            $entries = entry::where('user_id', Auth::user()->id)->get();
        }

        return view('App.Entries.index')->with('entries', $entries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('App.Entries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hospital_id = Auth::user()->hospital_id;


        $validated = $request->validate([
            'childFirstName' => 'required',
            'childMiddleName' => 'required',
            'childLastNam' => 'required',
            'motherFirstName' => 'required',
            'motherMiddleName' => 'required',
            'motherLastName' => 'required',
            'phone'=> 'required',
            'email'=> 'required|email',
            'fatherFirstName' => 'required',
            'fatherMiddleName' => 'required',
            'fatherLastName' => 'required',
            'dateOfBirth' => 'required',
            'gender' => 'required',
            'typeOfBirth' => 'required',
            'natureOfBirth' => 'required',
        ]);



        $entries = new entry();

        $entries->childFirstName = $validated['childFirstName'];
        $entries->childMiddleName = $validated['childMiddleName'];
        $entries->childLastNam = $validated['childLastNam'];
        $entries->motherFirstName = $validated['motherFirstName'];
        $entries->motherMiddleName = $validated['motherMiddleName'];
        $entries->motherLastName = $validated['motherLastName'];
        $entries->fatherFirstName = $validated['fatherFirstName'];
        $entries->fatherMiddleName = $validated['fatherMiddleName'];
        $entries->parentNumber = $validated['phone'];
        $entries->emailAddress = $validated['email'];
        $entries->fatherLastName = $validated['fatherLastName'];
        $entries->dateOfBirth = date('Y-m-d H:i:s',strtotime($validated['dateOfBirth']));
        $entries->gender = $validated['gender'];
        $entries->typeOfBirth = $validated['typeOfBirth'];
        $entries->natureOfBirth = $validated['natureOfBirth'];
        $entries->hospital_id = $hospital_id;
        $entries->user_id = Auth::id();
        $entries->createdBy = Auth::id();

        $entries->save();


        Session::flash("message", "Hospital record was updated successfully!");

        return redirect('/Entries');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $Entries = entry::find($id);

        return view('App.Entries.show')->with('Entries', $Entries);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $Entries = entry::find($id);

        return view('App.Entries.edit')->with('Entry', $Entries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'childFirstName' => 'required',
            'childMiddleName' => 'required',
            'childLastNam' => 'required',
            'motherFirstName' => 'required',
            'motherMiddleName' => 'required',
            'motherLastName' => 'required',
            'fatherFirstName' => 'required',
            'fatherMiddleName' => 'required',
            'fatherLastName' => 'required',
            'dateOfBirth' => 'required',
            'gender' => 'required',
            'typeOfBirth' => 'required',
            'natureOfBirth' => 'required',
            'hospital' => ['required', new HospitalExist],
        ]);

        $entries = entry::find($id);

        $entries->childFirstName = $validated['childFirstName'];
        $entries->childMiddleName = $validated['childMiddleName'];
        $entries->childLastNam = $validated['childLastNam'];
        $entries->motherFirstName = $validated['motherFirstName'];
        $entries->motherMiddleName = $validated['motherMiddleName'];
        $entries->motherLastName = $validated['motherLastName'];
        $entries->fatherFirstName = $validated['fatherFirstName'];
        $entries->fatherMiddleName = $validated['fatherMiddleName'];
        $entries->fatherLastName = $validated['fatherLastName'];
        $entries->dateOfBirth = $validated['dateOfBirth'];
        $entries->gender = $validated['gender'];
        $entries->typeOfBirth = $validated['typeOfBirth'];
        $entries->natureOfBirth = $validated['natureOfBirth'];
        $entries->hospital_id = $validated['hospital'];

//        dd("done");
        $entries->save();

        Session::flash("message", "Record was updated successfully!");

        return redirect('/Entries/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd("Destroying");
    }
}
