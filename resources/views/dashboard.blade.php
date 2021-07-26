@extends('layouts.dashboard',[
    'page_title'=>"dashboard",
    'custom_css'=>"dashboard.css"
])


@section('content')
    <x-content-heading :name="'Dashboard'"/>

    <x-sub-nav :buttons="$nav_buttons" />

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

    <div class="body_layout">
        <div class="section1 dashboard_table">

        </div>
        <!-- <div class="section2">

        </div> -->
    </div>
@endsection


