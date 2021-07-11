@extends('layouts.dashboard',[
    'page_title'=>"Administrators",
    'custom_css'=>"Administrators.css"
])


@section('content')
    <x-content-heading :name="'Dashboard'"/>

    <x-sub-nav :buttons="$nav_buttons"/>

    <div class="action_bar">
        <a href="/Administrators" >Back</a>
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
        <form action="/Administrators" id="birthEntry" method="POST">
            @csrf
            <div class="sub_form_1">
                <h4>Administrators Records</h4>
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
                        <input type="text"
                               class="form-control"
                               name="Role"
                        >
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Notes">Notes</label>
                        <textarea name="Notes"></textarea>
                    </div>
                </div>

            </div>
            <div class="sub_form_2">
                <h4>Sub Details</h4>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Modified_at">Created at</label>
                        <input type="text"
                               class="form-control"
                               name="Modified_at"
                        >
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Modified_at">Modified at</label>
                        <input type="text"
                               class="form-control"

                        >
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Notes">Registered hospital</label>
                        <input type="text"
                               class="form-control"
                               name="Modified_at"
                        >
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


