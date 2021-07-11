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
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Parents</th>
                    <th scope="col">Date Registered</th>
                    <th scope="col">Region</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>03-03-1990</td>
                    <td>Nairobi</td>
                    <td>
                        <div class="icon_holder">
                            <img src="favicon.ico" alt="">
                        </div>
                        <div class="icon_holder">
                            <img src="favicon.ico" alt="">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>03-03-1990</td>
                    <td>Nairobi</td>
                    <td>
                        <div class="icon_holder">
                            <img src="favicon.ico" alt="">
                        </div>
                        <div class="icon_holder">
                            <img src="favicon.ico" alt="">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>03-03-1990</td>
                    <td>Nairobi</td>
                    <td>
                        <div class="icon_holder">
                            <img src="favicon.ico" alt="">
                        </div>
                        <div class="icon_holder">
                            <img src="favicon.ico" alt="">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>03-03-1990</td>
                    <td>Nairobi</td>
                    <td>
                        <div class="icon_holder">
                            <img src="favicon.ico" alt="">
                        </div>
                        <div class="icon_holder">
                            <img src="favicon.ico" alt="">
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- <div class="section2">

        </div> -->
    </div>
@endsection


