<?php

namespace App\Http\Controllers;

use App\Models\entry;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function index($id)
    {
        $Entries = entry::find($id);

        return view('App.Entries.printView')->with('Entries', $Entries);
    }

    public function downloadPost($id)
    {
        $Entries = entry::find($id);
        return view('pdf')->with('Entries', $Entries);

//        $pdf = \PDF::loadView('pdf', compact('Entries'));
//        return $pdf->download('Entry.pdf');
    }
}
