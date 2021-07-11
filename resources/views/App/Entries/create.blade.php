@extends('layouts.dashboard',[
    'page_title'=>"Entries",
    'custom_css'=>"Entries.css"
])


@section('content')
    <x-content-heading :name="'Dashboard'"/>

    <x-sub-nav :buttons="$nav_buttons"/>

    <div class="action_bar">
        <a href="/Entries" >Back</a>
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
                        <input type="text"
                               class="form-control"
                               name="dateOfBirth"
                               >
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text"
                               class="form-control"
                               name="gender"
                               >
                    </div>
                </div>
                <div class="input_elem_holder grid-elem-2" style="margin-top: 30px">
                    <div class="form-group">
                        <label for="typeOfBirth">Type Of Birth</label>
                        <input type="text"
                               class="form-control"
                               name="typeOfBirth"
                               >
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
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="updated_at">Created at</label>
                        <input type="text"
                               class="form-control"
                               >
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="updated_at">Modified at</label>
                        <input type="text"
                               class="form-control"
                               >
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="hospital">Registered hospital</label>
                        <input type="text"
                               class="form-control"
                               name="hospital"
                               >
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


