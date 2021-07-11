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
        <form action="/Entries/{{$Entries->id}}" id="birthEntry" method="POST">
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
                               value="{{ $Entries->childFirstName ? $Entries->childFirstName : "t" }}">
                    </div>
                    <div class="form-group">
                        <label for="childMiddleName">Middle Name</label>
                        <input type="text"
                               class="form-control"
                               name="childMiddleName"
                               value="{{ $Entries->childMiddleName ? $Entries->childMiddleName : "" }}">
                    </div>
                    <div class="form-group">
                        <label for="childLastNam">Last Name</label>
                        <input type="text"
                               class="form-control"
                               name="childLastNam"
                               value="{{ $Entries->childLastNam ? $Entries->childLastNam : "" }}">
                    </div>
                </div>
                <div class="input_elem_holder grid-elem-3">
                    <h6>Mother</h6>
                    <div class="form-group">
                        <label for="motherFirstName">First Name</label>
                        <input type="text"
                               class="form-control"
                               name="motherFirstName"
                               value="{{ $Entries->motherFirstName ? $Entries->motherFirstName : "" }}">
                    </div>
                    <div class="form-group">
                        <label for="motherMiddleName">Middle Name</label>
                        <input type="text"
                               class="form-control"
                               name="motherMiddleName"
                               value="{{ $Entries->motherMiddleName ? $Entries->motherMiddleName : "" }}">
                    </div>
                    <div class="form-group">
                        <label for="motherLastName">Last Name</label>
                        <input type="text"
                               class="form-control"
                               name="motherLastName"
                               value="{{ $Entries->motherLastName ? $Entries->motherLastName : "" }}">
                    </div>
                </div>
                <div class="input_elem_holder grid-elem-3">
                    <h6>Father</h6>
                    <div class="form-group">
                        <label for="fatherFirstName">First Name</label>
                        <input type="text"
                               class="form-control"
                               name="fatherFirstName"
                               value="{{ $Entries->fatherFirstName ? $Entries->fatherFirstName : "" }}">
                    </div>
                    <div class="form-group">
                        <label for="fatherMiddleName">Middle Name</label>
                        <input type="text"
                               class="form-control"
                               name="fatherMiddleName"
                               value="{{ $Entries->fatherMiddleName ? $Entries->fatherMiddleName : "" }}">
                    </div>
                    <div class="form-group">
                        <label for="fatherLastName">Last Name</label>
                        <input type="text"
                               class="form-control"
                               name="fatherLastName"
                               value="{{ $Entries->fatherLastName ? $Entries->fatherLastName : "" }}">
                    </div>
                </div>
                <div class="input_elem_holder grid-elem-2" style="margin-top: 30px">
                    <div class="form-group">
                        <label for="dateOfBirth">Date Of Birth</label>
                        <input type="text"
                               class="form-control"
                               name="dateOfBirth"
                               value="{{ $Entries->dateOfBirth ? $Entries->dateOfBirth : "" }}">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text"
                               class="form-control"
                               name="gender"
                               value="{{ $Entries->gender ? $Entries->gender : "" }}">
                    </div>
                </div>
                <div class="input_elem_holder grid-elem-2" style="margin-top: 30px">
                    <div class="form-group">
                        <label for="typeOfBirth">Type Of Birth</label>
                        <input type="text"
                               class="form-control"
                               name="typeOfBirth"
                               value="{{ $Entries->typeOfBirth ? $Entries->typeOfBirth : "" }}">
                    </div>

                </div>
                <div class="input_elem_holder" style="margin-top: 30px">
                    <div class="form-group">
                        <label for="natureOfBirth">Nature Of Birth</label>
                        <input type="text"
                               class="form-control"
                               name="natureOfBirth"
                               value="{{ $Entries->natureOfBirth ? $Entries->natureOfBirth : "" }}">
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
                               name="updated_at" value="{{ $Entries->updated_at ? $Entries->updated_at : "" }}">
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="updated_at">Modified at</label>
                        <input type="text"
                               class="form-control"
                               name="updated_at" value="{{ $Entries->updated_at ? $Entries->updated_at : "" }}">
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="hospital">Registered hospital</label>
                        <input type="text"
                               class="form-control"
                               name="hospital" value="{{ $Entries->hospital ? $Entries->hospital->Name : "" }}">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


