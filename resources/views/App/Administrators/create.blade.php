@extends('layouts.dashboard',[
    'page_title'=>"Administrators",
    'custom_css'=>"Administrators.css"
])


@section('content')
    <x-content-heading :name="__('Administrator')"/>

    <x-sub-nav :buttons="$nav_buttons"/>

    <div class="action_bar">
        <a href="/Administrator" >Back</a>
        <button type="submit" form="birthEntry" value="submit" style="background-color: rgb(235, 151, 41);">Creating
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
        <form action="/Administrator" id="birthEntry" method="POST">
            @csrf
            <div class="sub_form_1">
                <h4>Administrator Record</h4>
                <div class="input_elem_holder grid-elem-2">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text"
                               class="form-control"
                               name="firstName"
                        >
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text"
                               class="form-control"
                               name="lastName"
                        >
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text"
                               class="form-control"
                               name="email"
                        >
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Role">Role</label>
                        <select class="form-control" name="Role" id="Role">
                            <option value="Admin">Admin</option>
                            <option value="Registrar">Registrar</option>
                        </select>
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Notes">Notes</label>
                        <textarea name="Notes"></textarea>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection


