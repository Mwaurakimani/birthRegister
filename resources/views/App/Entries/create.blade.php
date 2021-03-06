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
        @if(\Illuminate\Support\Facades\Auth::user()->Title == 'Admin')

            <button type="submit" form="birthEntry" value="submit" style="background-color: rgb(74,207,38);">create
            </button>
        @endif
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
                <h4>Entry Record</h4>
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
                    <div id="sandbox-container" class="form-group ">
                        <label for="dateOfBirth">Date Of Birth</label>
                        <input id="dateOfBirth" type="text" type="text" class="form-control" name="dateOfBirth"/>
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
            <div class="sub_form_2">
                <h4>Sub Details</h4>

                <div class="input_elem_holder" style="margin-top: 30px">
                    <div class="form-group ">
                        <label for="phone">Parent/Guardian Phone</label>
                        <input id="phone" type="tel" type="text" class="form-control" name="phone" />
                    </div>
                    <div class="form-group">
                        <label for="email">Parent/Guardian E-mail</label>
                        <input id="email" type="email" type="text" class="form-control" name="email" />
                    </div>
                </div>
            </div>
        </form>

        <script>
            $('#sandbox-container input').datepicker({
                autoclose: true,
                startDate: new Date(),
                endDate: new Date(new Date().setDate(new Date().getDate()))
            });
        </script>
    </div>
@endsection

{{--                        <input id="date_of_birth"--}}
{{--                               type="text"--}}
{{--                               class="form-control"--}}
{{--                               name="dateOfBirth"--}}
{{--                        >--}}


