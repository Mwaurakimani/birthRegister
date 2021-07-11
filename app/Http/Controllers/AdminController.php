<?php

namespace App\Http\Controllers;

use App\Models\User;
use Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Administrators = User::all();

        return view('App.Administrators.index')->with('Administrators',$Administrators);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('App.Administrators.create');
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
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'Role' => 'required',
            'Notes' => 'nullable|max:250',
        ]);

        $user = new User();

        $user->firstName = $validated["firstName"];
        $user->lastName = $validated["lastName"];
        $user->email = $validated["email"];
        $user->Role = $validated["Role"];
        $user->Notes = $validated["Notes"];
        $user->password = bcrypt("password");

        $user->save();

        Session::flash("message","User record was added successfully!");

        return redirect('/Administrators');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Administrators = User::find($id);

        return view('App.Administrators.show')->with('Administrators',$Administrators);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Administrators = User::find($id);

        return view('App.Administrators.edit')->with('Administrators',$Administrators);
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
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'Role' => 'required',
            'Notes' => 'nullable|max:250',
        ]);

        $user = User::find($id);

        $user->firstName = $validated["firstName"];
        $user->lastName = $validated["lastName"];
        $user->email = $validated["email"];
        $user->Role = $validated["Role"];
        $user->Notes = $validated["Notes"];

        $user->save();

        Session::flash("message","User record was updated successfully!");

        return redirect('/Administrators');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd("disable");
    }
}
