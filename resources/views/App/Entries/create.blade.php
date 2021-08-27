@extends('layouts.dashboard',[
    'page_title'=>"Entries",
    'custom_css'=>"Entries.css"
])

@php
    $hospitals = \App\Models\Hospital::all();
    //$hospitals = array();

@endphp

@section('content')
    <x-content-heading :name="'Dashboard'"/>

    <x-sub-nav :buttons="$nav_buttons"/>

    <div class="action_bar">
        <a href="/Entries">Back</a>
        <button type="submit" form="birthEntry" value="submit" style="background-color: rgb(74,207,38);">create
        </button>
    </div>

    <div class="entries_form">
        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-warning" role="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <form action="/Entries" id="birthEntry" method="POST">
            @csrf
            <div class="sub_form_1">
                <h4>Entries Records</h4>
                <div class="input_elem_holder grid-elem-3">
                    <h6>Child</h6>
                    <div class="form-group">
                        <label for="childFirstName">First Name</label>
                        <input type="text"
                               class="form-control"
                               name="childFirstName"
                        >
                    </div>
                    <div class="form-group">
                        <label for="childMiddleName">Middle Name</label>
                        <input type="text"
                               class="form-control"
                               name="childMiddleName"
                        >
                    </div>
                    <div class="form-group">
                        <label for="childLastNam">Last Name</label>
                        <input type="text"
                               class="form-control"
                               name="childLastNam"
                        >
                    </div>
                </div>
                <div class="input_elem_holder grid-elem-3">
                    <h6>Mother</h6>
                    <div class="form-group">
                        <label for="motherFirstName">First Name</label>
                        <input type="text"
                               class="form-control"
                               name="motherFirstName"
                        >
                    </div>
                    <div class="form-group">
                        <label for="motherMiddleName">Middle Name</label>
                        <input type="text"
                               class="form-control"
                               name="motherMiddleName"
                        >
                    </div>
                    <div class="form-group">
                        <label for="motherLastName">Last Name</label>
                        <input type="text"
                               class="form-control"
                               name="motherLastName"
                        >
                    </div>
                </div>
                <div class="input_elem_holder grid-elem-3">
                    <h6>Father</h6>
                    <div class="form-group">
                        <label for="fatherFirstName">First Name</label>
                        <input type="text"
                               class="form-control"
                               name="fatherFirstName"
                        >
                    </div>
                    <div class="form-group">
                        <label for="fatherMiddleName">Middle Name</label>
                        <input type="text"
                               class="form-control"
                               name="fatherMiddleName"
                        >
                    </div>
                    <div class="form-group">
                        <label for="fatherLastName">Last Name</label>
                        <input type="text"
                               class="form-control"
                               name="fatherLastName"
                        >
                    </div>
                </div>
                <div class="input_elem_holder grid-elem-2" style="margin-top: 30px">
                    <div class="form-group">
                        <label for="dateOfBirth">Date Of Birth</label>
                        <input type="date"
                               class="form-control"
                               name="dateOfBirth"
                        >
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="input_elem_holder grid-elem-2" style="margin-top: 30px">
                    <div class="form-group">
                        <label for="typeOfBirth">Type Of Birth</label>
                        <select name="typeOfBirth" id="">
                            <option value="Normal">Normal</option>
                            <option value="Twins">Twins</option>
                            <option value="Triplets">Triplets</option>
                        </select>
                    </div>

                </div>
                <div class="input_elem_holder" style="margin-top: 30px">
                    <div class="form-group">
                        <label for="natureOfBirth">Nature Of Birth</label>
                        <input type="text"
                               class="form-control"
                               name="natureOfBirth"
                        >
                    </div>
                </div>

            </div>
{{--            <div class="sub_form_2">--}}
{{--                <h4>Sub Details</h4>--}}


{{--                <div class="input_elem_holder">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="hospital">Registered hospital</label>--}}
{{--                        <select name="hospital" id="">--}}
{{--                            <option value="0">None</option>--}}
{{--                            @if(isset($hospitals) && count($hospitals) > 0)--}}
{{--                                @foreach($hospitals as $hospital)--}}
{{--                                    <option value="{{ $hospital->id }}"> {{ $hospital->Name }}</option>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </form>
    </div>
@endsection


