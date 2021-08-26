@extends('layouts.dashboard',[
    'page_title'=>"Administrators",
    'custom_css'=>"Administrators.css"
])


@section('content')
    <x-content-heading :name="'Dashboard'"/>

    <x-sub-nav :buttons="$nav_buttons"/>

    <div class="action_bar">
        <a href="/Administrators" >Back</a>
        <button type="submit" form="userInput" value="submit" style="background-color: rgb(235, 151, 41);">Update
        </button>
        <button type="submit" form="userInput" value="submit" style="background-color: rgb(235,41,41);">Delete
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
        <form action="/Administrator/{{$Administrators->id}}" id="userInput" method="POST">
            @method('PUT')
            @csrf
            <div class="sub_form_1">
                <h4>Administrators Records</h4>
                <div class="input_elem_holder grid-elem-2">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text"
                               class="form-control"
                               name="firstName"
                               value="{{ $Administrators->firstName ? $Administrators->firstName : "" }}">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text"
                               class="form-control"
                               name="lastName"
                               value="{{ $Administrators->lastName ? $Administrators->lastName : "" }}">
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text"
                               class="form-control"
                               name="email"
                               value="{{ $Administrators->email ? $Administrators->email : "" }}"
                        >
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Role">Role</label>
                        <input type="text"
                               class="form-control"
                               name="Role"
                               value="{{ $Administrators->Title ? $Administrators->Title : "" }}">
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Notes">Notes</label>
                        <textarea name="Notes">{{ $Administrators->Notes ? $Administrators->Notes : "" }}</textarea>
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
                               name="Modified_at" value="{{ $Administrators->updated_at ? $Administrators->updated_at : "" }}">
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Modified_at">Modified at</label>
                        <input type="text"
                               class="form-control"
                               name="Modified_at" value="{{ $Administrators->updated_at ? $Administrators->updated_at : "" }}">
                    </div>
                </div>
                <div class="input_elem_holder">
                    <div class="form-group">
                        <label for="Notes">Registered hospital</label>
                        <select name="hospital_id" id="">
                            <option value="">None</option>
                            @forelse ($hospitals as $hospital)
                                <option value="{{ $hospital->id }}" {{ isset($Administrators->hospital_id) && $Administrators->hospital_id == $hospital->id ? 'selected' : '' }}>{{ $hospital->Name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


