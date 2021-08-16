@extends('layouts.dashboard',[
    'page_title'=>"dashboard",
    'custom_css'=>"dashboard.css"
])


@section('content')
    <x-content-heading :name="'Dashboard'"/>

    <x-sub-nav :buttons="$nav_buttons"/>

    <form class="filter_bar">
        <div class="select_field">
            <label for="filter_period">Births Within</label>
            <select name="" class="form-select" aria-label="Default select example">
                <option selected>Date</option>
                <option value="All">All</option>
                <option value="today">today</option>
                <option value="thisWeek">thisWeek</option>
                <option value="thisMonth">thisMonth</option>
            </select>
        </div>
    </form>

    <div class="body_layout dashboard_table_view">
        @if(isset($records) && count($records) > 0 )
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sirname</th>
                    <th scope="col">otherName</th>
                    <th scope="col">gender</th>
                    <th scope="col">hospital</th>
                    <th scope="col">D.O.B</th>
                </tr>
                </thead>
                <tbody>
                @foreach($records as $record)
                    <tr onclick="window.location.href='/Entries/{{$record->id}}'">
                        <th scope="row"> {{ ($loop->index) + 1 }}</th>
                        <td>{{ $record->childLastNam }}</td>
                        <td>{{ $record->childFirstName }} {{ $record->childMiddleName }}</td>
                        <td>{{ $record->gender }}</td>
                        <td>{{ $record->Hospital->Name }}</td>
                        <td>{{ $record->dateOfBirth }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No Records Found</p>
        @endif
    </div>
@endsection


