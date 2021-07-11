@extends('layouts.dashboard',[
'page_title'=>"dashboard",
'custom_css'=>"Entries.css"
])



@section('content')
    <x-content-heading :name="'Dashboard'" />

    <x-sub-nav :buttons="$nav_buttons" />

    <form class="filter_bar Entries_filter_bar">
        <div class="select_field">
            <label for="filter_period">Entries Records</label>
        </div>
        <div class="button_field_Entries">
            <ul>
                <li style="grid-column: 8/9;" ><a href="/Entries/create">Create</a></li>
            </ul>
        </div>
    </form>
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="body_layout">

        <div class="section1 Entries_table">

            @if(empty($entries->all()))
                <p>No records were found</p>
            @else
                <table class="table table-sm table-striped table-hover ">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">parents Name</th>
                        <th scope="col">D.O.B</th>
                        <th scope="col">Hospital</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($entries as $entries)
                        <tr>
                            <th scope="row">{{ ($loop->index) + 1 }}</th>
                            <td>{{ $entries->ChildName }}</td>
                            <td>
                                <p>{{ $entries->MothersName }}</p>
                                <p>{{ $entries->FathersName }}</p>
                            </td>
                            <td>{{ $entries->dateOfBirth }}</td>
                            <td>{{ $entries->hospital_id }}</td>
                            <td>
                                <ul>
                                    <li><a href="/Entries/{{$entries->id}}">View</a></li>
                                    <li><a href="/Entries/{{$entries->id}}/edit">Edit</a></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <!-- <div class="section2">

            </div> -->
    </div>
@endsection
