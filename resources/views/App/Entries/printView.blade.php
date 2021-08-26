@extends('layouts.dashboard',[
    'page_title'=>"Entries",
    'custom_css'=>"Entries.css"
])
@php
    $hospitals = \App\Models\Hospital::all();
@endphp


@section('content')
    <x-content-heading :name="'Dashboard'"/>

    <x-sub-nav :buttons="$nav_buttons"/>

    <div class="action_bar">
        <a href="/download/{{ $Entries->id }}" >Download</a>
    </div>

    <div class="entries_form">

    </div>
@endsection


