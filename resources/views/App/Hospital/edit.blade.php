@extends('layouts.dashboard',[
    'page_title'=>"dashboard",
    'custom_css'=>"Hospital.css"
])


@section('content')
    <x-content-heading :name="'Dashboard'"/>

    <x-sub-nav :buttons="$nav_buttons"/>

    <div class="action_bar">
        <a href="/Hospital" >Back</a>
        <button type="submit" form="birthEntry" value="submit" style="background-color: rgb(233,28,53);">Delete
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
        <form action="/Hospital/{{ $hospital->id }}" id="birthEntry" method="POST">
            @method('Delete')
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
                               value="{{ $hospital->id ? $hospital->id : "" }}">
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text"
                               class="form-control"
                               name="Name"
                               value="{{ $hospital->Name ? $hospital->Name : "" }}"
                        >
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Region">Region</label>
                        <input type="text"
                               class="form-control"
                               name="Region"
                               value="{{ $hospital->Region ? $hospital->Region : "" }}"
                        >
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="SubRegion">Sub Region</label>
                        <input type="text"
                               class="form-control"
                               name="SubRegion"
                               value="{{ $hospital->subRegion ? $hospital->subRegion : "" }}">
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
                               value="{{ $hospital->created_at ? $hospital->created_at : "" }}">
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Modified_at">Modified at</label>
                        <input type="text"
                               class="form-control"
                               name="Modified_at" value="{{ $hospital->updated_at ? $hospital->updated_at : "" }}">
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Notes">Notes</label>
                        <textarea name="Notes">{{ $hospital->Notes ? $hospital->Notes : "" }}</textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


