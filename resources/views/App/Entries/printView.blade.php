@extends('layouts.dashboard',[
    'page_title'=>"Entries",
    'custom_css'=>"Entries.css"
])
@php
    $hospitals = \App\Models\Hospital::all();
@endphp


@section('content')
    <x-content-heading :name="__('Entries')"/>

    <x-sub-nav :buttons="$nav_buttons"/>

    <div class="action_bar">
        <a href="/download/{{ $Entries->id }}" >Print Page</a>
    </div>

    <div class="print-preview">
        <h2>Republic of Kenya</h2>
        <h3>Certificate of Birth</h3>
        <div class="sub-one">
            <p>Birth in the <span>{{ $Entries->hospital->subRegion }}</span>
                District in the <span>{{ $Entries->hospital->Region }}</span> Province</p>
        </div>
        <div class="main-entry">
            <div class="section" style="grid-column: 0/4;grid-row: 1/2">
                <h4>Entry No.</h4>
                <p>{{ $Entries->id }}</p>
            </div>
            <div class="section">
                <h4>Where Born</h4>
                <p>{{ $Entries->hospital->Region }}</p>
            </div>
            <div class="section">
                <h4>Name</h4>
                <p>{{ $Entries->childFirstName }} {{ $Entries->childMiddleName }}</p>
            </div>
            <div class="section" style="grid-column: 0/4;grid-row:2/3">
                <h4>Date of Birth</h4>
                <p>{{ $Entries->dateOfBirth }}</p>
            </div>
            <div class="section" style="grid-column: 2/3;grid-row:2/3">
                <h4>Sex</h4>
                <p>{{ $Entries->gender }}</p>
            </div>
            <div class="section" style="grid-column: 0/4;grid-row:2/3">
                <h4>Name and Surname of Father No.</h4>
                <p>{{ $Entries->fatherFirstName }} {{ $Entries->fatherMiddleName }} {{ $Entries->fatherLastName }}</p>
            </div>
            <div class="section" style="grid-column: 1/4;grid-row:3/4">
                <h4>Name and Maiden Name of Mother</h4>
                <p>{{ $Entries->motherFirstName }} {{ $Entries->motherMiddleName }} {{ $Entries->motherLastName }}</p>
            </div>
            <div class="section" style="grid-column: 1/2;grid-row:4/5">
                <h4>Name of Registering Officer</h4>
                <p>{{ $Entries->User->firstName }} {{ $Entries->User->lastName }}</p>
            </div>
            <div class="section"  style="grid-column: 3/4;grid-row:4/5">
                <h4>Date of Registration</h4>
                <p>{{ date('m/d/y',strtotime($Entries->created_at)) }}</p>
            </div>
        </div>
        <p class="declaration">Registrar for {{ $Entries->hospital->Region }} ,hereby certify that this certificate is compiled from an entry/return in the Register of births in the  region</p>
    </div>
@endsection


