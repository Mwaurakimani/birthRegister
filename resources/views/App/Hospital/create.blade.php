@extends('layouts.dashboard',[
    'page_title'=>"dashboard",
    'custom_css'=>"Hospital.css"
])


@section('content')
    <x-content-heading :name="'Dashboard'"/>

    <x-sub-nav :buttons="$nav_buttons"/>

    <div class="action_bar">
        <a href="/Hospital" >Back</a>
        <button type="submit" form="birthEntry" value="submit" style="background-color: rgb(41,235,73);">create
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
        <form action="/Hospital" id="birthEntry" method="POST">
            @csrf
            <div class="sub_form_1">
                <h4>Hospital Records</h4>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="userid">ID</label>
                        <input type="text"
                               class="form-control"
                               name="userid"
                               disabled="disabled"
                               >
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text"
                               class="form-control"
                               name="Name"
                        >
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Region">Region</label>
                        <input type="text"
                               class="form-control"
                               name="Region"

                        >
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="SubRegion">Sub Region</label>
                        <input type="text"
                               class="form-control"
                               name="SubRegion"
                               >
                    </div>
                </div>
            </div>
            <div class="sub_form_2">
                <h4>Sub Details</h4>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Created_at">Created at</label>
                        <input type="text"
                               class="form-control"
                               name="Created_at"
                               >
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Modified_at">Modified at</label>
                        <input type="text"
                               class="form-control"
                               name="Modified_at" >
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


