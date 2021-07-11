@extends('layouts.dashboard',[
'page_title'=>"dashboard",
'custom_css'=>"Administrators.css"
])



@section('content')
<x-content-heading :name="'Dashboard'" />

<x-sub-nav :buttons="$nav_buttons" />

<form class="filter_bar Administrators_filter_bar">
    <div class="select_field">
        <label for="filter_period">Admin Records</label>
    </div>
    <div class="button_field_Administrators">
        <ul>
            <li style="grid-column: 8/9;" ><a href="/Administrators/create">Create</a></li>
        </ul>
    </div>
</form>
@if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
@endif

<div class="body_layout">

    <div class="section1 Administrators_table">

        @if(empty($Administrators->all()))
            <p>No records were found</p>
        @else
            <table class="table table-sm table-striped table-hover ">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Modified_at</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($Administrators as $Administrators)
                    <tr>
                        <th scope="row">{{ ($loop->index) + 1 }}</th>
                        <td>{{ $Administrators->id }}</td>
                        <td>{{ $Administrators->Name }}</td>
                        <td>{{ $Administrators->updated_at }}</td>
                        <td>{{ $Administrators->created_at }}</td>
                        <td>
                            <ul>
                                <li><a href="/Administrators/{{$Administrators->id}}">View/edit</a></li>
                                <li><a href="/Administrators/{{$Administrators->id}}/edit">Delete</a></li>
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
