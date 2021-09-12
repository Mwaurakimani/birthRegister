@extends('layouts.dashboard',[
    'page_title'=>"Entries",
    'custom_css'=>"Entries.css"
])

@php
    $hospitals = \App\Models\Hospital::all();
    //$hospitals = array();

@endphp

@section('content')
    <x-content-heading :name="__('Entries')"/>

    <x-sub-nav :buttons="$nav_buttons"/>

    <div class="action_bar">
        <a href="/Entries">Back</a>
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
        <form action="/Entries/{{$Entry->id}}" id="birthEntry" method="POST">
            @method('PUT')
            @csrf
            <div class="sub_form_1">
                <h4>Entry Record</h4>
                <div class="input_elem_holder grid-elem-3">
                    <h6>Child</h6>
                    <div class="form-group">
                        <label for="childFirstName">First Name</label>
                        <input type="text"
                               class="form-control"
                               name="childFirstName"
                               value="{{ $Entry->childFirstName }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="childMiddleName">Middle Name</label>
                        <input type="text"
                               class="form-control"
                               name="childMiddleName"
                               value="{{ $Entry->childMiddleName }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="childLastNam">Last Name</label>
                        <input type="text"
                               class="form-control"
                               name="childLastNam"
                               value="{{ $Entry->childLastNam }}"

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
                               value="{{ $Entry->motherFirstName }}"

                        >
                    </div>
                    <div class="form-group">
                        <label for="motherMiddleName">Middle Name</label>
                        <input type="text"
                               class="form-control"
                               name="motherMiddleName"
                               value="{{ $Entry->motherMiddleName }}"

                        >
                    </div>
                    <div class="form-group">
                        <label for="motherLastName">Last Name</label>
                        <input type="text"
                               class="form-control"
                               name="motherLastName"
                               value="{{ $Entry->motherLastName }}"

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
                               value="{{ $Entry->fatherFirstName }}"

                        >
                    </div>
                    <div class="form-group">
                        <label for="fatherMiddleName">Middle Name</label>
                        <input type="text"
                               class="form-control"
                               name="fatherMiddleName"
                               value="{{ $Entry->fatherMiddleName }}"

                        >
                    </div>
                    <div class="form-group">
                        <label for="fatherLastName">Last Name</label>
                        <input type="text"
                               class="form-control"
                               name="fatherLastName"
                               value="{{ $Entry->fatherLastName }}"

                        >
                    </div>
                </div>
                <div class="input_elem_holder grid-elem-2" style="margin-top: 30px">
                    <div class="form-group">
                        <label for="dateOfBirth">Date Of Birth</label>
                        <input type="date"
                               class="form-control"
                               name="dateOfBirth"
                               value="{{ $Entry->dateOfBirth }}"

                        >
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        @php
                            $gender_options = ['Male','Female'];
                            $gender_selected = $Entry->gender;
                        @endphp

                        <x-App.Elem.selecte-elem :name="__('gender')" :options="$gender_options" :selected="$gender_selected">
                        </x-App.Elem.selecte-elem>
                    </div>
                </div>
                <div class="input_elem_holder grid-elem-2" style="margin-top: 30px">
                    <div class="form-group">
                        <label for="typeOfBirth">Type Of Birth</label>
                        @php
                            $typeOfBirth_options = ['Normal','Twins','Triplets'];
                            $typeOfBirth_selected = $Entry->typeOfBirth;
                        @endphp
                        <x-App.Elem.selecte-elem :name="__('typeOfBirth')" :options="$typeOfBirth_options" :selected="$typeOfBirth_selected">
                        </x-App.Elem.selecte-elem>
                    </div>

                </div>
                <div class="input_elem_holder" style="margin-top: 30px">
                    <div class="form-group">
                        <label for="natureOfBirth">Nature Of Birth</label>
                        <input type="text"
                               class="form-control"
                               name="natureOfBirth"
                               value="{{ $Entry->childFirstName }}"
                        >
                    </div>
                </div>

            </div>
            <div class="sub_form_2">
                <h4>Sub Details</h4>


                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="hospital">Registered hospital</label>
                        <select name="hospital" id="">
                            <option value="0">None</option>
                            @if(isset($hospitals) && count($hospitals) > 0)
                                @foreach($hospitals as $hospital)
                                    <option value="{{ $hospital->id }}" {{ $hospital->id == $Entry->hospital_id ? "selected" : '' }}> {{ $hospital->Name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


